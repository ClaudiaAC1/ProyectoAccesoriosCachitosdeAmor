function solodecimales(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;   
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    var isNumber = (key >= 48 && key <= 57);
    var isSpecial = (key == 46);
    if(isNumber || isSpecial){
        return filter(tempValue);
    }        
    
    return false;    
    
}
function filter(__val__){
    var preg = /^([0-9]{0,3}\.?[0-9]{0,2})$/; 
    return (preg.test(__val__) === true);
}