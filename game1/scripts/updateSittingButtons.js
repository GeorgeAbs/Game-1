function func(){
	var xmlhttp = new XMLHttpRequest()
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                for(num of document.querySelectorAll('.hideAfterSitting')){
                	if (num.classList.contains('butPlace1') && !this.responseText.includes("%info%1%info%")){
                		num.classList.add('hide')
                	}
                	if (num.classList.contains('butPlace2') && !this.responseText.includes('%info%2%info%')){
                		num.classList.add('hide')
                	}
                	if (num.classList.contains('butPlace3') && !this.responseText.includes('%info%3%info%')){
                		num.classList.add('hide')
                	}
                	if (num.classList.contains('butPlace4') && !this.responseText.includes('%info%4%info%')){
                		num.classList.add('hide')
                	}
            }
            //document.querySelector('.title').innerText = this.responseText
        }
    }
    xmlhttp.open("POST", "/game1/php/requestCheckFreeTables.php", true)
    xmlhttp.send()
}
setInterval(func,200)