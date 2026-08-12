function relogio(){
	var data = new Date();
	var horas = data.getHours();
	var minutos = data.getMinutes();
	var segundos = data.getSeconds();
	var exibe = document.getElementById("horas");
	exibe.innerHTML = "São " + horas + ":" + minutos + ":" + segundos;
}
setInterval(relogio, 0001);