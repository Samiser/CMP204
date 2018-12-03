//Note- this code does not need to be modified

function setCookie (name, value, expires)
{
	expires = new Date((new Date()).getTime() + expires*3600000);
  	var argv = setCookie.arguments;
  	var argc = setCookie.arguments.length;
  	var path = (argc > 3) ? argv[3] : null;
  	var domain = (argc > 4) ? argv[4] : null;
  	var secure = (argc > 5) ? argv[5] : false;
  	document.cookie = name + "=" + escape(value) + 
                    ((expires == null) ? "" : ("; expires=" + 
                    expires.toGMTString())) +
                    ((path == null) ? "" : ("; path=" + path)) +
                    ((domain == null) ? "" : ("; domain=" + domain)) +
                    ((secure == true) ? "; secure" : "");                  
}//end function setCookie


function getCookie(name)
{
   	var ckname = name + "=";
   	var dc = document.cookie;

   	if (dc.length > 0)
	{
      	begin = dc.indexOf(ckname);
      	if(begin != -1)
		{
         	begin += ckname.length;  
         	end = dc.indexOf(";", begin);
         	if(end == -1){end=dc.length;}
         	return unescape (dc.substring(begin, end));
      	}
   	}
   	return;
}//end function getCookie


function deleteCookie(name)
{
  	var expire = new Date();
  	expire.setTime(expire.getTime() - 1);	//set expiration date to history
  	var cookieval = getCookie(name);
  	if (cookieval != null)
	{ 
     	document.cookie = name + '=' + cookieval + "; expires=" + expire.toGMTString();
     	return true;
  	}
  	else
  	{
		return false;
	}
}//end function deleteCookie
