 $(document).ready(function() {
     $(':input').inputmask();

     tabel = $("#dataTable").DataTable({
         initComplete: function() {
             var api = this.api();
             $("#dataTable_filter input")
                 .off('.DT')
                 .on('keyup.DT', function(e) {
                     if (e.keyCode == 13) {
                         api.search(this.value).draw();
                     }
                 });
         },
         "processing": true,
         "serverSide": true,
         "autoWidth": false,
         "bFilter": true,
         "order": [],
         "columnDefs": [{
                 "targets": 1,
                 "title": 'NPWP',
                 "orderable": false,
                 "render": function(data, type, full, meta) {
                     str1 = data.substring(0, 2);
                     str2 = data.substring(2, 5);
                     str3 = data.substring(5, 8);
                     str4 = data.substring(8, 9);
                     str5 = data.substring(9, 12);
                     str6 = data.substring(12);
                     return str1 + "." + str2 + "." + str3 + "." + str4 + "-" + str5 + "." + str6;
                 }
             },
             {
                 "targets": -1,
                 "title": 'Action',
                 "orderable": false,
                 "render": function(data, type, full, meta) {
                     return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Download Kuisioner' onclick=\"view(" + data + ")\"><i class=\"fal fa-file-alt\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='Validasi Kuisioner' onclick=\"validasi(" + data + ")\"><i class=\"far fa-check-square\"></i></a>\n\t\t\t\t\t\t\t</div>";
                 }
             }
         ],
         "ajax": {
             "url": "MonitoringPkc/datatableList",
             "type": "POST",
             "data": {
                 "tipeAkses": ""
             }
         },
     });
 });

 function view(id) {
     $.ajax({
             url: 'MonitoringPkc/viewKuisioner',
             type: 'GET',
             dataType: 'JSON',
             data: { ID: id },
             success: function(data) {
                 window.open(data);
             }
         })
         .done(function() {
             console.log("success");
         })
         .fail(function() {
             console.log("error");
         })
         .always(function() {
             console.log("complete");
         });

 }

 function validasi(id) {

 }

 $("#simpan").on('click', function(event) {
     event.preventDefault();
     data = $('#Form').serializeArray();
     npwp = $('[name="npwp-mask"]').inputmask('unmaskedvalue');
     data[data.length] = { name: 'npwp', value: npwp }
     data[data.length] = { name: 'ID_AKSES', value: $('#simpan').val() }
         /* Act on the event */
     if ($('Form')[0].checkValidity() === false) {
         $("#Form").addClass('was-validated');
         play = document.getElementById('notification');
         toastr.error('Isi Form Dengan Lengkap dan Benar', 'Gagal');
         play.play();
         delete play;
     } else {
         $.ajax({
             url: 'Akses/UpdateAkses',
             type: 'POST',
             dataType: 'JSON',
             data: data,
             success: function(d) {
                 play = document.getElementById('notification');
                 if (d.status == 'success') {
                     toastr.success(d.pesan, 'Berhasil');
                 } else {
                     toastr.error(d.pesan, 'Gagal');
                 }
                 play.play();
                 delete play;
                 $("#modalForm").modal('hide');
                 tabel.ajax.reload();
             }
         })
     }
 });
 $("#btnRekap").one("click", function(e) {
     e.preventDefault();
     $.ajax({
         type: "GET",
         url: "MonitoringPkc/getRekapitulasi",
         dataType: "JSON",
         success: function(response) {
             window.open(response);
         }
     });
 });