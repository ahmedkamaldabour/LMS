<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    @include('Admin.inc.head')

</head>
<body class="layout-boxed enable-secondaryNav">
<!-- BEGIN LOADER -->
@include('Admin.inc.loader')
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('Admin.inc.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('Admin.inc.sidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    @yield('content')
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
@include('Admin.inc.footer')
</body>
</html>
