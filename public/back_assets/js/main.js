
$(document).ready(function(){

    // menu bar toggler
$('.menu-toggle').click(function(){
    $(this).siblings('.menu-sub').slideToggle(300)
    $(this).children('i.arrow').toggleClass('rotate');
})

  // data table init
$('.datatable').DataTable({
    "responsive": true,
    "autoWidth": false,
    lengthMenu: [
        [5,10,15, 25,50,100,150,200, -1],
        [5,10,15,25,50,100,150,200, 'All']
    ],
    stateSave: true,
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
});

$('.dt-layout-row .dt-layout-cell .dt-length select').each(function(){
$(this).addClass('nice-select wide');
});
$('.dt-layout-row .dt-layout-cell .dt-length label').css({'display': 'none'});


// nice select init
$('.nice-select').niceSelect();



})
