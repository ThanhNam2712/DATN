// Tạo một hàm để thêm nội dung vào trang web
function createHTMLStructure() {
  // Tạo phần Header
  const header = document.createElement("header");
  header.innerHTML = `
    <div class="logo">
      <a href="../Home/Home.html">
        <img src="../anh/logo.png" alt="Logo" />
      </a>
    </div>
    <nav>
      <ul>
        <li><a href="../Home/Home.html">Trang chủ</a></li>
        <li><a href="gioithieu.html">Giới thiệu</a></li>
        <li><a href="../lienhe/lienhe.html">Liên hệ</a></li>
        <li class="dropdown">
          <a href="#">Bộ sưu tập</a>
          <ul class="dropdown-menu">
            <li><a href="../danhmuc/polo/polo.html">Áo polo</a></li>
            <li><a href="../danhmuc/phong/phong.html">Áo phông</a></li>
            <li><a href="../danhmuc/quanaobo/quanaobo.html">Quần áo bộ</a></li>
            <li><a href="../danhmuc/somi/somi.html">Sơ mi</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="header-icons">
      <form id="searchForm" onsubmit="return searchProduct()" style="display: flex; align-items: center; gap: 10px; border: 1px solid #ddd; padding: 8px; border-radius: 5px;">
        <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." style="border: none; outline: none" />
        <button type="submit" style="background: none; border: none; cursor: pointer">🔍</button>
        <a href="../Register/register.html" style="display: flex; align-items: center; justify-content: center">
          <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.86 0-7 3.14-7 7 0 .553.447 1 1 1h12c.553 0 1-.447 1-1 0-3.86-3.14-7-7-7z" />
          </svg>
        </a>
        <a href="../DonHang/donhang.html" style="display: flex; align-items: center; justify-content: center">
          <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 18c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zm10 0c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zM7 6h13c.553 0 1 .447 1 1s-.447 1-1 1h-1.333l-1.085 4.86c-.168.754-.855 1.285-1.625 1.285h-5.358c-.77 0-1.457-.531-1.625-1.285L5.333 8H4C3.447 8 3 7.553 3 7s.447-1 1-1h3c.48 0 .897.34.98.807L7 6zm0 0z" />
          </svg>
        </a>
      </form>
    </div>
  `;

  // Thêm phần Header vào body
  document.body.appendChild(header);

  // Tạo phần Banner
  const banner = document.createElement("section");
  banner.classList.add("banner");
  banner.innerHTML = `
    <div class="banner-container">
      <!-- Thêm các slide banner vào đây -->
      ${[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
        .map(
          (i) =>
            `<div class="banner-slide"><img src="../anh/banner/banner${i}.jpg" alt="Banner ${i}" /></div>`
        )
        .join("")}
    </div>
  `;
  document.body.appendChild(banner);

  // Tạo phần About Us
  const aboutUs = document.createElement("section");
  aboutUs.classList.add("about-us");
  aboutUs.innerHTML = `
    <img src="../anh/aeboutique.webp" alt="AE Boutique" />
    <ul>
      <li>      AE Boutique là một cửa hàng thời trang chuyên về quần áo, với phong cách trẻ trung, hiện đại và đa dạng. Cửa hàng này hướng đến đối tượng khách hàng yêu thích sự sáng tạo, phong cách và cá tính trong việc lựa chọn trang phục. AE Boutique có thể cung cấp nhiều dòng sản phẩm từ quần áo thường ngày, trang phục công sở cho đến những bộ cánh dự tiệc sang trọng.,
</li>
      <li>      Điểm mạnh của AE Boutique là sự cập nhật liên tục các xu hướng thời trang mới nhất, đồng thời mang đến những sản phẩm với chất lượng tốt, giá cả hợp lý. Cửa hàng cũng thường xuyên có các chương trình khuyến mãi và ưu đãi đặc biệt dành cho khách hàng.,
</li>
      <li>      Ngoài ra, AE Boutique có thể có dịch vụ mua hàng online, giúp khách hàng dễ dàng lựa chọn và mua sắm các sản phẩm thời trang một cách tiện lợi.,
</li>
    </ul>
  `;
  document.body.appendChild(aboutUs);

  // Tạo phần Footer
  const footer = document.createElement("footer");
  footer.innerHTML = `
    <hr />
    <div class="footer-container">
      <div class="footer-item">
        <h5>Shop AE Boutique</h5>
        <h6>Shop AE Boutique chuyên buôn, sỉ, lẻ, order hàng thời trang...</h6>
        <div class="social-icons">
          <a href="https://www.facebook.com/aeboutique69"><img src="../anh/fb.png" alt="Facebook" /></a>
          <a href="#"><img src="../anh/youtube.png" alt="YouTube" /></a>
        </div>
      </div>
      <div class="footer-item">
        <h5>Liên kết nhanh</h5>
        <ul>
          <li><a href="#">Hướng dẫn đặt hàng</a></li>
          <li><a href="#">Hướng dẫn thanh toán</a></li>
          <li><a href="#">Chính sách đổi trả hàng</a></li>
          <li><a href="#">Liên hệ với chúng tôi</a></li>
        </ul>
      </div>
      <div class="footer-item">
        <h5>Hotline hỗ trợ 24/7</h5>
        <div class="hotline"><span>0975986096</span></div>
        <h5>Chấp nhận thanh toán</h5>
        <div class="payment-icons">
          <img src="../anh/momo.png" alt="Momo" />
        </div>
      </div>
    </div>
  `;
  document.body.appendChild(footer);
}

// Gọi hàm để tạo cấu trúc HTML
createHTMLStructure();
