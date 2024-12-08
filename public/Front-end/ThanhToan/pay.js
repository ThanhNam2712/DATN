// Sample data for districts and wards
const addressData = {
    "Hà Nội": {
      "Ba Đình": ["Phường Cống Vị", "Phường Điện Biên"],
      "Đống Đa": ["Phường Cát Linh", "Phường Khâm Thiên"]
    },
    "Hồ Chí Minh": {
      "Quận 1": ["Phường Bến Nghé", "Phường Phạm Ngũ Lão"],
      "Quận 3": ["Phường Võ Thị Sáu", "Phường Phạm Ngũ Lão"]
    }
  };
  
  function populateDistricts() {
    const city = document.getElementById("city").value;
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");
    
    // Clear previous options
    districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
    wardSelect.innerHTML = '<option value="">Chọn Xã/Phường/Thị trấn</option>';
  
    if (addressData[city]) {
      Object.keys(addressData[city]).forEach(district => {
        const option = document.createElement("option");
        option.value = district;
        option.text = district;
        districtSelect.add(option);
      });
    }
  }
  
  function populateWards() {
    const city = document.getElementById("city").value;
    const district = document.getElementById("district").value;
    const wardSelect = document.getElementById("ward");
  
    // Clear previous options
    wardSelect.innerHTML = '<option value="">Chọn Xã/Phường/Thị trấn</option>';
  
    if (addressData[city] && addressData[city][district]) {
      addressData[city][district].forEach(ward => {
        const option = document.createElement("option");
        option.value = ward;
        option.text = ward;
        wardSelect.add(option);
      });
    }
  }
 // Hàm hiển thị giỏ hàng trên trang thanh toán
function displayCartData() {
  const cartData = JSON.parse(localStorage.getItem('cartData')) || [];
  const orderSummary = document.getElementById('order-summary');
  const totalPrice = document.getElementById('total-price');

  // Hiển thị các sản phẩm
  cartData.forEach(item => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.name} × ${item.quantity}</td>
      <td>${item.subtotal.toLocaleString()}₫</td>
    `;
    orderSummary.appendChild(row);
  });


  const total = localStorage.getItem('cartTotal');
  totalPrice.textContent = total ? Number(total).toLocaleString() + '₫' : '0₫';
}

window.onload = displayCartData;


function clearCartData() {
  localStorage.removeItem('cartData');
  localStorage.removeItem('cartTotal');
}

// Gọi hàm khi thanh toán thành công
document.querySelector('.payment-btn').addEventListener('click', clearCartData);

// Hàm kiểm tra form trước khi submit
function validateForm() {
  const city = document.getElementById('city').value;
  const district = document.getElementById('district').value;
  const ward = document.getElementById('ward').value;
  const houseNumber = document.getElementById('house-number').value;
  const paymentMethod = document.querySelector('input[name="payment"]:checked').value;

  if (!city || !district || !ward || !houseNumber) {
    alert("Vui lòng điền đầy đủ thông tin địa chỉ.");
    return false;  
  }

  if (paymentMethod === "COD") {
    alert("Đặt hàng thành công!");
    return false;
  }

  if (paymentMethod === "Chuyển khoản ngân hàng") {
    window.location.href = "../ThanhToanOnl/cart.html";  
    return false; 
  }
  
  return true;  
}

document.querySelector('.checkout-button').addEventListener('click', function(event) {
  event.preventDefault();  
  if (validateForm()) {
    console.log("Gửi dữ liệu đăng ký...");
  }
});
