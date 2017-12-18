$('#cep').on('change', function () {
    var cep = $('#cep').val();
    $.get("http://api.postmon.com.br/v1/cep/" + cep, function (data) {
        if (data) {
            $('#logradouro').val(data.logradouro);
            $('#rua').val(data.logradouro);
            $('#bairro').val(data.bairro);
            $('#cidade').val(data.cidade);
            $('#estado').val(data.estado);
        }
    });
});
