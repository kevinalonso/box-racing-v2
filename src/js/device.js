const ua = navigator.userAgent;

if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
	document.getElementById("logo-nav").style.display = "none";
}else if (/Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)){
	document.getElementById("logo-nav").style.display = "none";
} else {
	document.getElementById("logo-nav").style.display = "block";
}