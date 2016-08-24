$(window).scroll(function() {
    if ($(this).scrollTop() <60) {
        $('.sample123').fadeIn('slow');
        $('.sample12').fadeOut();
    } else if($(this).scrollTop() > 45) {
        $('.sample12').fadeIn();
    }
});

function del_fk(idnya){
	swal({
	  title: "Anda yakin ingin menghapus?",
	  text: "Mengahpus data akan menghapus semua jurusan dan mahasiswa terkait!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Ya, Hapus!",
	  cancelButtonText: "Tidak, Batalkan!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm) {
	  if (isConfirm) {
	    var csrf_token = $("meta[name=csrf_token]").attr('content');
	    $.ajax({
	    	method: "POST",
	    	url:base_url+'dosen/hapus',
	    	data:'id='+idnya+'&csrf_test_name='+csrf_token,
	    	success: function(html){
	    		swal("Deleted!", "Data berhasil dihapus.", "success");
	    		$(".tr"+idnya).hide();
	    	}
	    });
	  } else {
	    swal("Cancelled", "Membatalkan penghapusan :)", "error");
	  }
	});
}

$(document).ready( function () {
    $('#fakultas_id').DataTable();
    show_kab();
    show_kec();
    show_kel();
    dosen_show();
});

function show_kab(){
	$('#prov').on('change', function(){
		var id = $(this).val();
		if (id!='') {
			$.ajax({
				type:'POST',
				url:base_url+'dosen/show_kab',
				data:'id='+id,
				success:function(response){
					var html_temp='<option value="">Pilih</option>';
					var obj = $.parseJSON(response);
					obj.forEach(function(data){
						html_temp+="<option value='"+data.kabupaten_id+"'>"+data.nama_kab+"</option>";
					});
					$('#kab').html(html_temp);
				}
			})
		}
	})
}

function show_kec(){
	$('#kab').on('change', function(){
		var id = $(this).val();
		if (id!='') {
			$.ajax({
				type:'POST',
				url:base_url+'dosen/show_kec',
				data:'id='+id,
				success:function(response){
					var html_temp ='<option value="">Pilih</option>';
					var obj = $.parseJSON(response);
					obj.forEach(function(data){
						html_temp+="<option value='"+data.kecamatan_id+"'>"+data.nama_kec+"</option>"
					});
					$('#kec').html(html_temp);
				}
			});
		}
	});
}

function show_kel(){
	$('#kec').on('change', function(){
		var id = $(this).val();
		if (id!='') {
			$.ajax({
				type:'POST',
				url:base_url+'dosen/show_kel',
				data:'id='+id,
				success:function(response){
					var html_temp ='<option value="">Pilih</option>';
					var obj = $.parseJSON(response);
					obj.forEach(function(data){
						html_temp+="<option value='"+data.desa_id+"'>"+data.nama_desa+"</option>"
					});
					$('#kel').html(html_temp);
				}
			})
		}
	});
}

function dosen_show(){
	$('#dosen').on('change', function(){
		var id = $(this).val();
		if (id!='') {
			$.ajax({
				type:'POST',
				url:base_url+'home/details_dosen',
				data:'id='+id,
				success:function(response){
					$('.response').html(response);
				}
			});
		}
	});
}