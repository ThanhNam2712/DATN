<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<div class="logo">
    <img src="/Front-end/Home/anh/logo.png" alt="Logo AE Boutique" />
  </div>
  <nav>
    <ul>
      <li><a href="Home.html">Trang chủ</a></li>
      <li class="dropdown">
        <a href="#">Bộ sưu tập</a>
        <ul class="dropdown-menu">
          <li><a href="#">Áo polo</a></li>
          <li><a href="#">Áo phông</a></li>
          <li><a href="#">Quần áo bộ</a></li>
          <li><a href="#">Sơ mi</a></li>
        </ul>
      </li>
      <li><a href="gioithieu.html">Giới thiệu</a></li>
      <li><a href="lienhe.html">Liên hệ</a></li>
    </ul>
  </nav>
<div class="header-icons d-flex align-items-center">
  <form action="" class="me-3">
    @csrf
    <input type="text" class="form-control" style="height: 30px; font-size: 14px;" placeholder="Search">
  </form>

  <div class="dropdown user-menu">
    <a href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="/Front-end/Home/anh/user.jpg" alt="User" style="width: 30px; height: 30px;">
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      @auth
        <li class="dropdown-item-text">Xin chào, {{ Auth::user()->name }}!</li>
        <li><hr class="dropdown-divider"></li>

        @if(Auth::user()->role->name === 'Admin')
          <li>
            <a class="dropdown-item" href="{{ route('admin.statistic.index') }}">Trang quản trị</a>
          </li>
        @endif

        <li>
          <a class="dropdown-item" href="{{ route('auth.user.account') }}">Thông tin tài khoản</a>
        </li>
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


  <a href="#" class="ms-3">
    <img src="/Front-end/Home/anh/cart.jpg" alt="Cart" style="width: 30px; height: 30px;">
  </a>
</div>

<style>
  .dropdown-menu {
    display: none; /* Ẩn menu mặc định */
  }
</style>

