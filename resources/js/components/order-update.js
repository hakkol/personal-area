var $ = require('jquery');
var swal = require('sweetalert')

$('.js-order-status').change(function() {
    var $that = $(this)
    var id = $that.data('id')
    var status = $that.val()

    $.ajax({
        url: '/admin/orders/' + id,
        type: 'POST',
        data: {
            _method: 'PATCH',
            status: status,
        },
        beforeSend: function(xhr) {
            $that.prop('disabled', true);
        },
        success: function(data) {
            swal({
                title: 'Success',
                text: 'Order has been updated.',
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
    })
})