@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Update Tag:</strong>
        <small>Inputs with * are required.</small>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('errors.errors')
                <form action="{{ route('tags.update', $tag->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field("PATCH") }}
                    <div class="form-group">
                        <label>Name*:</label>
                        <input type="text" name="name" value="{{ $tag->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="create" value="Update" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection