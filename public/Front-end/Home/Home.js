let currentSlide = 0; // Biến lưu trữ chỉ số slide hiện tại
const totalSlides = document.querySelectorAll(".banner-slide").length; // Tổng số slide
const slideInterval = 3000; // Thời gian chuyển slide (3 giây)

// Hàm để thay đổi slide
function changeSlide(direction) {
  const bannerContainer = document.querySelector(".banner-container");

  // Cập nhật chỉ số slide hiện tại
  currentSlide += direction;

  // Kiểm tra nếu vượt quá số lượng slide
  if (currentSlide < 0) {
    currentSlide = totalSlides - 3; // Nếu là slide đầu tiên, nhảy đến slide cuối
  } else if (currentSlide > totalSlides - 3) {
    // -3 vì chúng ta muốn hiển thị 3 ảnh
    currentSlide = 0; // Nếu là slide cuối, nhảy về slide đầu
  }

  // Tính toán vị trí chuyển động của banner-container
  bannerContainer.style.transform = `translateX(-${(currentSlide * 100) / 3}%)`; // Chia cho 3 để tính toán độ dịch chuyển
}

// Tạo một hàm để tự động chuyển slide
function autoChangeSlide() {
  changeSlide(1); // Chuyển đến slide tiếp theo
}

// Khởi động tự động chuyển slide mỗi 3 giây
setInterval(autoChangeSlide, slideInterval);

// Khởi động slide ban đầu
document.addEventListener("DOMContentLoaded", () => {
  const bannerContainer = document.querySelector(".banner-container");
  // Đặt vị trí khởi động để hiển thị ba slide đầu tiên
  bannerContainer.style.transform = `translateX(0%)`; // Đặt slide đầu tiên
});
// Thêm sản phẩm vào giỏ hàng
function addToCart(productName, productPrice) {
  const cart = document.getElementById("cart");
  const cartItems = document.getElementById("cart-items");
}

// Xem chi tiết sản phẩm
function viewProduct(productName) {
  alert(`Bạn đang xem chi tiết sản phẩm: ${productName}`);
}
// Fetch dữ liệu từ db.json
fetch("../../db.json")
  .then((response) => response.json())
  .then((data) => {
    // Lấy danh sách sản phẩm từ JSON
    const products = data.products;

    // Duyệt qua từng sản phẩm và thêm vào giao diện
    products.forEach((product, index) => {
      // Tạo đường dẫn ảnh
      const imagePath = "../anh/" + product.image;

      // Cập nhật phần tử HTML với ảnh và thông tin sản phẩm
      document.getElementById(`product-image-${index + 1}`).innerHTML = `
                <img src="${imagePath}" alt="${product.name}">
            `;
      document.getElementById(`product-details-${index + 1}`).innerHTML = `
                <h4>${product.name}</h4>
                <p class="price">${product.price}₫</p>
                <h4>${product.description}</h4>
            `;
    });
  })
  .catch((error) => console.error("Error fetching product data:", error));
  function searchProduct() {
    // Lấy từ khóa tìm kiếm từ input
    const keyword = document.getElementById("searchInput").value.toLowerCase();
  
    // Lấy danh sách sản phẩm
    const products = document.querySelectorAll(".product-card");
    
    // Duyệt qua từng sản phẩm và kiểm tra tên sản phẩm
    products.forEach(product => {
      const productName = product.querySelector(".product-details").textContent.toLowerCase();
  
      // Hiển thị hoặc ẩn sản phẩm tùy vào kết quả tìm kiếm
      if (productName.includes(keyword)) {
        product.style.display = "block"; // Hiển thị sản phẩm
      } else {
        product.style.display = "none"; // Ẩn sản phẩm
      }
    });
  
    // Ngăn không cho form reload trang
    return false;
  }
  