<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <title>Order Notification | CodeLean eCommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body
    style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
    <div class="container-fluid">
        <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
            <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">

                <div class="row">
                    <div class="container-fluid">
                        <div class="row" style="background-color: #e7eff8; height: 10px;">

                        </div>
                    </div>
                </div>

                <div class="row"
                    style="height: 100px; padding: 10px 20px; line-height: 90px; background-color: white; box-sizing: border-box;">

                    <h1 class="pl-2"
                        style="color: orange; line-height: 30px; float: left; padding-left: 20px; font-size: 40px; font-weight: 500;">
                        AE Boutique </h1>
                </div>

                <div class="row" style="background-color: #00509d; height: 130px; padding: 35px; color: white; text-align: center;">
                    <div class="container-fluid">
                        <h3 class="m-0 p-0" style="font-size: 28px; font-weight: 500;">
                            <strong style="font-size: 32px;">Thông báo đặt lại mật khẩu</strong>
                        </h3>
                    </div>
                </div>

                <div class="row mt-3 p-4" style="background-color: white; border: 1px solid #e0e0e0; border-radius: 8px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 120px;">
                                <img src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                     alt="Hình ảnh thông báo" style="width: 100%; max-width: 100px; border-radius: 8px;">
                            </td>
                            <td class="pl-3" style="padding-left: 20px; vertical-align: top;">
                                <span style="color: #424853; font-family: Trebuchet MS, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px;">
                                    Vui lòng nhấn vào liên kết dưới đây để đặt lại mật khẩu của bạn.
                                </span>
                                <br>
                                <a href="{{ route('client.reset.resetPass', $user->remember_token) }}" class="btn btn-primary"
                                   style="margin-top: 15px; background-color: #00509d; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">
                                   Đổi mật khẩu
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="container-fluid">
                        <div class="row" style="background-color: #e7eff8; height: 10px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
