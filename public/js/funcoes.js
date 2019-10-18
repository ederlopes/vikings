$(".phone").mask("(99) 9999-9999");
$(".cnpj").mask("99.999.999/9999-99");
$(".mobile").mask("(99) 9999-9999");
$(".tin").mask("99-9999999");
$(".cep").mask("99.999-999");
$(".ssn").mask("999-99-9999");
$('.somentenumero').mask('0#');
$('.percentual').mask('##0.00', {reverse: true}).attr('maxlength','6');

$(function(){

    $(".editar").on('click', function () {

        var id_cartorio = $(this).data('idcartorio');

        if ($(this).data('idcartorio')<=0)
        {
            swal("Erro!", "Parametros insuficientes para ação", "error");
            return false;
        }

        $.ajax({
            type: "POST",
            method: "POST",
            url: 'cartorio/alterar',
            data: {id:id_cartorio},
            context: this,
            success: function(retorno)
            {
                Swal.fire({
                    type: 'info',
                    title: "Aguarde",
                    html: "Processando",
                    timer: 1000,
                });
                Swal.showLoading();

               $("#id").val(retorno.id);
               $("#nome").val(retorno.nome);
               $("#razao").val(retorno.razao);
               $("#documento").val(retorno.documento);
               $("#cep").val(retorno.cep);
               $("#endereco").val(retorno.endereco);
               $("#bairro").val(retorno.bairro);
               $("#cidade").val(retorno.cidade);
               $("#uf").val(retorno.uf);
               $("#email").val(retorno.email);
               $("#tabeliao").val(retorno.tabeliao);
               $("#telefone").val(retorno.telefone);
               $("#ativo").val(retorno.ativo);

               $("#btnCadastrar").html("Alterar catórios");

                window.top = 0;

            },
            error: function (request, status, error) {
                swal("Erro!", "Por favor, tente novamente mais tarde. Erro ARQ506", "error");
            }
        })

    })


    $("#btnCadastrar").on('click', function () {

        if (validaForm())
        {

            var url = ( $("#id").val() <= 0 ) ? 'cartorio/cadastrar' : 'cartorio/atualizar';

            $.ajax({
                type: "POST",
                method: "POST",
                url: url,
                data: $("#formCartorios").serialize(),
                context: this,
                success: function(retorno)
                {
                    if (parseInt(retorno) == 1)
                    {
                        swal("Sucesso!", "Registro processado com sucesso", "success").then(function() {
                            window.location.reload(true);
                        });
                    }
                },
                error: function (request, status, error) {
                    swal("Erro!", "Por favor, tente novamente mais tarde. Erro ARQ506", "error");
                }
            });
        }

    })

})

function validaForm()
{
    var erros = new Array();


    if ( $('#nome').val() == "")
    {
        erros.push('O campo nome deve ser preenchido.');
    }

    if ( $('#razao').val() == "")
    {
        erros.push('O campo razao deve ser preenchido.');
    }

    if ( $('#documento').val() == "")
    {
        erros.push('O campo documento deve ser preenchido.');
    }

    if ( $('#cep').val() == "")
    {
        erros.push('O campo cep deve ser preenchido.');
    }

    if ( $('#endereco').val() == "")
    {
        erros.push('O campo endereco deve ser preenchido.');
    }

    if ( $('#bairro').val() == "")
    {
        erros.push('O campo bairro deve ser preenchido.');
    }

    if ( $('#cidade').val() == "")
    {
        erros.push('O campo cidade deve ser preenchido.');
    }

    if ( $('#uf').val() <=  0)
    {
        erros.push('O campo uf deve ser preenchido.');
    }

    if ( $('#email').val() == "")
    {
        erros.push('O campo email deve ser preenchido.');
    }

    if ( $('#tabeliao').val() == "")
    {
        erros.push('O campo tabeliao deve ser preenchido.');
    }
    if ( $('#telefone').val() == "")
    {
        erros.push('O campo telefone deve ser preenchido.');
    }
    if ( $('#ativo').val() == "")
    {
        erros.push('O campo ativo deve ser preenchido.');
    }

    if (erros.length>0)
    {
        Swal.fire({
            type: 'info',
            title: "<i>Ops</i>",
            html: erros.join("<br />"),
            confirmButtonText: "ok",
        });
        return false;
    }

    return true;

}