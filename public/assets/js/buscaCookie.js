function buscaCookie(){
	var strCookie    = "PORTAL_AUTH=";
	var arrCookies   = document.cookie.split(';');
	var strValorCookie;

	for(var i = 0; i < arrCookies.length; i++){
		strValorCookie = arrCookies[i];
		while(strValorCookie.charAt(0) == ' ')
			strValorCookie = strValorCookie.substring(1, strValorCookie.length);
		if(strValorCookie.indexOf(strCookie) == 0)
			return strValorCookie.substring(strCookie.length, strValorCookie.length);
	}
	return false
}