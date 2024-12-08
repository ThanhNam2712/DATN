<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Xác Minh Tài Khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 120px;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #cfd6cf;
            color: #000000;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{-- <img src="https://your-website.com/path-to-logo.png" alt="Website Logo"> --}}
        </div>
        <h1>Xin chào, {{ $user->name }}!</h1>
        <p>Cảm ơn bạn đã đăng ký tài khoản trên website của chúng tôi. Vui lòng nhấn vào nút dưới đây để xác minh tài khoản của bạn và hoàn tất quá trình đăng ký:</p>
        <a href="{{ $verificationUrl }}" class="btn">Xác Minh Tài Khoản</a>
        <p>Trong trường hợp bạn không thực hiện yêu cầu này, bạn có thể bỏ qua email này.</p>
        <div class="footer">
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            <p>Truy cập website của chúng tôi: <a href="https://datn.test" target="_blank">www.your-website.com</a></p>
            <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
        </div>
    </div>
</body>
</html>
