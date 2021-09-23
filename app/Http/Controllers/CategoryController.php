<?php

namespace App\Http\Controllers;

use App\Category;
use App\Icon;
use Illuminate\Http\Request;
use Auth;
use Session;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->hasRoles('Admin') ) {
            $categories = Category::orderBy('name')->get();
            return view('categories.index', compact('categories'));
        }
        if ( Auth::user()->hasRoles('Supplier') ) {
            
            $categories = Category::orderBy('name')->get();
            return view('categories.index', compact('categories'));
        }
        
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $icons = Icon::all();
        if ( Auth::user()->hasRoles(['Admin','Supplier']) ) {
            return view('categories.create', compact('categories', 'icons'));
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'name' => 'required|unique:categories',
            'image' => 'image|required'
        ]);

        $fileurl = '';
        if ( $featured = $request->file('image') ) {
            $filename = 'featured-' . str_slug( $request->name ) . '-' . str_random(10) . '.' . $featured->getClientOriginalExtension();

            Image::make($featured)->resize(260,260)->save('uploads/categories/'. $filename);

            $fileurl = 'uploads/categories/' . $filename; 
        
        }

        $cat = new Category;

        $cat->name = $request->name;
        $cat->slug = str_slug($request->name);
        $cat->image = $fileurl;
        if ( $request->parentId ) {
            $cat->parentId = $request->parentId;
        }
        if ( $request->menuOrder ) {
            $cat->menuOrder = $request->menuOrder;
        }
        $cat->offered = $request->offered;
        
        $cat->featured = $request->featured;
        if( $request->icon ) {
            $category->iconID = $request->icon;
        }
        $cat->save();

        Session::flash('success', 'Succesfully created a category.');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::orderBy('name')->get();
        $icons = Icon::all();
        if ( Auth::user()->hasRoles(['Admin','Supplier']) ) {
            return view('categories.edit', compact('categories', 'category', 'icons'));
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validateWith([
            'name' => 'required',
            'image' => 'image'
        ]);

        $fileurl = $category->image;
        if ( $featured = $request->file('image') ) {
            $filename = 'featured-' . str_slug( $request->name ) . '-' . str_random(10) . '.' . $featured->getClientOriginalExtension();

            try {
                if ( file_exists($category->image) ) {
                    unlink( $category->image );
                }    
            } catch (Exception $e) {
                
            }

            Image::make($featured)->resize(260,260)->save('uploads/categories/'. $filename);

            $fileurl = 'uploads/categories/' . $filename; 
        
        }


        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->image = $fileurl;
        if ( $request->parentId ) {
            $category->parentId = $request->parentId;
        }
        $category->featured = $request->featured;
        if ( $request->menuOrder ) {
            $category->menuOrder = $request->menuOrder;
        }
        $category->offered = $request->offered;
        if( $request->icon ) {
        $category->iconID = $request->icon;
        }
        $category->save();

        Session::flash('success', 'Succesfully updated.');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ( file_exists($category->featured) ) {
            unlink( $category->featured );
        }

        $category->delete();

        Session::flash('success', 'Succesfully removed.');

        return redirect()->back();
    }
}