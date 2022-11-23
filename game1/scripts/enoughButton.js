for(butMore of document.querySelectorAll('.e1'))
{
	butMore.addEventListener('click', funcEnough)
}
function funcEnough()
{
    for(butMore of document.querySelectorAll('.more, .enough'))
    {
        butMore.classList.add('hide')
    }

	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
        	if (this.responseText.includes('game is finished, winner'))
            {
                var res = this.responseText.split('game is finished, winner')[1];
                //document.querySelector('.winner').innerHTML = '<h1 class="win">Победитель: ' + res + '</h1>'
            }
        }
    }
    xmlhttp.open("POST", "/game1/php/finishMyRound.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send()
}