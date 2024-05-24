$(document).ready(function(){
    $('.has-child > .menu-link').click(function(e){
        e.preventDefault(); 
        $(this).next('.sub-menu').slideToggle(); 
    });
});