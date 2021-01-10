function delete_message(id, url, target) {
	event.preventDefault();
	Swal.fire({
		title: "Anda Yakin ?",
		text: "Akan Menghapus Data Ini !",
		type: "warning",
		showCancelButton: !0,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
		confirmButtonClass: "btn btn-primary",
		cancelButtonClass: "btn btn-danger ml-1",
		buttonsStyling: !1
	}).then(function (t) {
		t.value ? Swal.fire({
				type: "success",
				title: "Deleted!",
				text: "Data Berhasil Di Hapus",
				confirmButtonClass: "btn btn-success"
			}).then(function (succ) {
				$.ajax({
					url: url,
					type: "post",
					data: {
						id: id
					}
				});
				window.location.href = target;
			}) :
			t.dismiss === Swal.DismissReason.cancel && Swal.fire({
				title: "Cancelled",
				text: "Data Tidak Dihapus :)",
				type: "error",
				confirmButtonClass: "btn btn-success"
			})
	})
};

function delete_all(id, url, target) {
	event.preventDefault();
	Swal.fire({
		title: "Anda Yakin ?",
		text: "Akan Menghapus Semua Data Ini !",
		type: "warning",
		showCancelButton: !0,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
		confirmButtonClass: "btn btn-primary",
		cancelButtonClass: "btn btn-danger ml-1",
		buttonsStyling: !1
	}).then(function (t) {
		t.value ? Swal.fire({
				type: "success",
				title: "Deleted!",
				text: "Data Berhasil Di Hapus",
				confirmButtonClass: "btn btn-success"
			}).then(function (succ) {
				$.ajax({
					url: url,
					type: "post",
					data: {
						id: id
					},
				});
				window.location.href = target;
			}) :
			t.dismiss === Swal.DismissReason.cancel && Swal.fire({
				title: "Cancelled",
				text: "Data Tidak Dihapus :)",
				type: "error",
				confirmButtonClass: "btn btn-success"
			})
	})
};

function save_tamu(url, target) {
	event.preventDefault();
	$.ajax({
		url: url,
		data: $('#form_tamu').serialize(),
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
};

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
};

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
};

function previewImage() {
	document.getElementById("preview_image").style.display = "block";
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

	oFReader.onload = function (oFREvent) {
		document.getElementById("img_preview").src = oFREvent.target.result;
	};
};