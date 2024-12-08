// Thay đổi ảnh chính khi click vào thumbnail
document.querySelectorAll(".thumbnail").forEach((item) => {
  item.addEventListener("click", function () {
    const mainImage = document.getElementById("main-product-image");
    mainImage.src = this.src; // Thay đổi ảnh chính thành ảnh của thumbnail được click
  });
});

// Chọn kích thước
function selectSize(size) {
  // Bỏ màu nền cho tất cả các nút size
  document.querySelectorAll(".size-option").forEach((button) => {
    button.style.backgroundColor = "white";
    button.style.color = "black";
  });
  // Đổi màu nền cho nút được chọn
  event.target.style.backgroundColor = "black";
  event.target.style.color = "white";
}

// Chọn màu sắc
function selectColor(color) {
  // Bỏ viền cho tất cả các nút màu
  document.querySelectorAll(".color-option").forEach((button) => {
    button.style.border = "2px solid white"; // Trả lại viền trắng
  });
  // Thêm viền đen cho màu đã chọn
  event.target.style.border = "2px solid black";
}

// Lấy phần tử HTML cần thiết
const minusBtn = document.querySelector(".minus-btn");
const plusBtn = document.querySelector(".plus-btn");
const quantityInput = document.getElementById("quantity");

// Xử lý nút cộng
plusBtn.addEventListener("click", () => {
  let currentValue = parseInt(quantityInput.value);
  quantityInput.value = currentValue + 1;
});

// Xử lý nút trừ
minusBtn.addEventListener("click", () => {
  let currentValue = parseInt(quantityInput.value);
  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
  }
});
document.getElementById('buy-now').addEventListener('click', function() {
  window.location.href = '../ThanhToan/pay.html';  
});

document.getElementById('add-to-cart').addEventListener('click', function() {
  window.location.href = '../Giohang/cart.html'; 
});
