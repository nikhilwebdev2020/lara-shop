@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        Manage Categories: <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm">Add New <i
                class="fa fa-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('errors.errors')
                <table id="example" class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Parent Category</th>
                            <th>Featured</th>
                            <th>Order</th>
                            <th>Edit</th>
                            <th>Featured</th>
                            <th>Icon</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->parentId ? $cat->parent() : '-' }}</td>
                            <td>
                                {!! $cat->featured ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}
                            </td>
                            <td>{{ $cat->menuOrder }}</td>
                            <td>{{ $cat->icon->title }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $cat->id) }}"
                                    class="btn btn-sm btn-danger">Edit</a>
                            </td>
                            <td>
                                <img src="{{ asset( $cat->image ) }}" width="60" height="60" alt="">
                            </td>
                            <td>{{ $cat->products()->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection