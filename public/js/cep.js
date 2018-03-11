let address;

$('#cep').on('change', function () {
    var cep = $('#cep').val();
    $.get("//api.postmon.com.br/v1/cep/" + cep, function (data) {
        if (data) {
            address = data;
            $('#logradouro').val(data.logradouro);
            $('#rua').val(data.logradouro);
            $('#bairro').val(data.bairro);
            $('#cidade').val(data.cidade);
            $('#estado').val(data.estado);
        }
    });
});

$('#numero').on('change', function () {
    if (typeof geosearch === 'function') {
        var numero = $('#numero').val();
        geosearch(address.logradouro, address.bairro, address.cidade, address.estado, numero);
    }
});