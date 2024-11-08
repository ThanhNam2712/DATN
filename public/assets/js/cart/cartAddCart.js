function updateCart(cartDetail, quantity){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: 'admin/cart/update/' + cartDetail,
        data: {
            cartDetail: cartDetail,
            quantity: quantity,
        },

        success: function (response){
            $('.cart-total').text('$' +response.total_amuont);
            $('.products-line-price').text(response.totalResponse);
            $('.sumQuantity').text('Shopping Cart (' + response.sumQuantity + ')');
            alert('Update Cart Success!');
        },

        error: function (response){
            console.log(response)
            alert('Update Cart Fail!, ');
        }
    });

    return false;
}

function deleteCart(cartDetail){
    $.ajax({
        type: "get",
        url: 'admin/cart/delete/' + cartDetail,
        data: {
            cartDetail: cartDetail,
        },

        success: function (response){
            var cart_body = $('.products-cart');
            var cart_exitsItem = cart_body.find("div[data-cartDetail='" + cartDetail +"']");
            $('.cart-total').text('$' +response.total_amuont);
            $('.products-line-price').text(response.totalResponse);
            $('.sumQuantity').text('Shopping Cart (' + response.sumQuantity + ')');
            cart_exitsItem.remove();
            alert('Delete Cart Success!');
        },

        error: function (response){
            console.log(response)
            alert('Update Cart Fail!, ');
        }
    });

    return false;
}
