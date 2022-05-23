$(document).ready(function() {
    $('.select2 ').select2();
    var bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var tanggal = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
    var begin = new Date(dataDetail[0].TANGGAL_MULAI);
    var end = new Date(dataDetail[0].TANGGAL_SELESAI);
    $('#content-title').text(' Indikator Kinerja Utama (IKU) Saya');
    $('#kontenKontrak').html('<div class="alert alert-primary">' +
        '<div class="row fs-xl" style="margin-bottom:15px;">' +
        '<div class="col-xl-2"><label class="form-label">Nomor Kontrak</label></div>' +
        '<div class="col-xl-4">' + dataDetail[0].NOMOR_KONTRAK + '</div>' +
        '<div class="col-xl-2"><label class="form-label">Jenis SKP</label></div>' +
        '<div class="col-xl-4">' + dataDetail[0].JENIS_SKP + '</div>' +
        '</div>' +
        '<div class="row fs-xl" style="margin-bottom:15px;">' +
        '<div class="col-xl-2"><label class="form-label">Tanggal Mulai</label></div>' +
        '<div class="col-xl-4">' + tanggal[begin.getDate()] + '/' + bulan[begin.getMonth()] + '/' + begin.getFullYear() + '</div>' +
        '<div class="col-xl-2"><label class="form-label">Tanggal Selesai</label></div>' +
        '<div class="col-xl-4">' + tanggal[end.getDate()] + '/' + bulan[end.getMonth()] + '/' + end.getFullYear() + '</div>' +
        '</div>' +
        '<div class="row fs-xl" style="margin-bottom:15px;">' +
        '<div class="col-xl-2"><label class="form-label">Tahun</label></div>' +
        '<div class="col-xl-4">' + dataDetail[0].TAHUN + '</div>' +
        '</div>' +
        '<div class="row">' +
        '</div>' +
        '</div>');


    $('#btnDownload').remove();

    $('#btnBuatIku').remove();

    $('.panel-toolbar').append('<button id="btnCariIku" class="btn btn-primary btn-pills btn-xs btn-block waves-effect waves-themed" style="margin-right:10px; width:100px;" onclick="loadForm(' + "'Ki/CariIku'" + ')">' +
        '<i class="fas fa-search"></i> Cari Iku ' +
        '</button>');

    var table = $('#tableIku').DataTable({
        responsive: true,
        orderCellsTop: true,
        fixedHeader: true,
    });

    $("#kode_iku").focus();
});

$('#btnBack').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    detailKontrak(dataDetail[0].ID_KONTRAK_KINERJA);
});

function loadForm(form) {
    $.ajax({
        url: '<?php echo $base_url;?>/' + form,
        type: 'GET',
        dataType: 'html',
        success: function(d) {
            $('#mainContent').html(d);
        }
    })
}

function detailKontrak(id) {
    $.ajax({
        url: '<?php echo $base_url;?>/Ki/KontrakDetail',
        type: 'GET',
        dataType: 'JSON',
        data: { ID_KONTRAK_KINERJA: id },
        success: function(d) {
            dataDetail = d;
            loadForm('Ki/DetailKontrak');
        }
    })
}

$('#formIku').on('change', function(event) {
    event.preventDefault();
    /* Act on the event */
    if (this.checkValidity() === true) {
        $("#btnSave").removeAttr('disabled');
        console.log('form is true');
    } else {
        $("#btnSave").attr('disabled', 'disabled');
        console.log('form is false');
    }
});

$('#formIku').on('submit', function(event) {
    event.preventDefault();
    /* Act on the event */
    data = $('#formIku').serializeArray();
    data[data.length] = { name: 'ID_KONTRAK_KINERJA', value: dataDetail[0]['ID_KONTRAK_KINERJA'] };
    if ($('#btnSave').val() != 'new') {
        data[data.length] = { name: 'ID_IKU', value: dataIku[0]['ID_IKU'] };
    }
    $.ajax({
        url: '<?php echo $base_url?>/Ki/AddIku',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(d) {
            toastr.success(d, 'Sukses');
            loadForm('Ki/DetailKontrak');
        }
    })
});
$('#periode_pelaporan').on('select2:select', function(e) {
    e.preventDefault();
    var d = e.params.data.id;
    switch (d) {
        case '2':
            $("#targetIku").html('<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T1">Target Triwulan 1</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T1" id="T1">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T2">Target Triwulan 2</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T2" id="T2">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T3">Target Triwulan 3</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T3" id="T3">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T4">Target Triwulan 4</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T4" id="T4">' +
                '</div>' +
                '</div>');
            break;
        case '3':
            $('#targetIku').html('<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T1">Target Semester 1</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T1" id="T1">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T2">Target Semester 2</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T2" id="T2">' +
                '</div>' +
                '</div>' +
                '</div>');
            break;
        case '4':
            $('#targetIku').html('<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T1">Target Tahunan</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T1" id="T1">' +
                '</div>' +
                '</div>' +
                '</div>');
            break;
        default:
            $("#targetIku").html('<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T1">Target Bulan 1</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T1" id="T1">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T2">Target Bulan 2</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T2" id="T2">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T3">Target Bulan 3</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T3" id="T3">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T4">Target Bulan 4</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T4" id="T4">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T5">Target Bulan 5</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T5" id="T5">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T6">Target Bulan 6</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T6" id="T6">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T7">Target Bulan 7</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T7" id="T7">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T8">Target Bulan 8</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T8" id="T8">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T9">Target Bulan 9</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T9" id="T9">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T10">Target Bulan 10</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T10" id="T10">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T11">Target Bulan 11</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T11" id="T11">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="margin-bottom: 8px;">' +
                '<div class="col-xl-3">' +
                '<label class="form-label fs-xl" for="T12">Target Bulan 12</label>' +
                '</div>' +
                '<div class="col-xl-3">' +
                '<input type="number" class="form-control" name="T12" id="T12">' +
                '</div>' +
                '</div>');
            break;
    }
});