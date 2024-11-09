<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AE Boutique</title>
    
    <link rel="stylesheet" href="/Front-end/Home/Home.css" />
    <link rel="stylesheet" href="/Front-end/ThanhCong/succes.css">
    {{--  <link rel="stylesheet" href="/Front-end/DonHang/donhang.css">  --}}
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   
</head>
<body>
    <!-- Header -->
    <header>
        @include('client.partials.header')
    </header>
    <!-- Main Banner -->
    @yield('Banner')
    <!-- Hot Products Section -->
     @yield('Main')
    @yield('Hot_Product')
    <br>
    <!-- New Products Section -->
    @yield('New_Product')
    <!-- Store Section -->
    <!-- Footer -->
    <footer>
        @include('client.partials.footer')
    </footer>

    <script src="/Front-end/Home/Home.js"></script>

</body>

</html>