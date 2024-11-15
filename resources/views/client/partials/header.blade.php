<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<div class="logo">
    <a href="Home.html"><img src="/Front-end/anh/logo.png" alt="Logo" /></a>
  </div>
  <nav>
    <ul>
      <li><a href="/">Trang chủ</a></li>
      <li class="dropdown">
        <a href="#">Bộ sưu tập</a>
        <ul class="dropdown-menu">
          <li><a href="../danhmuc/polo/polo.html">Áo Polo</a></li>
          <li><a href="../danhmuc/phong/phong.html">Áo phông</a></li>
          <li><a href="../danhmuc/quanaobo/quanaobo.html">Quần áo bộ</a></li>
          <li><a href="../danhmuc/somi/somi.html"> Áo sơ mi</a></li>
        </ul>
      </li>
      <li><a href="{{ route('gioithieu')}}">Giới thiệu</a></li>
      <li><a href="{{ route('lienhe')}}">Liên hệ</a></li>
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
    <a href="../DonHang/donhang.html" style="display: flex; align-items: center; justify-content: center; padding-left:10px">
        <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 18c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zm10 0c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zM7 6h13c.553 0 1 .447 1 1s-.447 1-1 1h-1.333l-1.085 4.86c-.168.754-.855 1.285-1.625 1.285h-5.358c-.77 0-1.457-.531-1.625-1.285L5.333 8H4C3.447 8 3 7.553 3 7s.447-1 1-1h3c.48 0 .897.34.98.807L7 6zm0 0z"/>
        </svg>
      </a>
  </div>

  <style>
    .dropdown-menu {
      display: none;
    }
  </style>
