<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>Jesco - Fashoin eCommerce HTML Template</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/shop_pages/assets') }}/images/favicon/favicon.ico"
        type="image/png">


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/shop_pages/assets') }}/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="{{ url('assets/shop_pages/assets') }}/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="{{ url('assets/shop_pages/assets') }}/css/style.min.css">

    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <script src ="{{ url('assets/admin')}}/ckeditor/ckeditor.js"></script>
</head>

<body>
    @include('shop_pages.layouts.header')

    @yield('content')

    @include('shop_pages.layouts.footer')


</body>


</html>
