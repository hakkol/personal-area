var $ = require('jquery');
var swal = require('sweetalert')

$('.js-new-order').click(function() {
    var $that = $(this)
    var id = $that.data('id')

    $.ajax({
        url: '/orders',
        type: "POST",
        data: {
            product: id,
        },
        beforeSend: function(xhr) {
            $that.prop('disabled', true);
        },
        success: function(data) {
            swal({
                title: 'Success',
                text: 'Your order has been submitted to the site admin.',
                icon: 'success',
            })
        },
        error: function(req, text, error) {
            var errors = [];
            var response = {};

            try {
                response = req.responseJSON;

                if (response.errors) {
                    for (var prop in response.errors) {
                        errors.push(response.errors[prop]);
                    }

                    return swal({
                        title: "Ooops!",
                        text: errors.join(' '),
                        icon: 'warning',
                    })
                }

                swal({
                    title: 'Server error',
                    text: response.message,
                    icon: 'error',
                })
            } catch (e) {
                swal({
                    title: 'Server error',
                    text: text + ' ' + error,
                    icon: 'error',
                })
            }
        },
        complete: function() {
            $that.prop('disabled', false)
        }
    });
})