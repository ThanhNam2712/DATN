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
    @yield('Hot_Product')
    <br>
    <!-- New Products Section -->
    @yield('New_Product')
    <!-- Store Section -->
    <!-- <section class="store">
        @include('client.partials.shop')

    </section> -->
    
    <!-- Footer -->
    <footer>
        @include('client.partials.footer')
    </footer>

    <script src="/Front-end/Home/Home.js"></script>
</body>

</html>