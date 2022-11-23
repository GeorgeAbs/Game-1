function confirmMyName(inputClass){
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                	//document.querySelector('.title').innerText = this.responseText
                    document.querySelector('.nickName').remove()
            }
    }
    xmlhttp.open("POST", "/game1/php/myName.php", true)
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('myName=' + document.querySelector(inputClass).value)
}