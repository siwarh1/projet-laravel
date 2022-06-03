<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>

@include('partials._nav')

@yield('post-header')

        <!-- Main Content -->
<div class="container-fluid">


    <div class="row">

        @if(Auth::check())
            @include('partials._sidebar')

            <div class="col-md-10">
                @else
                    <div class="col-md-12">
                        @endif
                        @include('partials._messages')
                        @yield('content')
                    </div>
            </div>

    </div>

    <hr>

    <!-- Footer -->
    <footer>

        <div class="container">
            @include('partials._footer')

        </div>
    </footer>

@include('partials._javascript')

@yield('scripts')
</body>

</html>

