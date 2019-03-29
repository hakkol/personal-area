var $ = require('jquery')

//disable form when submit
$('.js-disable-when-submit').submit(function disableButton() {
    var $that = $(this)

    $that.find('input[type=submit]').attr('disabled', 'disabled')
    $that.find('button[type=submit]').attr('disabled', 'disabled')
});