function couponApply(){
    let coupon = document.getElementById('couponApply').value.trim();
    $.ajax({
        type: "GET",
        url: "client/order/coupon",
        data: {
            coupon: coupon
        },

        success: function (response){
            if (response.success){
                $('.response_discount').text('-' + numberFormat(response.discount) + 'VND');
                $('.hidden_response_total').text(numberFormat(response.final_total) + ' VND');
                $('input[name="total_amount"]').val(response.final_total);
                $('input[name="total_discount"]').val(response.discount);
                alert('Áp Mã Giảm Giá Thành Công')
            }else {
                alert(response.error);
                $('input[id="couponApply"]').val('');
            }
        }
    });
}

function numberFormat(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}
