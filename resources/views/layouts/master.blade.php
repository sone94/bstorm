@include('includes.head')
    <body class="antialiased">
        <div class="page-container">
            @include('flash-message')
            <div class="container">
                @yield('content')
            </div>
        </div>
    </body>
</html>
