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
                $('.response_discount').text('-$' + response.discount);
                $('.hidden_response_total').text('$' + response.final_total);
                $('input[name="total_amount"]').val(response.final_total);
                alert('Apply Coupon Success')
            }else {
                alert(response.error);
            }
        }
    });
}
