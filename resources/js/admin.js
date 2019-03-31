window.$ = window.jQuery = require('jquery')

require('bootstrap')

require('./components/delete-form.js')
require('./components/disabled.js')
require('./components/order-update.js')

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})