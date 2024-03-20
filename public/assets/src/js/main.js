import $ from 'jquery';


$('.menu-toggle').click(function(){
    $(this).siblings('.menu-sub').slideToggle(300)
})
