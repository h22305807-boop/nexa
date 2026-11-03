const forms = document.getElementsByClassName('form');
var shouldSubmit = true;

Array.from(forms).map(form => {
    form.addEventListener("submit", validate,true);
})

function validate(e){
    e.preventDefault();
    e.stopImmediatePropagation()
    shouldSubmit = true;

    [...getAllFormElements(e.target)].map(element => {

        removeErrorClass(element)

        if (element.tagName.toLowerCase() == 'input') {
            if(shouldValidate(element) && isEmpty(element)){
                addErrorClass(element);
                shouldSubmit = false;
            }
            else{
                shouldSubmit = shouldSubmit ? true :false;
            }
        }
        
    })

    if (shouldSubmit) {
        e.target.submit();
    }
}

// return all forms elements
function getAllFormElements(form){
    return form.elements
}

//check if input should validate
function shouldValidate(element){
    if(element.tagName.toLowerCase() == 'input' && (element.getAttribute('validate') == 'true')){
        return true
    }
    return false
}

// input is empty
function isEmpty(element){
    if(element.value === "" || typeof element.value == 'undefined')
    {
        return true
    }
    return false
}

// add error class to required
function addErrorClass(element){
    element.closest('.should-validate')?.classList.add('has-error')
}

// remove error class to required
function removeErrorClass(element){
    element.closest('.should-validate')?.classList.remove('has-error')
}