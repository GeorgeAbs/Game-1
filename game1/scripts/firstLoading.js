for (before of document.querySelectorAll('.hideBeforeSitting, .ready')) {
	before.classList.add('hide')
}
for (but of document.querySelectorAll('.hideAfterSitting')){
	but.addEventListener('click', function(){
		for (but_2 of document.querySelectorAll('.hideAfterSitting')){
			but_2.classList.add('hide')
		}
		for (before of document.querySelectorAll('.hideBeforeSitting, .ready')) {
			if (!before.classList.contains('enough') && !before.classList.contains('more'))
			{
				before.classList.remove('hide')
			}
		}
	})
}
document.querySelector('.butReady').addEventListener('click', func1)
function func1(){
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        }
    }
    xmlhttp.open("POST", "/game1/php/readyOrNot.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('ready=1')
    document.querySelector('.butReady').classList.add('hide')
}
document.querySelector('.butReady').addEventListener('click', func2)
function func2(){
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if (this.responseText != '')
            	{
            		var arr = this.responseText.split("%info%")
            		for (place of document.querySelectorAll('.place1, .place2, .place3, .place4'))
            		{
            			for (tableNum of arr)
            			{
            				if (place.classList.contains('place1') && tableNum == '1')
            				{
            					place.classList.add('hide')
            				}
            				if (place.classList.contains('place2') && tableNum == '2')
            				{
            					place.classList.add('hide')
            				}
            				if (place.classList.contains('place3') && tableNum == '3')
            				{
            					place.classList.add('hide')
            				}
            				if (place.classList.contains('place4') && tableNum == '4')
            				{
            					place.classList.add('hide')
            				}
            			}
            		}
            	}
        }
    }
    xmlhttp.open("POST", "/game1/php/myName.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('gameIsStarted=1')
}
document.querySelector('.butDefault').addEventListener('click', func3)
function func3(){
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {}
    xmlhttp.open("POST", "/game1/php/setDefault.php", true)
    xmlhttp.send()
}
document.querySelector('.butReady').addEventListener('click', assignMainPlayer)
function assignMainPlayer()
{
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
        	console.log(this.responseText)
        	if (this.responseText.includes('host'))
        	{
        		//clearInterval(myInterval);
        	}
        }
    }
    xmlhttp.open("POST", "/game1/php/assignMainPlayer.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('firstRound=1')
}
