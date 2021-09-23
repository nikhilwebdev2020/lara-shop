<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;
use App\Tags;
use App\Productimage;
use Image;
use Auth;
use App\Brand;

class ProductController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = User::find(Auth::id())->products()->latest()->get();
        if( Auth::user()->hasRoles('Admin') ){
            $products = Product::latest()->get();
            return view('admin.products')->with('products', $products);
        }elseif ( Auth::user()->hasRoles('Guest') ) {
            return redirect('/');
        }

        return view('products.index')->with('products', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::orderBy('name')->get();
        $brands = Brand::latest()->get();

        $tags = Tags::orderBy('name')->get();
        return view('products.create', compact('categories', 'tags', 'brands'));
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
                'productName' => 'required|unique:products',
                'category' => 'required',
                'featuredImage' => 'required',
                'quantity' => 'required|numeric|min:1',
                'unit' => 'required',
                'featured' => 'required',
                'actualRate' => 'required|numeric|min:1',
                'sellingPrice' => 'required|numeric|min:1',
                'shortDesc' => 'required'
        ]);

        // Upload Featured Image
        $featuredImage = $request->file('featuredImage');
        $ffname = 'featured-' . str_slug( $request->productName ) . '-' . str_random(8) . '.' . $featuredImage->getClientOriginalExtension();

        // Image::make($featuredImage)->resize(520, 512)->save('uploads/products/'. $ffname);
        // Image::make($featuredImage)->resize(300, 320)->save('uploads/products/thumbnails/'. $ffname);
        Image::make($featuredImage)->resize(430, 430)->save('uploads/products/'. $ffname);
        Image::make($featuredImage)->resize(260, 260)->save('uploads/products/thumbnails/'. $ffname);

        //Upload file and get imagename
        $images = $request->file( 'images' );
        $filenames = [];
        $newfilename = '';
        if( $images ){
            ini_set('memory_limit', '256M');
            foreach ($images as $image) {

                $newfilename = str_slug( $request->productName ) . '-' . $image->getSize() . str_random(8) . '.'. $image->getClientOriginalExtension();

                $filenames[] = $newfilename;

                // Image::make($image)->resize(520, 512)->save('uploads/products/'. $newfilename);
                // Image::make($image)->resize(300,320)->save('uploads/products/thumbnails/'. $newfilename);
                Image::make($image)->resize(430, 430)->save('uploads/products/'. $newfilename);
                Image::make($image)->resize(260,260)->save('uploads/products/thumbnails/'. $newfilename);

            }

        }

        $category = Category::find($request->category);

        $product = new Product;

        $product->productName = $request->productName;
        $product->slug = str_slug($request->productName);
        $product->unit = $request->unit;
        $product->rate = $request->sellingPrice;
        $product->categoryId = $request->category;
        $product->categoryName = $category->name;
        $product->availableItems = $request->quantity;
        $product->shortDesc = $request->shortDesc;
        $product->highlights = $request->keywords;
        $product->description = $request->description;
        $product->entryDate = date('Y-m-d');
        $product->quantity = $request->quantity;
        $product->featured = $request->featured;
        $product->user_id = Auth::id();
        $product->newProduct = 1;
        $product->discountPercent = ($request->actualRate - $request->sellingPrice);
        $product->actualRate = $request->actualRate;
        $product->merchantId = Auth::id();
        $product->avgRating = 0;
        if ( $request->tags ) {
            $product->productTags = json_encode($request->tags);
        }
        $product->keywords = $request->keywords;
        $product->brand_id = $request->brand_id;
        // $implode = implode(',' ,$request->theme_no);
        // $product->theme_no = $implode;

        $product->featuredImage = $ffname;

        $product->save();

        if ( $request->tags ) {
            $product->tags()->attach($request->tags);
        }

        if( $images ){

            foreach ($filenames as $f) {
                $img = new Productimage;

                $img->product_id = $product->id;
                $img->image = $f;

                $img->save();
            }

        }

        if( $this->notification('', $request->productName, $product->id, $request->category) ){
            session()->flash('success','Succesfully added your product !');

            return redirect()->back();
        }else{
            session()->flash('success','Succesfully added your product');

            return redirect()->back();
        }


    }

