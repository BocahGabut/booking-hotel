function save(url, target) {
    event.preventDefault();
    $.ajax({
        url: url,
        data: $('#form_save').serialize(),
        type: "post",
        cache: false,
        async: false,
        dataType: 'json',
        success: function (response) {
            Swal.fire({
                type: "success",
                title: "Success!",
                text: "Save Data Success",
                confirmButtonClass: "btn btn-success"
            }).then(function (t) {
                window.location.href = target;
            });
        }
    });
}

function update(url, target) {
    event.preventDefault();
    $.ajax({
        url: url,
        data: $('#form_update').serialize(),
        type: "post",
        async: false,
        dataType: 'json',
        success: function (response) {
            Swal.fire({
                type: "success",
                title: "Success!",
                text: "Update Data Success",
                confirmButtonClass: "btn btn-success"
            }).then(function (t) {
                window.location.href = target;
            });
        }
    });
}