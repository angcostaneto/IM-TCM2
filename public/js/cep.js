$('#cep').on('change', function () {
    var cep = $('#cep').val();
    $.get("http://api.postmon.com.br/v1/cep/" + cep, function (data) {
        if (data) {
            $('#street').val(data.logradouro);
            $('#district').val(data.bairro);
            $('#city').val(data.cidade);
            $('#state').val(data.estado);
        }
    });
});
