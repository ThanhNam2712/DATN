// Tạo một hàm để thêm nội dung vào trang web
function createHTMLStructure() {
  // Tạo phần Header
  const header = document.createElement("header");
  

  // Tạo phần Banner
  // const banner = document.createElement("section");
  // banner.classList.add("banner");
  // banner.innerHTML = `
  //   <div class="banner-container">
  //     <!-- Thêm các slide banner vào đây -->
  //     ${[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
  //       .map(
  //         (i) =>
  //           `<div class="banner-slide"><img src="../anh/banner/banner${i}.jpg" alt="Banner ${i}" /></div>`
  //       )
  //       .join("")}
  //   </div>
  // `;
  // document.body.appendChild(banner);

  // Tạo phần About Us
  const aboutUs = document.createElement("section");
  aboutUs.classList.add("about-us");
  aboutUs.innerHTML = `
    <img src="/Front-end/anh/aeboutique.webp" alt="AE Boutique" />
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
  // const footer = document.createElement("footer");
  // footer.innerHTML = `
  //   <hr />
  //   <div class="footer-container">
  //     <div class="footer-item">
  //       <h5>Shop AE Boutique</h5>
  //       <h6>Shop AE Boutique chuyên buôn, sỉ, lẻ, order hàng thời trang...</h6>
  //       <div class="social-icons">
  //         <a href="https://www.facebook.com/aeboutique69"><img src="/Front-end/anh/fb.png" alt="Facebook" /></a>
  //         <a href="#"><img src="/Front-end/anh/youtube.png" alt="YouTube" /></a>
  //       </div>
  //     </div>
  //     <div class="footer-item">
  //       <h5>Liên kết nhanh</h5>
  //       <ul>
  //         <li><a href="#">Hướng dẫn đặt hàng</a></li>
  //         <li><a href="#">Hướng dẫn thanh toán</a></li>
  //         <li><a href="#">Chính sách đổi trả hàng</a></li>
  //         <li><a href="#">Liên hệ với chúng tôi</a></li>
  //       </ul>
  //     </div>
  //     <div class="footer-item">
  //       <h5>Hotline hỗ trợ 24/7</h5>
  //       <div class="hotline"><span>0975986096</span></div>
  //       <h5>Chấp nhận thanh toán</h5>
  //       <div class="payment-icons">
  //         <img src="/Front-end/anh/momo.png" alt="Momo" />
  //       </div>
  //     </div>
  //   </div>
  // `;
  // document.body.appendChild(footer);
}

// Gọi hàm để tạo cấu trúc HTML
createHTMLStructure();
