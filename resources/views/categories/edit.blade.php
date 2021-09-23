@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Update the Category:</strong>
        <small>Inputs with * are required.</small>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('errors.errors')
                <form action="{{ route('categories.update', $category->id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name*:</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Slug*</label>
                                <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Parent Category:</label>
                                <select name="parentId" class="form-control">
                                    <option value="0">None</option>
                                    @foreach ( $categories as $cat )
                                    <option value="{{ $cat->id }}"
                                        {{ $cat->id == $category->parentId ? 'selected' : '' }}>
                                        {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="icon">Choose Icon:</label>
                                <select name="icon" class="form-control">
                                    <option value="">-- Select one --</option>
                                    @foreach ($icons as $icon)
                                    <option value="{{ $icon->id }}"
                                        {{ $icon->id == $category->iconID ? 'selected' : '' }}>
                                        {{ $icon->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Update Featured Image (for app)*:</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-2">
                                @if( $category->image )
                                <img src="{{ asset( $category->image ) }}" width="80" height="70"
                                    alt="{{ $category->name }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Featured Category?</label>
                                <select name="featured" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1" {{ $category->featured ? 'selected' : '' }}>Yes
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Show on Menu?</label>
                                <select name="offered" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1" {{ $category->offered ? 'selected' : '' }}>Yes
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="menuorder">Menu Order</label>
                                <input type="number" min="1" name="menuOrder" class="form-control"
                                    value="{{ $category->menuOrder }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection