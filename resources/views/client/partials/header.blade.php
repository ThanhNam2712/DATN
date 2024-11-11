<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<div class="logo">
    <a href="Home.html"><img src="/Front-end/anh/logo.png" alt="Logo" /></a>
  </div>
  <nav>
    <ul>
      <li><a href="Home.html">Trang chủ</a></li>
      <li><a href="../gioithieu/gioithieu.html">Giới thiệu</a></li>
      <li><a href="../lienhe/lienhe.html">Liên hệ</a></li>
      <li class="dropdown">
        <a href="#">Bộ sưu tập</a>
        <ul class="dropdown-menu">
          <li><a href="../danhmuc/polo/polo.html">Áo Polo</a></li>
          <li><a href="../danhmuc/phong/phong.html">Áo phông</a></li>
          <li><a href="../danhmuc/quanaobo/quanaobo.html">Quần áo bộ</a></li>
          <li><a href="../danhmuc/somi/somi.html"> Áo sơ mi</a></li>
        </ul>
      </li>
      <li><a href="gioithieu.html">Giới thiệu</a></li>
      <li><a href="lienhe.html">Liên hệ</a></li>
    </ul>
  </nav>
  <div class="header-icons d-flex align-items-center">
    <!-- Phần tìm kiếm -->
    <form id="searchForm" class="me-3" style="display: flex; align-items: center; gap: 10px; border: 1px solid #ddd; padding: 8px; border-radius: 5px;">
      @csrf
      <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm..." style="border: none; outline: none; height: 30px; font-size: 14px;" />
      <button type="submit" style="background: none; border: none; cursor: pointer;">🔍</button>
    </form>

    <!-- Phần người dùng -->
    <div class="dropdown user-menu">
      <a href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/Front-end/anh/user.jpg" alt="User" style="width: 30px; height: 30px;">
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        @auth
          <li class="dropdown-item-text">Xin chào, {{ Auth::user()->name }}!</li>
          <li><hr class="dropdown-divider"></li>
          @if(Auth::user()->role->name === 'Admin')
            <li><a class="dropdown-item" href="{{ route('admin.statistic.index') }}">Trang quản trị</a></li>
          @endif
          <li><a class="dropdown-item" href="{{ route('auth.user.account') }}">Thông tin tài khoản</a></li>
          <li>
            <a class="dropdown-item" href="{{ route('account.logout') }}">Đăng xuất</a>
            <form id="logout-form" action="{{ route('account.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @else
          <li><a class="dropdown-item" href="{{ route('account.showFormLogin') }}">Đăng nhập</a></li>
          <li><a class="dropdown-item" href="{{ route('account.showForm') }}">Đăng ký</a></li>
        @endauth
      </ul>
    </div>

    <!-- Phần giỏ hàng -->
    <a href="#" class="ms-3">
      <img src="/Front-end/Home/cart.jpg" alt="Cart" style="width: 30px; height: 30px;">
    </a>
  </div>

  <style>
    .dropdown-menu {
      display: none;
    }
  </style>
