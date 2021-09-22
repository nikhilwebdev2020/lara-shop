@if (count($errors))

<div class="alert  alert-danger alert-dismissible" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <ol>{{ $error }}</ol>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif