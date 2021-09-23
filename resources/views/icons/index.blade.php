@extends('layouts.app')

@section('content')
<div class="card has-border no-padding">
    <div class="card-header">
        <strong>Manage Icons</strong>
        <a href="{{ route('icons.create') }}" class="btn btn-sm btn-primary">Add +</a>
    </div>
    <div class="card-body">

        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th width="60">S.N.</th>
                    <th>Title</th>
                    <th>Icon</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($icons as $icon)
                <tr>
                    <td>{{ $icon->id }}.</td>
                    <td>{{ $icon->title }}</td>
                    <td>
                        <img src="{{ asset($icon->filename) }}" alt="{{ $icon->title }}" height="60px">
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@endsection