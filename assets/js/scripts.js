function showTime() {
	var a_p = "";
	var today = new Date();
	var curr_hour = today.getHours();
	var curr_minute = today.getMinutes();
	var curr_second = today.getSeconds();
	if (curr_hour < 12) {
		a_p = "AM";
	} else {
		a_p = "PM";
	}
	if (curr_hour == 0) {
		curr_hour = 12;
	}
	if (curr_hour > 12) {
		curr_hour = curr_hour - 12;
	}
	curr_hour = checkTime(curr_hour);
	curr_minute = checkTime(curr_minute);
	curr_second = checkTime(curr_second);
	document.getElementById('clock').innerHTML = curr_hour + " : " + curr_minute + " : " + curr_second + " " + a_p;
}

function checkTime(i) {
	if (i < 10) {
		i = "0" + i;
	}
	return i;
}
setInterval(showTime, 500);
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
