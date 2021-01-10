var keyword = document.getElementById('kode');
var container = document.getElementById('detail');

keyword.addEventListener('keyup', function () {

	var ajax = new XMLHttpRequest();

	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4 && ajax.status == 200) {
			container.innerHTML = ajax.responseText;
		}
	}

	ajax.open('GET', 'Pembayaran/get_data/' + keyword.value, true);
	ajax.send();

});
