$("#imagens").change(function(){

    $('#image_preview').html("");
    var total_file=document.getElementById("imagens").files.length;

    for(var i=0;i<total_file;i++){
        $('#image_preview').append("<img class='img-thumbnail rounded' src='"+URL.createObjectURL(event.target.files[i])+"'>");
    }

});

$("#imagens-update").change(function(){

    var total_file=document.getElementById("imagens-update").files.length;

    for(var i=0;i<total_file;i++){
        $('#image_preview').append("<img class='img-thumbnail rounded' src='"+URL.createObjectURL(event.target.files[i])+"'>");
    }

});

$("#limpar").click(function() {
    $("#imagens").val('');
    $("#imagens-update").val('');
    $('#image_preview').html("");
});
