function updateCart(cartDetail, quantity){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: 'client/cart/update/' + cartDetail,
        data: {
            cartDetail: cartDetail,
            quantity: quantity,
        },

        success: function (response){
            var cart_body = $('.products-cart');
            var cart_exitsItem = cart_body.find("div[data-cartDetail='" + cartDetail +"']");
            $('.cart-total').text( numberFormat(response.total_amuont) + 'VND');
            cart_exitsItem.find('.products-line-price').text( numberFormat(response.totalResponse));
            $('.sumQuantity').text('Shopping Cart (' + response.sumQuantity + ')');
            alert('Cập Nhật Số Lượng Thành Công!');
        },

        error: function (response){
            console.log(response)
            alert('Cập Nhật Thất Bại!, ');
        }
    });

    return false;
}

function deleteCart(cartDetail){
    $.ajax({
        type: "get",
        url: 'client/cart/delete/' + cartDetail,
        data: {
            cartDetail: cartDetail,
        },

        success: function (response){
            var cart_body = $('.products-cart');
            var cart_exitsItem = cart_body.find("div[data-cartDetail='" + cartDetail +"']");
            $('.cart-total').text(numberFormat(response.total_amuont) + 'VND');
            $('.hidden_response_total').text(numberFormat(response.total_amuont) + 'VND');
            $('.response_discount_value').text(numberFormat(response.total_amuont) + 'VND');
            $('.products-line-price').text(response.totalResponse);
            $('.sumQuantity').text('Shopping Cart (' + response.sumQuantity + ')');
            cart_exitsItem.remove();

            var cart_master = $('.product-trashed');
            var cart_body_mas = cart_master.find("div[data-cartDetail='" + cartDetail +"']");
            cart_body_mas.remove();

            var cartOrder = $('.deleteOrder');
            var cartOrder_exits = cartOrder.find("tr[data-cartDetail='" + cartDetail +"']");
            cartOrder_exits.remove();
            alert('Xóa Sản Phẩm Khỏi Giỏ Hàng Thành Công!');
        },

        error: function (response){
            console.log(response)
            alert('Xóa Sản Phẩm Khỏi Giỏ Hàng Không Thành Công!, ');
        }
    });

    return false;
}


function numberFormat(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}
