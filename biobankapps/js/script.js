/*
 * fonction de zoom standard sur image
 */
function onmouseoverimage(id)
{
	var img=document.getElementById(id);
	img.style.position='relative';
	img.style.top='0px';
	img.style.left='0px';
	img.style.width='100%';
	img.style.height='100%';
	img.style.maxWidth='600px';
	img.style.maxHeight='450px';
}
/*
 * fonction qui dezoom au retour
 */
function onmouseoutimage(id)
{
	var img=document.getElementById(id);
	 img.style.width='75px';
	 img.style.height='75px';
	 img.style.position='relative';
	 img.style.top='0px';
	img.style.left='0px';
}