public function productDTO($productId)
    {

        $selections = ['id', 'productName', 'unit', 'rate', 'categoryId', 'categoryName', 'availableItems', 'parentId', 'featuredImage', 'shortDesc', 'highlights', 'description', 'entryDate', 'quantity', 'featured', 'user_id as userId', 'newProduct', 'merchantId', 'discountPercent', 'actualRate', 'created_at'];

        $product = Product::where('id', $productId)->select($selections)->first();

        $product->featuredImage = url('/') . '/uploads/products/' . $product->featuredImage;

        $data = [];

        $data['productId'] = $product->id;
        $data['productName'] = $product->productName;
        $data['unit'] = $product->unit;
        $data['rate'] = (float) $product->rate;
        $data['categoryId'] = $product->categoryId;
        $data['categoryName'] = $product->categoryName;
        $data['availableItems'] = $product->availableItems;
        $data['parentId'] = $product->parentId;

        // Images here
        $data['images'][0]['imageId'] = 1;
        $data['images'][0]['image'] = $product->featuredImage;

        $i = 1;
        if ( count($product->images) ) {
            foreach ($product->images as $img) {

                $data['images'][$i]['imageId'] = $i + 1;
                $data['images'][$i]['image'] = url('/') . '/uploads/products/' . $img->image;

                $i++;
            }
        }

        $data['shortDesc'] = $product->shortDesc;
        $data['highlights'] = $product->highlights;
        $data['description'] = $product->description;
        $data['entryDate'] = $product->created_at->format('Y-m-d H:g:s');
        $data['quantity'] = $product->quantity;
        $data['featured'] = $product->featured ? true : false;
        $data['userId'] = $product->userId;

        $data['newProduct'] = $product->newProduct ? true : false;
        $data['discountPercent'] = (float) $product->discountPercent;
        $data['actualRate'] = $product->actualRate;
        $data['merchantId'] = (int) $product->merchantId;
        $data['merchant'] = [];

        //Get reviews
        $reviews = [];
        if ( count($product->reviews) ) {

            foreach ($product->reviews()->select('id')->get() as $review) {
                $data['reviewDtos'][] = $this->reviewsDto($review->id);
            }

        }else{
            $data['reviewDtos'] = [];
        }

        //No of reviews
        $data['nosReview'] = $product->reviews()->count();

        // avgRating
        $avgRating = $product->reviews()->avg('rating');
        $data['avgRating'] = $avgRating ? $avgRating : 0;

        // ancestorCategories
        $ancestorCategories = Category::find($product->categoryId);
        // First current category
        $data['ancestorCategories'][] = $this->categoryDTO($product->categoryId);
        // Then parent category
        if ( $ancestorCategories->parentId != 0 ) {
            $data['ancestorCategories'][] = $this->categoryDTO($ancestorCategories->parentId);
        }else{
            $data['ancestorCategories'] = [];
        }

        $data['totalSoldQuantity'] = 0;
        $data['productTags'] = $product->tags()->pluck('name')->toArray();

        return $data;

    }

    private function categoryDTO($categoryId)
    {

        $selections = ['id as categoryId', 'name as categoryName', 'parentId', 'image', 'featured', 'offered'];

        $category = Category::select($selections)->where('id', $categoryId)->first();

        $category->image = url('/') . '/' . $category->image;
        $category->featured = $category->featured ? true : false;
        $category->offered = $category->offered ? true : false;

        if ( $category ) {
            return $category;
        }

        return [];
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();
        $brands = Brand::latest()->get();


        $tags = Tags::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories', 'tags', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validateWith([
                'productName' => 'required',
                'category' => 'required',
                'featuredImage' => 'image',
                'unit' => 'required',
                'quantity' => 'required|numeric|min:1',
                'unit' => 'required',
                'featured' => 'required',
                'actualRate' => 'required|numeric|min:1',
                'sellingPrice' => 'required|numeric|min:1',
                'shortDesc' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $featuredImage = $request->file('featuredImage');

        if ( $featuredImage ) {

            $ffname = 'featured-' . str_slug( $request->productName ) . '-' . str_random(8) . '.' . $featuredImage->getClientOriginalExtension();

            if ( file_exists('uploads/products/' . $product->featuredImage) ) {
                unlink('uploads/products/' . $product->featuredImage);
            }
            if ( file_exists('uploads/products/thumbnails/' . $product->featuredImage) ) {
                unlink('uploads/products/thumbnails/' . $product->featuredImage);
            }

            Image::make($featuredImage)->resize(430, 430)->save('uploads/products/'. $ffname);
            Image::make($featuredImage)->resize(260, 260)->save('uploads/products/thumbnails/'. $ffname);

        }

        //Upload file and get imagename
        $images = $request->file( 'images' );
        $filenames = [];
        $newfilename = '';
        if( $images ){
            ini_set('memory_limit', '256M');
            foreach ($images as $image) {

                $newfilename = str_slug( $request->productName ) . '-' . $image->getSize() . str_random(8) . '.'. $image->getClientOriginalExtension();

                $filenames[] = $newfilename;

                Image::make($image)->resize(430, 430)->save('uploads/products/'. $newfilename);
                Image::make($image)->resize(260,260)->save('uploads/products/thumbnails/'. $newfilename);

            }

        }

        $category = Category::find($request->category);



        $product->productName = $request->productName;
        $product->slug = str_slug($request->productName);
        $product->unit = $request->unit;
        $product->rate = $request->sellingPrice;
        $product->categoryId = $request->category;
        $product->categoryName = $category->name;
        $product->availableItems = $request->quantity;
        $product->shortDesc = $request->shortDesc;
        $product->highlights = $request->keywords;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->featured = $request->featured;
        $product->discountPercent = $request->discount;
        $product->actualRate = $request->actualRate;


        // $implode = implode(',' ,$request->theme_no);
        // $product->theme_no = $implode;

        $product->avgRating = 0;
        if ( $request->tags ) {
            $product->productTags = json_encode($request->tags);
        }
        $product->keywords = $request->keywords;
        $product->brand_id = $request->brand_id;

        if ( $featuredImage ) {
            $product->featuredImage = $ffname;
        }

        $product->save();

        if ( $request->tags ) {
            $product->tags()->sync($request->tags);
        }

        foreach ($filenames as $f) {
            $img = new Productimage;

            $img->product_id = $product->id;
            $img->image = $f;

            $img->save();
        }

        session()->flash('success','Succesfully updated your product.');

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {

            if ( file_exists('uploads/products/' . $product->featuredImage) ) {
            unlink('uploads/products/' . $product->featuredImage);
            }
            if ( file_exists('uploads/products/thumbnails/' . $product->featuredImage) ) {
                unlink('uploads/products/thumbnails/' . $product->featuredImage);
            }

        } catch (Exception $e) {

        }

        try {

            $images = $product->images;

            if ( count($images) ) {
                foreach ($images as $img) {

                    if ( file_exists('uploads/products/' . $img->image) ) {
                        unlink('uploads/products/' . $img->image);
                    }

                    if ( file_exists('uploads/products/thumbnails/' . $img->image) ) {
                        unlink('uploads/products/thumbnails/' . $img->image);
                    }

                }
            }

        } catch (Exception $e) { }

        Productimage::where('product_id', $id)->delete();
        $product->delete();

        session()->flash('success', 'Succesfully removed the product.');

        return redirect()->back();

    }

    public function remove_image($id) {

        $img = Productimage::findOrFail($id);

        $imagescount = Productimage::where('product_id', $img->product_id)->count();

        if ( $imagescount > 1 ) {

                try {

                    if ( file_exists('uploads/products/' . $img->image) ) {
                        unlink('uploads/products/' . $img->image);
                    }

                    if ( file_exists('uploads/products/thumbnails/' . $img->image) ) {
                        unlink('uploads/products/thumbnails/' . $img->image);
                    }

                $img->delete();

                session()->flash('success', 'Removed the image.');

                return redirect()->back();

            } catch (Exception $e) {  }

        }

        session()->flash('info', 'There needs to be at least one remaining image for the product before deleting.');

        return redirect()->back();

    }

}