if (!$('#cep').val()) {
    $('#numero').attr('disabled', true);
}

$('#cep').on('change', function () {
    var cep = $('#cep').val();
    $.get("//api.postmon.com.br/v1/cep/" + cep, function (data) {
        if (data) {
            $('#cep').parent().closest('div').removeClass('has-error has-feedback');
            $('#numero').attr('disabled', false);
            $('#logradouro').val(data.logradouro);
            $('#rua').val(data.logradouro);
            $('#bairro').val(data.bairro);
            $('#cidade').val(data.cidade);
            $('#estado').val(data.estado);
        }
    }).fail(function () {
        $('#cep').parent().closest('div').addClass('has-error has-feedback');
    });
});

$('#numero').on('change', function () {
    if (typeof geosearch === 'function') {
        var numero = $('#numero').val();
        var address = getAddress();
        clearMarkers();
        if (!$.isEmptyObject(address)) {
            geosearch(address.logradouro, address.bairro, address.cidade, address.estado, numero);
        }
    }
});

function loadAddressOnMap() {
    if ($('#cep').val()) {
        if (typeof geosearch === 'function') {
            var address = getAddress();
            var numero = $('#numero').val();
            geosearch(address.logradouro, address.bairro, address.cidade, address.estado, numero);
        }
    }
}

function getAddress() {
    return {
        logradouro: $('#rua').val(),
        bairro: $('#bairro').val(),
        cidade: $('#cidade').val(),
        estado: $('#estado').val(),
    }
}

$(loadAddressOnMap);