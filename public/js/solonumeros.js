function solonumeros(evt)
	{
		var code = (evt.wich) ? evt.wich : evt.keyCode;
		if(code>=48 && code<=57)
		{
			return true;
		}else if(code<8)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}