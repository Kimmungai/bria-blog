<!DOCTYPE html>
<html lang="en">
<head>
    @include ('partials._head')
</head>
        <body>

              @include ('partials._nav')<!-- include navigation bar partial -->

              <div class="container"> <!-- start container -->

              @include('partials._messages')

              {{-- check and display login status --}}
              {{ Auth::check() ? "Logged in" : "Logged Out"}}

              @yield('content')
              {{-- include the footer partials --}}
              @include('partials._footer')

                </div> <!-- end of container-->

              @include('partials._javascript')
              {{-- load scripts --}}
              @yield('scripts')
          </body>
</html>