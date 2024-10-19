function increase() {
    let input = document.getElementById('numberCart');
    let currentValue = parseInt(input.value);
    var maxValue = parseInt(input.max);
    if(currentValue < maxValue){
        input.value = currentValue + 1;
    }else {
        alert('Quantity exceeds limit');
    }
}
