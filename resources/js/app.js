/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('datatables.net-bs4/js/dataTables.bootstrap4');
require('jquery-ui');
window.moment = require('moment');
require('inputmask/dist/jquery.inputmask');
const bsCustomFileInput = require('bs-custom-file-input');
require('tempusdominus-bootstrap-4');
require('select2');

import initDeleteModal from './deletModal';
import initLengthInput from './lengthInput';
import initAutocomplete from './autocomplete';


$(window).on('load',function(){
    $('#status-modal').modal('show');
});

$(() => {
    initDeleteModal();
    initLengthInput();
    initAutocomplete();

    $('[data-mask]').inputmask();

    $('#employmentdate').datetimepicker({
        format: 'DD.MM.YY'
    });

    $('.js-photo-input').change(function () {
        const $img = $(this).closest('.form-group').find('.js-photo-img');
        $img.remove();
    });

    bsCustomFileInput.init();

});















