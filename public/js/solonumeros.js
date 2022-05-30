function solonumeros(evt,input)
	{
		var key = window.Event ? evt.which : evt.keyCode;   
		var chark = String.fromCharCode(key);
    	var tempValue = input.value+chark;
		var isNumber = (key >= 48 && key <= 57);
		if(isNumber)
		{
			return filternum(tempValue);
		}


		return false;
	}
	function filternum(__val__){
		var preg = /^([0-9]{1,4})$/; 
		return (preg.test(__val__) === true);
	}