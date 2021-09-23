<?php

namespace App\Http\Controllers;

use App\Icon;
use Illuminate\Http\Request;
use Image;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = Icon::all();
        $title = "Manage Icons";
        return view('icons.index', compact('title', 'icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = 'Add Icon';
        return view('icons.create', compact('title'));
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
            'title' => 'required',
            'image' => 'image'
        ]);

        $fileurl = '';
        if ( $featured = $request->file('iconImage') ) {
            $filename = 'icon-' . str_slug( $request->title ) . '-' . str_random(3) . '.' . $featured->getClientOriginalExtension();
            Image::make($featured)->save('uploads/icons/'. $filename);
            $fileurl = 'uploads/icons/' . $filename; 
        }

        $data = new Icon;
        $data->title = $request->title;
        $data->filename = $fileurl;
        $data->status = 1;
        $data->save();

        return redirect()->route('icons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Icon $icon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Icon $icon)
    {
        $this->validateWith([
            'title' => 'required',
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
            

            Image::make($featured)->resize(250,270)->save('uploads/categories/'. $filename);

            $fileurl = 'uploads/categories/' . $filename; 
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Icon $icon)
    {
        //
    }
}