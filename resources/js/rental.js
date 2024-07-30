import Alpine from 'alpinejs';
import jquery from 'jquery';
import jqueryValidation from 'jquery-validation';
import jqueryDatetimepicker from 'jquery-datetimepicker';

window.jquery = jquery;
Alpine.start();
jquery('#start_datetime').datetimepicker({
    minDate: 0,
    timepicker:false,
    format:'d-m-Y'
});


jquery(document).ready(function () {
    jquery('#customer-rental-store').validate({
        rules: {
            start_datetime: {
                required: true,
            },
            duration: {
                required: true,
            },
        }
    });
});
