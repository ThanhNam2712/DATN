function couponApply(){
    let coupon = document.getElementById('couponApply').value.trim();
    $.ajax({
        type: "GET",
        url: "admin/order/coupon",
        data: {
            coupon: coupon
        },

        success: function (response){
            if (response.success){
                $('.response_discount').text('-$' + response.discount);
                $('.hidden_response_total').text('$' + response.final_total);
                $('input[name="order_total_amount"]').val(response.final_total);
                alert('Apply Coupon Success')
            }else {
                alert(response.error);
            }
        }
    });
}
