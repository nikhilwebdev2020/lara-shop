@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Your Products:</strong>
        <small>Inputs with * are required.</small>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">+ Add</a>
    </div>
    <div class="card-body">
        <span class="table-responsive">
            <table id="example" class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actual Rate</th>
                        <th>Discount</th>
                        <th>Selling Price</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <td>
                            @foreach( $p->images as $img )
                            <a href="{{asset('uploads/products/thumbnails/'.$img->image)}}" target="_blank">
                                <img src="{{asset('uploads/products/thumbnails/'.$img->image)}}" alt="Image" height="40"
                                    width="40" style="object-fit: contain;">
                            </a>
                            @endforeach
                        </td>
                        <td>{{ $p->productName }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>{{ $p->actualRate }}</td>
                        <td>{{ $p->discountPercent }}</td>
                        <td>{{ $p->rate }}</td>
                        <td>{!! $p->featured ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>
                        <td>
                            <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-info edit-btn">Edit</a>
                            <form action="{{route('products.destroy', $p->id)}}" onclick="event.preventDefault();
                                        var r=confirm('Are you sure you want to delete this item?');
                                        if(r== true){ this.submit(); }" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <input type="submit" class="btn btn-sm btn-danger delete-btn" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </span>
    </div>
</div>
@endsection