
// menu bar toggler
$('.menu-toggle').click(function(){
    $(this).siblings('.menu-sub').slideToggle(300)
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
