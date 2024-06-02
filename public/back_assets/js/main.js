    // Global ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(window).on('load', function(){
            $('#preloader').fadeOut(400)
    })

    $(document).ready(function () {

        // menu bar toggler
        $('.menu-toggle').click(function () {
            $(this).siblings('.menu-sub').slideToggle(300)
            $(this).children('i.arrow').toggleClass('rotate');
        })

        // data table init
        $('.datatable').DataTable({
            "responsive": true,
            "autoWidth": false,
            lengthMenu: [
                [10, 15, 25, 50, 100, 150, 200, -1],
                [10, 15, 25, 50, 100, 150, 200, 'All']
            ],
            "pageLength":10,
            stateSave: true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        $('.dt-layout-row .dt-layout-cell .dt-length select').each(function () {
            $(this).addClass('nice-select wide');
        });
        $('.dt-layout-row .dt-layout-cell .dt-length label').css({
            'display': 'none'
        });


        // nice select init
        $('.nice-select').niceSelect();


        // profile update
        $(".btn").click(function() {
            $(this).prepend('<i class="fa-solid fa-spinner me-2 fa-spin"></i>')
        })


    })
