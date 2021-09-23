@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Create a Tag:</strong>
        <small>Inputs with * are required.</small>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('errors.errors')
                <form action="{{ route('tags.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Name*:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
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