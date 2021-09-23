@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Add Icon</strong>
        <a href="{{ route('icons.index') }}" class="btn btn-sm btn-primary">Manage</a>
    </div>
    <div class="card-body">

        <form action="{{ route('icons.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="">Icon Title*:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="">Icon Img*:</label>
                    <input type="file" name="iconImage" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Add" class="btn btn-success">
            </div>

        </form>

    </div>
</div>
@endsection