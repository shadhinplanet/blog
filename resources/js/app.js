require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

jQuery(document).ready(function($){

    setTimeout(() => {
        $(".single_notification").slideUp('slow');
    }, 2000);

});
