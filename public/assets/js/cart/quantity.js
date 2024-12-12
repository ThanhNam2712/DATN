function increase(key) {
    let input = document.getElementById('numberCart-' + key);
    let currentValue = parseInt(input.value);
    var maxValue = parseInt(input.max);
    if(currentValue < maxValue){
        input.value = currentValue + 1;
    }else {
        alert('Quantity exceeds limit');
    }
}

function decrease(key){
    let input = document.getElementById('numberCart-' + key);
    if (input){
        let currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    }
}

function increaseCart(cartDetail){
    let input = document.getElementById('quantityInput-' + cartDetail);
    var maxValue = parseInt(input.max);
    let currentValue = parseInt(input.value);
    if (currentValue < maxValue){
        input.value = currentValue + 1;
        updateCart(cartDetail, currentValue + 1);
        calculateTotal();
    }else {
        alert('Không thể tăng số lượng dưới mức tối thiểu');
    }
}

function reduce(cartDetail){
    let input = document.getElementById('quantityInput-' + cartDetail);
    var minValue = parseInt(input.min);
    if (input){
        let currentValue = parseInt(input.value);
        if (currentValue <= minValue) {
            alert('Không thể giảm số lượng dưới mức tối thiểu');
            return false;
        }
        input.value = currentValue - 1;
        updateCart(cartDetail, currentValue - 1);
        calculateTotal();
    }else {
        console.error('fail');
    }
}
