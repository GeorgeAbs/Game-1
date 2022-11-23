setInterval(playingMainPlayer,200)
function playingMainPlayer()
{
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            var res = this.responseText.split('%%myInfo%%')
        	if (res[0] != '.place' && this.responseText != '')
        	{
                for(div of document.querySelectorAll('.currentScore'))//.classList.add('hide')
                {
                    if (!div.parentNode.classList.contains(res[0]))
                    {
                        //div.classList.add('hide')
                        try{div.parentNode.classList.remove('mainUserColor')}catch{}
                    }
                    else
                    {
                        //div.classList.remove('hide')
                        div.parentNode.classList.add('mainUserColor')
                    }
                }
                if (res[1] == 'main')
                {
                    for(div of document.querySelectorAll('.e1, .m1'))
                    {
                        div.disabled = false;
                    }
                }
                else
                {
                    for(div of document.querySelectorAll('.e1, .m1'))
                    {
                        div.disabled = true;
                    }
                }
        	}
        	console.log(this.responseText)
        }
    }
    xmlhttp.open("POST", "/game1/php/playingMainPlayer.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('firstRound=1')

}