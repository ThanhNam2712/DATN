document.addEventListener('DOMContentLoaded', function() {
    const cardSelectContainer = document.getElementById('card-select-container');
    const newCardContainer = document.getElementById('new-card-container');

    // Kiểm tra thẻ đã lưu trong JSON Server
    fetch('http://localhost:3000/cards')
        .then(response => response.json())
        .then(cards => {
            if (cards.length > 0) {
                // Nếu có thẻ đã lưu, hiển thị danh sách thẻ để chọn
                let cardSelect = '<label for="saved-cards">Chọn thẻ đã lưu:</label><select id="saved-cards"><option value="">Chọn thẻ...</option>';
                cards.forEach(card => {
                    cardSelect += `<option value="${card.cardNumber}">${card.cardName} - **** **** **** ${card.cardNumber.slice(-4)}</option>`;
                });
                cardSelect += '</select>';
                cardSelectContainer.innerHTML = cardSelect;
                newCardContainer.style.display = 'none';  // Ẩn form nhập thẻ mới
            } else {
                // Nếu không có thẻ nào, bắt buộc nhập thẻ mới
                cardSelectContainer.innerHTML = '<p>Bạn chưa có thẻ nào, vui lòng nhập thẻ mới.</p>';
                newCardContainer.style.display = 'block';
            }
        })
        .catch(error => {
            displayMessage('Lỗi khi tải thẻ!', 'error');
        });

    // Xử lý thanh toán khi người dùng nhấn nút thanh toán
    document.getElementById('payment-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của form

        const savedCard = document.getElementById('saved-cards');
        const isCardSelected = savedCard && savedCard.value !== "";

        if (isCardSelected) {
            // Sử dụng thẻ đã lưu
            displayMessage('Sử dụng thẻ đã lưu: ' + savedCard.value, 'success');
            redirectToSanPham();
        } else {
            // Lấy thông tin thẻ mới
            const cardName = document.getElementById('card-name').value;
            const cardNumber = document.getElementById('card-number').value;
            const expiryDate = document.getElementById('expiry-date').value;
            const cvv = document.getElementById('cvv').value;

            // Lưu thẻ mới vào JSON Server
            const cardData = {
                cardName: cardName,
                cardNumber: cardNumber,
                expiryDate: expiryDate,
                cvv: cvv
            };

            fetch('http://localhost:3000/cards', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(cardData),
            })
            .then(response => response.json())
            .then(data => {
                displayMessage('Thêm thẻ và thanh toán thành công!', 'success');
                redirectToSanPham();  // Chuyển hướng sau khi lưu thẻ thành công
            })
            .catch(error => {
                displayMessage('Có lỗi xảy ra khi lưu thẻ!', 'error');
            });
        }
    });
});

// Hiển thị thông báo
function displayMessage(message, type) {
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = message;
    messageDiv.className = type;
}

// Hàm chuyển hướng đến trang sản phẩm
function redirectToSanPham() {
    window.location.href = '../Home/Home.html';
}
