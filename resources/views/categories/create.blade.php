@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Create a Category:</strong>
        <small>Inputs with * are required.</small>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('errors.errors')
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Name*:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Parent Category:</label>
                                <select name="parentId" class="form-control">
                                    <option value="">None</option>
                                    @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="icon">Choose Icon:</label>
                                <select name="icon" class="form-control">
                                    <option value="">-- Select one --</option>
                                    @foreach ($icons as $icon)
                                    <option value="{{ $icon->id }}">{{ $icon->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Featured Image:</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Featured Category?</label>
                                <select name="featured" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Show on Menu?</label>
                                <select name="offered" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="menuorder">Menu Order</label>
                                <input type="number" min="1" class="form-control" value="{{ old('menuOrder') }}"
                                    name="menuOrder">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <input type="submit" name="create" value="Create" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection