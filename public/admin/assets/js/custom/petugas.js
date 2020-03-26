$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            getData(page);
        }
    }
});
// ======================================================
$(document).ready(function(){
    $(document).on('click', '.pagination a',function(event){
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
    $("#tambah").click(function(e){
        $("#tabelnya").hide(700);
        $("#halinput").show(700);
        $("#nama_petugas").focus();
    });
// =======================================================
    $("#kembali").click(function(e){
        $("#tabelnya").show(700);
        $("#halinput").hide(700);
    });
// =======================================================
    function hapusdata(id){
        swal({
            title: "Hapus Data ?",
            text: "Data Tidak Dapat Dipulihkan Kembali Setelah Di Hapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete){
                $('#tabelnya').loading('toggle');
                $.ajax({
                    type: 'DELETE',
                    url: 'petugas/' + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(){
                        $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data Berhasil dihapus</p>',{
                            type: 'success',
                            delay: 3000,
                            allow_dismiss: true,
                            offset: {from: 'top', amount: 20}
                        });
                        getData(1);
                    },complete:function(){
                        $('#tabelnya').loading('stop');
                    }
                });
            }
        });
    }
    window.hapusdata=hapusdata;
// ===========================================================
    function editdata(id){
        caridata(id);
        $("#tabelnya").hide(700);
        $("#haledit").show(700);
    }
    window.editdata=editdata;
// ===========================================================
    function caridata(id){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'petugas/'+id,
            success:function(data){
                $.each(data,function(key, value){
                    $('#edit_nama_petugas').val(value.nama_petugas);
                    $('#edit_username').val(value.username);
                    $('#edit_level').val(value.level);
                });
            },error:function(){
                alert('error');
            }
        });
    }
});
function getData(page){
    $.ajax({
            url: '?page=' + page,
            type: "get",
            datatype: "html"
    }).done(function(data){
        $("#listdata").empty().html(data);
        location.hash = page;
    }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('No Response from server');
    });
}