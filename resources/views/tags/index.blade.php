@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Manage Tags:</strong>
        <a href="{{ route('tags.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( count($tags) )
                        @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-danger">Edit</a>
                            </td>
                            <td>{{ $tag->products()->count() }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">No tags yet.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection