@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Add new Product:</strong>
        <small>Inputs with * are required.</small>
    </div>
    <div class="card-body">
        @include('errors.errors')
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label>Product Name*:</label>
                <input type="text" name="productName" value="{{ old('productName') }}" class="form-control">
            </div>

            <div class="form-group">

                <div class="row">
                    <div class="col-md-6">
                        <label>Select Category*:</label>
                        <select name="category" class="form-control">
                            @if( count($categories) )

                            @foreach ( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                            @else
                            <option value="">-- Select --</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Unit Type*:</label>
                        <select name="unit" class="form-control">
                            <option value="pcs">Pieces</option>
                            <option value="package">Package</option>
                            <option value="set">Set</option>
                            <option value="dozen">Dozen</option>
                            <option value="kg">Kilograms ( kg )</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Featured Image*:</label>
                        <input type="file" name="featuredImage" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Choose Images:</label>
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
                            value="{{ old('keywords') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Quantity (optional):</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Featured?</label>
                        <select name="featured" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Actual Rate*:</label>
                        <input type="text" name="actualRate" value="{{ old('actualRate') }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Discount (% or $)</label>
                        <input type="text" name="discount" value="{{ old('discount') }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Selling Price (Rate)*:</label>
                        <input type="text" name="sellingPrice" value="{{ old('sellingPrice') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Tags (optional):</label>
                <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                    @if( count($tags) )

                    @foreach( $tags as $tag )
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach

                    @else
                    <option value="">No Tags</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Short Description*:</label>
                <textarea name="shortDesc" rows="3" class="form-control">{{ old('shortDesc') }}</textarea>
            </div>

            <div class="form-group">
                <label>More Details/Specifications:</label>
                <textarea name="description" class="form-control" cols="30"
                    rows="10">{!! old('description') !!}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success btn-lg" name="submit_product" value="Add Product">
            </div>

        </form>
    </div>
</div>
@endsection