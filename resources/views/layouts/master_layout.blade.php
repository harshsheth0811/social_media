<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
</head>

<body>
    <nav>
        @include('components.nav')
    </nav>

    <div class="container">
        <div class="left-sidebar">
            @include('components.leftside')
        </div>

        <div class="main-content">
            @yield('main')
        </div>

        <div class="right-sidebar">
            @include('components.rightside')
        </div>
    </div>

    <div class="footer">
        @include('components.footer')
    </div>

    {{-- jQuery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ url('javascript/script.js') }}"></script>
    
</body>

</html>
