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
