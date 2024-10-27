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
    <section class="banner">
        @include('client.partials.banner')
    </section>
    <!-- New Products Section -->
    <section class="new-products">
        @include('client.partials.new_product')
    </section>
    <!-- Store Section -->
    <section class="store">
        @include('client.partials.shop')

    </section>
    <section class="new-products">
        @include('client.partials.hot_product')
    </section>
    <!-- Footer -->
    <footer>
        @include('client.partials.footer')
    </footer>

    <script src="/Front-end/Home/Home.js"></script>
</body>

</html>