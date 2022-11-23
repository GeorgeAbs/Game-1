
document.querySelector('.butReady').addEventListener('click', funcUpdate)
function funcUpdate()
{
	var interval = setInterval(doUpdate,100)
}
var b = false
function doUpdate()
{
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
        	if (this.responseText != '')
        	{
        		var arrScore = ''
        		var newUsers = this.responseText.split('%newUser%')
        		for(newUser of newUsers)
        		{
        			var userInfo = newUser.split('%newInfo%')
        			if (userInfo[4] == '1')
        			{
        				arrScore = arrScore + userInfo[0] + ': ' + userInfo[2] + '<br>'
        				document.querySelector('.place1 > .userName1').innerText = userInfo[0]
        				document.querySelector('.place1 > .currentScore').innerText = userInfo[2] + '/5'
        			}
        			if (userInfo[4] == '2')
        			{
        				arrScore = arrScore + userInfo[0] + ': ' + userInfo[2] + '<br>'
        				document.querySelector('.place2 > .userName2').innerText = userInfo[0]
        				document.querySelector('.place2 > .currentScore').innerText = userInfo[2] + '/5'
        			}
        			if (userInfo[4] == '3')
        			{
        				arrScore = arrScore + userInfo[0] + ': ' + userInfo[2] + '<br>'
        				document.querySelector('.place3 > .userName3').innerText = userInfo[0]
        				document.querySelector('.place3 > .currentScore').innerText = userInfo[2] + '/5'
                    }
        			if (userInfo[4] == '4')
        			{
        				arrScore = arrScore + userInfo[0] + ': ' + userInfo[2] + '<br>'
        				document.querySelector('.place4 > .userName4').innerText = userInfo[0]
        				document.querySelector('.place4 > .currentScore').innerText = userInfo[2] + '/5'
        			}
        		}
                var myImage = 'img/' + this.responseText.split('%%myImage%%')[1]
                document.querySelector('.img').src = myImage
        		document.querySelector('.tableOfTheGeneralScore').innerHTML = '<h1 class="h1Score">Результаты:</h1>' + arrScore
                console.log('arrScore=' + arrScore + ' img=' + myImage + '___' + this.responseText)
                var winner = this.responseText.split('game is finished, winner')[1]
                if (!b && winner != '')
                {
                    spanText = document.querySelector('.winnerName').textContent = winner
                    /*txt = document.createTextNode(winner)
                    spanText.appendChild(txt)*/
                    document.querySelector('.winner').classList.remove('hide')
                    b = true
                }
        	}
        }
    }
    xmlhttp.open("POST", "/game1/php/returnTablesInfo.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send()
}