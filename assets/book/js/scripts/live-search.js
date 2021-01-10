var keyword = document.getElementById('lantai');
var container = document.getElementById('detail_lantai');

keyword.addEventListener('change', function () {

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
            //console.log('awwdd');
        }
    }

    ajax.open('GET', 'booking/get_data/' + keyword.value, true);
    ajax.send();
});