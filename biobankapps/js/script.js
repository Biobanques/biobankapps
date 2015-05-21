/*
 * fonction de zoom standard sur image
 */
function onmouseoverimage(id)
{
	var img=document.getElementById(id);
	img.style.position='absolute';
	img.style.top='200px';
	img.style.left='300px';
	img.style.width='100%';
	img.style.height='100%';
	img.style.maxWidth='800px';
	img.style.maxHeight='600px';
}
/*
 * fonction qui dezoom au retour
 */
function onmouseoutimage(id)
{
	var img=document.getElementById(id);
	 img.style.width='100px';
	 img.style.height='100px';
	 img.style.position='relative';
	 img.style.top='0px';
	img.style.left='0px';
}