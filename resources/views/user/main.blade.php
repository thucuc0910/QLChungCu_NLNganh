<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body>
    <!--class="animsition" -->

    
    <!-- Header -->
    @include('user.header')

    @yield('user.content')

    @include('user.footer')

</body>

</html>