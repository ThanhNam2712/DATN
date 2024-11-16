<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AE Boutique</title>
    
    <link rel="stylesheet" href="/Front-end/Home/Home.css" />
    <link rel="stylesheet" href="/Front-end/ThanhCong/succes.css">
    <link rel="stylesheet" href="/Front-end/DonHang/donhang.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/apivn.js"></script>
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