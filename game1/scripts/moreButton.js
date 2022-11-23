
for(butMore of document.querySelectorAll('.m1'))
{
	butMore.addEventListener('click', func)
}
function func()
{
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText)
        	if (parseInt(this.responseText) == 21)
        	{
                equal21()
                not = document.querySelector('.moreOr21')
                not.textContent = 'В яблочко! 21 очко'
                not.classList.remove('hide')
                setTimeout(function(){
                    document.querySelector('.moreOr21').classList.add('hide')
                }, 3000)
                
        	}
        	if (parseInt(this.responseText) > 21)
        	{
                more21()
        		finishMyRound()
        		not = document.querySelector('.moreOr21')
                not.textContent = 'Увы, перебор!'
                not.classList.remove('hide')
                setTimeout(function(){
                    document.querySelector('.moreOr21').classList.add('hide')
                }, 3000)
        	}
        }
    }
    xmlhttp.open("POST", "/game1/php/moreButton.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send()
}
function finishMyRound()
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
function more21()
{
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText)
            if (this.responseText.includes('game is finished, winner'))
            {
                var res = this.responseText.split('game is finished, winner')[1];
                //document.querySelector('.winner').innerHTML = '<h1 class="win">Победитель: ' + res + '</h1>'
            }
        }
    }
    xmlhttp.open("POST", "/game1/php/finishMyRound.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("more21=1")
}
function equal21()
{
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText)
            if (this.responseText.includes('game is finished, winner'))
            {
                var res = this.responseText.split('game is finished, winner')[1];
                //document.querySelector('.winner').innerHTML = '<h1 class="win">Победитель: ' + res + '</h1>'
            }
        }
    }
    xmlhttp.open("POST", "/game1/php/finishMyRound.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("equal21=1")
}