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
      
    </ul>
  </nav>
  <!-- Phần tìm kiếm, đăng ký, giỏ hàng nha các bé -->
  <div class="header-icons">
   
    <form id="searchForm" style="display: flex; align-items: center; gap: 10px; border: 1px solid #ddd; padding: 8px; border-radius: 5px;">
      @csrf
      <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." style="border: none; outline: none;" />

      <button type="submit" style="background: none; border: none; cursor: pointer;">
        🔍
      </button>
      <a href="../Register/register.html" style="display: flex; align-items: center; justify-content: center;">
        <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.86 0-7 3.14-7 7 0 .553.447 1 1 1h12c.553 0 1-.447 1-1 0-3.86-3.14-7-7-7z"/>
        </svg>
      </a>
      <a href="../DonHang/donhang.html" style="display: flex; align-items: center; justify-content: center;">
        <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 18c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zm10 0c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zM7 6h13c.553 0 1 .447 1 1s-.447 1-1 1h-1.333l-1.085 4.86c-.168.754-.855 1.285-1.625 1.285h-5.358c-.77 0-1.457-.531-1.625-1.285L5.333 8H4C3.447 8 3 7.553 3 7s.447-1 1-1h3c.48 0 .897.34.98.807L7 6zm0 0z"/>
        </svg>
      </a>
    </form>
  </div>