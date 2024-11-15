<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AE Boutique</title>
    <link rel="stylesheet" href="/Front-end/Home/Home.css" />
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
    @yield('Shop')
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