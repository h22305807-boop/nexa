document.onreadystatechange = function(){
    if (document.readyState !== 'complete') {
        document.querySelector('body').style.visibility = 'hidden';
        document.getElementById('preloader').style.visibility = 'visible';
    }
    else{
        document.querySelector('body').style.visibility = 'visible';
        document.getElementById('preloader').style.display = 'none';
    }
}