function addQtdSessionCart(idProduct, type) {
    $.ajax({
        method: "POST",
        type: 'POST',
        url: "/cart/set-qtd-itens",
        data: { 'idProduct': idProduct, 'type': type }
    }).done(function (success) {
        window.location.reload();
    }).fail(function (fail) {
    });
}

function deleteItemCart(idProduct) {

    swal({
        title: "Aviso",
        text: "Deseja remover este Produto do carrinho?!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    type: 'POST',
                    url: "/cart/remove-item-cart",
                    data: { 'idProduct': idProduct }
                }).done(function (success) {
                    swal("Item removido do seu carrinho com sucesso!", {
                        icon: "success",
                    }).then((value) => {
                        window.location.reload();
                    });
                }).fail(function (fail) {
                });
            }
        });
}

function Checkout() {

    var form = $("form").serialize();

    let obg = ['email', 'name', 'cpf', 'phone', 'zipcode'];

    var i;
    for (i = 0; i < obg.length; i++) {
        if ($("#" + obg[i]).val() == "") {
            swal({
                title: "Aviso",
                text: "Campo " + obg[i] + " deve ser preenchido!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                    }
                });
            return true;
        }
    }



    swal({
        title: "Aviso",
        text: "Você esta certo de que preencheu todos os dados corretamente ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "POST",
                type: 'POST',
                url: "/order/process",
                data: form
            }).done(function (success) {
                swal("Pedido de compras gerado com sucesso!", {
                    icon: "success",
                }).then((value) => {
                    window.location.href = "/order/list";
                });
            }).fail(function (fail) {
            });
        }
    });
}


function msgItemCart() {
    swal({
        title: "Aviso",
        text: "O item que voce tentou comprar ja esta no seu carrinho de compras, deseja ir até o carrinho ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = "/my-cart";
        }
    });

}