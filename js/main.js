$temp = true;

$('.goBackButton').click(function (e) {
    e.preventDefault();

    location.href = './index.php?page=0';
});

$('.rightStatusButtons').click(function (e) {
    e.preventDefault();

    location.href = window.location.pathname + "?orderStatus=" + this.id;
});

$('.getProducts').click(function (e) {
    e.preventDefault();

    $(".productsTable").css({"display":"block"})
    
    $(".statusButtons").css({"display":"none"});
    $(".ordersTable").css({"display":"none"});
});

$('.getOrders').click(function (e) {
    e.preventDefault();

    if($temp) {
        $(".statusButtons").css({"display":"block"});
        $temp = false;
    }
        else {
        $(".statusButtons").css({"display":"none"});
        $temp = true;
    }

    $(".ordersTable").css({"display":"block"})

    $(".productsTable").css({"display":"none"});
});

$('.submitButton').click(function (e) {
    e.preventDefault();

    let params = new URLSearchParams(location.search);
    let idOfProduct = params.get('id');

    $(`input`).removeClass('error');

    let nameCustomer = $('input[name="nameCustomer"]').val();
    let telephoneNumber = $('input[name="telephoneNumber"]').val();
    let comment = $('textarea[name="comment"]').val();

    $.ajax({
        url: './inc/makeOrder.php',
        type: 'POST',
        dataType: 'json',
        data: {
            nameCustomer: nameCustomer,
            telephoneNumber: telephoneNumber,
            comment: comment,
            idOfProduct: idOfProduct
        },
        success (data) {

            if (data.status) {
                document.location.href = './thanksPage.php?idOfProduct=' + String(idOfProduct) + "&nameCustomer=" + String(nameCustomer) + "&telephoneNumber=" + String(telephoneNumber) + "&comment=" + String(comment);
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});

$('.deleteOrderButton').click(function (e) {
    e.preventDefault();

    let idOfOrder = this.id;
    
    $.ajax({
        url: './inc/deleteOrder.php',
        type: 'POST',
        dataType: 'json',
        data: {
            idOfOrder: idOfOrder
        },
        success (data) {
            location.reload();
        }
    });
});

$('.deleteProductButton').click(function (e) {
    e.preventDefault();

    let idOfOrder = this.id;
    
    $.ajax({
        url: './inc/deleteProduct.php',
        type: 'POST',
        dataType: 'json',
        data: {
            idOfOrder: idOfOrder
        },
        success (data) {
            location.reload();
        }
    });
});
