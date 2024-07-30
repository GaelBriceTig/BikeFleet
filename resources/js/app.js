import Alpine from 'alpinejs';
import jquery from 'jquery';
import 'jquery-validation/dist/jquery.validate.min';
import 'jquery-datetimepicker/build/jquery.datetimepicker.full.min';

window.Alpine = Alpine;
window.jquery = jquery;

Alpine.start();

jquery('#manufacture_date').datetimepicker({
    minDate: new Date(2020, 1 - 1, 1),
    maxDate: 0,
    timepicker: false,
    format: 'd-m-Y'
});


window.getRowData = function ($element, clickedElement) {
    const tr = $(clickedElement).closest('tr');
    return $element.DataTable().row(tr).data();
}

window.drawDataTable = function ($element, route, columns, withoutEditButton = false, withoutStateButton = false) {

    if (!withoutEditButton) {
        columns.push({
            data: null,
            className: "dt-center editor-edit",
            defaultContent: '<button class="button"><i class="fa fa-pencil"/></button>',
            orderable: false
        });

    }
    if (!withoutStateButton) {
        columns.push({
            data: null, className: "dt-center editor-delete", orderable: false, render: function (data, type, row) {
                if (data.disabled) {
                    return '<button class="button button-enable"><i class="fa-solid fa-caret-up"></i></button>';
                } else {
                    return '<button class="button button-disable"><i class="fa fa-trash"/></button>';
                }
            }
        });
    }
    $element.DataTable({
        ajax: {
            url: route
        }, columns: columns, createdRow: function (row, data, index) {
            if (data.disabled === 1) {
                $(row).addClass('item-disabled');
            }
        }, dom: 'Bfrtip', buttons: ['excel']
    });
}

window.registerEditButton = function ($element, segments) {
    $element.on('click', 'td.editor-edit', function (e) {
        e.preventDefault();
        let data = window.getRowData($element, this);
        window.location.href = `${segments}/${data.id}`;
    });
}

window.registerDisableButton = function ($element, segments) {
    $element.on('click', '.button-disable', function (e) {
        e.preventDefault();
        if (confirm('Souhaitez-vous réellement désactiver cet élément?')) {
            let data = window.getRowData($element, this);
            $.get(`${segments}/${data.id}`);
            $element.DataTable().ajax.reload();
        }
    });

}

window.registerEnableButton = function ($element, segments) {
    $element.on('click', '.button-enable', function (e) {
        e.preventDefault();
        if (confirm('Souhaitez-vous réellement réactiver cet élément?')) {
            let data = window.getRowData($element, this);
            $.get(`${segments}/${data.id}`);
            $element.DataTable().ajax.reload();
        }
    });
}

window.registerShowDisabledChanged = function ($element, routeWithDisabled, route,) {
    $(document).on('change', '.filter-show-disabled', function () {
        if ($(this).prop('checked')) {
            $element.DataTable().ajax.url(route);
        } else {
            $element.DataTable().ajax.url(routeWithDisabled);
        }
        $element.DataTable().ajax.reload();
    });
}

window.hideEditButton = function ($element) {
    $element.on('click', 'td.editor-edit', function (e) {
        e.preventDefault();
        let data = window.getRowData($element, this);
        window.location.href = `${segments}/${data.id}`;
    });
}


// window.registerDatepicker = function (elementId) {
//     const datepickerEl = document.getElementById(elementId);
//     new Datepicker(datepickerEl, {
//         // options
//     });
// }
