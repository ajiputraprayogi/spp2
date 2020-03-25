$(window).on('hashchange', function(){
    if(window.location.hash){
        var page = window.location.hash.replace('#', '');
        if(page == Number.NaN || page <= 0){
            return false;
        }else{
            getData(page);
        }
    }
});
// ======================================================
$(document).ready(function(){
    $(document).on('click', 'pagination a',function(event){
        event.preventDefautl();
        $('li').removeClass('active');
        $(this).parent('li').addClas('active');
        var myurl = $(this).attr('href')
        var page = $(this).attr('href').split('page')[1];
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
});