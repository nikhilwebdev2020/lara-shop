@include('theme.partials.header')

@include('theme.home.top-nav')

<main class="{{ isset($template) ? $template : '' }}">
    @yield('content')
</main>

@include('theme.partials.footer')