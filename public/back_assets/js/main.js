$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function () {
        $('.alert').slideUp(500);
    }, 2500);

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
            [5, 10, 15, 25, 50, 100, 150, 200, -1],
            [5, 10, 15, 25, 50, 100, 150, 200, 'All']
        ],
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




})


function order_id(order_id, menu_table, route) {

    $(order_id).dblclick(function () {
        $(this).removeAttr('readonly');
    })

    $(order_id).blur(function () {
        var id = $(this).parents('tr').find('input[type=checkbox]').attr('id');
        console.log(id);
        var input_id = $(this).val();
        $.ajax({
            type: "post",
            url: route,
            data: {
                id: id,
                input_id: input_id,
            }

            ,
            dataType: "json",
            success: function (res) {
                console.log(res.success);
                $(menu_table).prepend(
                    `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${res.success}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>`,
                )

                setTimeout(function () {
                    $('.alert').slideUp(500);
                }, 2500);

                // window.location.reload();
            }
        });

    })

}
