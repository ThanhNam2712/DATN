<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Order Notification | CodeLean eCommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    Tuan Clothing
                </h1>
            </div>

            <div class="row" style="background-color: #00509d; height: 130px; padding: 35px; color: white; text-align: center;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">Reset Notification</strong>
                        <br>
                    </h3>

                </div>
            </div>

            <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                <table>
                    <tr>
                        <td>
                            <img
                                src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                alt="">
                        </td>


                        <td class="pl-3" style=" padding-left:20px;">
                                <span class="d-inline"
                                      style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                      Please click this link to retrieve your password
                                </span><br>
                                <span class="d-inline"
                                  style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                      {{ $coupon->code }}
                                </span>

{{--                            <a href="{{ route('client.reset.resetPass', $user->remember_token) }}" class="btn btn-primary">Chang pass</a>--}}
                        </td>
                    </tr>
                </table>
            </div>


            <div class="row mt-2 mb-4" style="margin-top: 15px; margin-bottom: 25px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b style="color: #00509d; font-size: 18px;">More information</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px;">
                        <p>You can check the appearance of the product (brand, model, color, quantity,...) before
                            payment and can refuse to receive the goods if not satisfied. Please do not activate an
                            electrical-electronic device or try the product.</p>

                        <p>If the product shows signs of damage / broken or does not match the information on the
                            website, please contact the store within 48 hours from the time of receipt for
                            assistance.</p>

                        <p>Please keep the invoice, product box and warranty card (if any) for return or warranty when
                            needed.</p>

                        <p>You can refer to the Help Center page or contact the store by leaving a message at the
                            Contact page or mailing here. Hotline 1900 9999 (8:00 - 9:00 both Saturday and Sunday).</p>

                        <b>Tuan clothing thank you.</b>
                    </div>
                </div>
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
