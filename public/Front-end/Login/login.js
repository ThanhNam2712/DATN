document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const emailInput = document.querySelector("input[type='text'][placeholder='Vui lòng nhập email']");
    const passwordInput = document.querySelector("input[type='password'][placeholder='Vui lòng nhập mật khẩu']");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const emailValue = emailInput.value.trim();
        const passwordValue = passwordInput.value.trim();

        if (!emailValue || !passwordValue) {
            alert("Vui lòng nhập đầy đủ email và mật khẩu.");
            return;
        }

        // Lấy danh sách người dùng từ JSON-server
        fetch("http://localhost:3000/users")
            .then(response => response.json())
            .then(users => {
                // Tìm kiếm người dùng với email và mật khẩu đã nhập
                const user = users.find(user => user.email === emailValue && user.password === passwordValue);

                if (user) {
                    alert("Đăng nhập thành công! Chuyển hướng đến trang chủ.");
                    window.location.href = "../Home/Home.html";
                } else {
                    alert("Email hoặc mật khẩu không chính xác.");
                }
            })
            .catch(error => console.error("Lỗi khi đăng nhập:", error));
    });
});
