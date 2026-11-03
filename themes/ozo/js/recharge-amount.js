var input = document.getElementById('recharge-input');
var currentValue = document.getElementById('current-value');
var amountTips = document.querySelectorAll("[data-role='amount-tip']")

input.addEventListener('change', inputHasChangedValue, false)

function inputHasChangedValue(e){
    let value = e.target.value;
    currentValue.innerHTML = value
}

amountTips.forEach(amountTip => {
    amountTip.addEventListener('click', updateInputValue, false);        
});



function updateInputValue(e){
    let selectedValue = e.target.innerHTML

    //Update input value
    input.value = selectedValue

    //update button text
    //currentValue.innerHTML = selectedValue

    //remove all active styles
    amountTips.forEach(amountTip => {
        amountTip.classList.remove('active');        
    });

    //add style to this button
    e.target.classList.add('active')
}

amountTips[0].click()