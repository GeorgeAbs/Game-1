setInterval(newMainPlayer,500)


function newMainPlayer()
{
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
        	console.log(this.responseText)
        	if (this.responseText != '.place' && this.responseText != '')
        	{
                
        	}
        }
    }
    xmlhttp.open("POST", "/game1/php/assignMainPlayer.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('firstRound=0')
}
