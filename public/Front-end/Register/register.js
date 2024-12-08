document.addEventListener("DOMContentLoaded", function() {
    const submitBtn = document.getElementById("submitBtn");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const messageDiv = document.getElementById("message");

    function isValidEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailPattern.test(email);
    }

    function validateForm() {
        const nameValue = nameInput.value.trim();
        const emailValue = emailInput.value.trim();
        const passwordValue = passwordInput.value.trim();
        const confirmPasswordValue = confirmPasswordInput.value.trim();

        messageDiv.textContent = ""; // Xóa thông báo trước đó

        if (!nameValue || !emailValue || !passwordValue || !confirmPasswordValue) {
            messageDiv.textContent = "Vui lòng điền đầy đủ thông tin.";
            return false;
        }

        if (!isValidEmail(emailValue)) {
            messageDiv.textContent = "Email không hợp lệ. Vui lòng nhập lại.";
            return false;
        }

        if (passwordValue.length < 6) {
            messageDiv.textContent = "Mật khẩu phải có ít nhất 6 ký tự.";
            return false;
        }

        if (passwordValue !== confirmPasswordValue) {
            messageDiv.textContent = "Mật khẩu không khớp. Vui lòng nhập lại.";
            return false;
        }

        return true;
    }

    function checkEmailExists(email) {
        return fetch(`http://localhost:3000/users?email=${email}`)
            .then(response => response.json())
            .then(users => {
                return users.length > 0;
            });
    }

    submitBtn.addEventListener("click", function(event) {
        event.preventDefault();

        if (!validateForm()) {
            return;
        }

        const emailValue = emailInput.value.trim();

        checkEmailExists(emailValue).then(emailExists => {
            if (emailExists) {
                messageDiv.textContent = "Email đã tồn tại. Vui lòng sử dụng email khác.";
                return;
            }

            const newUser = {
                name: nameInput.value.trim(),
                email: emailValue,
                password: passwordInput.value.trim()
            };

            fetch("http://localhost:3000/users", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(newUser)
            })
            .then(response => {
                if (response.ok) {
                    alert("Đăng ký thành công! Chuyển hướng đến trang đăng nhập.");
                    
                    // Thay đổi URL mà không tải lại trang
                    window.history.pushState({}, '', '../Login/login.html');
                    
                    // Thực hiện điều hướng bằng cách tải trang mới
                    location.reload();
                } else {
                    messageDiv.textContent = "Đăng ký thất bại. Vui lòng thử lại.";
                }
            })
            .catch(error => {
                console.error("Lỗi khi đăng ký:", error);
                messageDiv.textContent = "Đăng ký thất bại. Vui lòng thử lại.";
            });
        });
    });
});
