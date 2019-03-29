var $ = require('jquery')
var swal = require('sweetalert')

//Submit form 'Delete'
$('.js-delete').click(function() {
    var $that = $(this)

    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this record!',
        icon: "warning",
        buttons: {
            confirm: 'Ok',
            cancel: 'Cancel'
        },
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            $that.parent().find('.js-delete-form').submit()
        }
    });
});