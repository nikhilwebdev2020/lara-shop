@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        @include('errors.errors')
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>Product Name*:</label>
                <input type="text" name="productName" value="{{ $product->productName }}" class="form-control">
            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-6">
                        <label>Select Category*:</label>
                        <select name="category" class="form-control">
                            @if( count($categories) )

                            @foreach ( $categories as $category )
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->categoryId ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                            @endforeach

                            @else
                            <option value="">-- Select --</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Unit Type*:</label>
                        <select name="unit" class="form-control">
                            <option value="pcs" {{ $product->unit == 'pcs' ? 'selected' : '' }}>Pieces</option>
                            <option value="package" {{ $product->unit == 'package' ? 'selected' : '' }}>Package</option>
                            <option value="set" {{ $product->unit == 'set' ? 'selected' : '' }}>Set</option>
                            <option value="dozen" {{ $product->unit == 'dozen' ? 'selected' : '' }}>Dozen</option>
                            <option value="kg" {{ $product->unit == 'kg' ? 'selected' : '' }}>Kilograms</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">

                        <img class="featuredImage"
                            src="{{ asset( 'uploads/products/thumbnails/' . $product->featuredImage ) }}" alt=""
                            height="70" width="80" style="object-fit: contain;">

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            @foreach( $product->images as $img )
                            <div class="col-md-4">
                                <figure class="images">
                                    <img src="{{ asset( 'uploads/products/thumbnails/' . $img->image ) }}" alt=""
                                        height="60" style="object-fit: contain;width: 100%">
                                    <a href="{{ route('remove.image', $img->id) }}" title="Click to remove image."><i
                                            class="fa fa-trash"></i></a>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Update Featured Image:</label>
                        <input type="file" name="featuredImage" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Add new Images (if any):</label>
                        <input multiple type="file" class="form-control" name="images[]">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Keywords (Highlights):</label><br>
                        <small style="color:red">Add keywords separated by comma.</small>
                        <input type="text" name="keywords" class="form-control" placeholder="keyword1, keyword2, ..."
                            value="{{ $product->keywords }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Quantity (optional):</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Featured?</label>
                        <select name="featured" class="form-control">
                            <option value="0">No</option>
                            <option value="1" {{ $product->featured ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Actual Rate*:</label>
                        <input type="text" name="actualRate" value="{{ $product->actualRate }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Discount (% or $)</label>
                        <input type="text" name="discount" value="{{ $product->discountPercent }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Selling Price (Rate)*:</label>
                        <input type="text" name="sellingPrice" value="{{ $product->rate }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Tags (optional):</label>
                <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                    @if( count($tags) )

                    @foreach( $tags as $tag )
                    <option value="{{ $tag->id }}"
                        {{ ( count($product->tags) && in_array($tag->id, $product->tags()->pluck('tags_id')->toArray()) ) ? 'selected' : '' }}>
                        {{ $tag->name }}</option>
                    @endforeach

                    @else
                    <option value="">No Tags</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Short Description*:</label>
                <textarea name="shortDesc" rows="3" class="form-control">{{ $product->shortDesc }}</textarea>
            </div>

            <div class="form-group">
                <label>More Details/Specifications:</label>
                <textarea name="description" class="form-control" cols="30"
                    rows="10">{!! $product->description !!}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success btn-lg" name="submit_product" value="Update Product">
            </div>

        </form>
    </div>
</div>
@endsection