
    // Global ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(window).on('load', function () {
        $('#preloader').fadeOut(400)
    })

    $(document).ready(function () {

        // menu bar toggler
        $('.menu-toggle').click(function () {
            $(this).siblings('.menu-sub').slideToggle(200)
            $(this).children('i.arrow').toggleClass('rotate');
        })

        // data table init
        $('.datatable').DataTable({
            responsive: true,
            autoWidth: true,
            buttons: [
                    'colvis','excelHtml5','pdfHtml5',
                {
                    text: 'Json',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        DataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
                    }
                },
                {
                    extend:'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    // customize: function (win) {
                    //     $(win.document.body)
                    //         .css('font-size', '10pt')
                    //         .prepend(
                    //             // '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                    //             `<h1 style="position:absolute; top:25%; left:25%;" >iftekher mahmud pervez</h1>`
                    //         );

                    //     $(win.document.body)
                    //         .find('table')
                    //         .addClass('compact')
                    //         .css('font-size', 'inherit');
                    // }

                },

            ],
            layout: {
                top1End: 'buttons',
            },
            // columnDefs: [
            //     {
            //         targets: -1,
            //         visible: false
            //     }
            // ],

            lengthMenu: [
                [10, 15, 25, 50, 100, 150, 200, -1],
                [10, 15, 25, 50, 100, 150, 200, 'All']
            ],
            pageLength: 10,
            stateSave: true,
            select:true,

            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        $('.dt-button').addClass('btn btn-primary');
        // $('.dt-layout-row .dt-layout-cell .dt-length select').each(function () {
        //     $(this).addClass('nice-select wide');
        // });
        // $('.dt-layout-row .dt-layout-cell .dt-length label').css({
        //     'display': 'none'
        // });


        // nice select init
        $('.nice-select').niceSelect();


        // profile update
        $(".btn").click(function () {
            $(this).prepend('<i class="fa-solid fa-spinner me-2 fa-spin"></i>');
            setTimeout(function () {
                $('i.fa-solid.fa-spinner.me-2.fa-spin').remove();
            },1500)
        })

        // tiny mce plugins initialization

        // const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    //     const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea.tinymce',
            plugins: 'preview importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount charmap quickbars emoticons accordion',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table ',
            toolbar: "undo redo | bold italic superscript subscript underline strikethrough blocks fontsizeinput fontfamily align numlist bullist | link image | forecolor backcolor removeformat | table media | lineheight outdent indent| charmap emoticons | print |code fullscreen preview |  pagebreak anchor codesample | accordion accordionremove | ltr rtl",
            autosave_ask_before_unload: true,
            autosave_interval: '10s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            // link_list: [{
            //         title: 'My page 1',
            //         value: 'https://www.tiny.cloud'
            //     },
            //     {
            //         title: 'My page 2',
            //         value: 'http://www.moxiecode.com'
            //     }
            // ],
            // image_list: [{
            //         title: 'My page 1',
            //         value: 'https://www.tiny.cloud'
            //     },
            //     {
            //         title: 'My page 2',
            //         value: 'http://www.moxiecode.com'
            //     }
            // ],

            image_class_list: [{
                    title: 'Default',
                    value: 'default-img'
                },
                {
                    title: 'Cube Style',
                    value: 'cube-img'
                },
                {
                    title: 'Peralax Style',
                    value: 'peralax-img'
                },
                {
                    title: 'Sun Flower Style',
                    value: 'sun-flower-img'
                }
            ],

            importcss_append: true,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/tiny-mce-upload',
            file_picker_types: 'image',
            file_picker_callback: (cb, value, meta) => {
                /* Provide file and text for the link dialog */

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();


                // if (meta.filetype === 'file') {
                //     callback('https://www.google.com/logos/google.jpg', {
                //         text: 'My text'
                //     });
                // }

                /* Provide image and alt text for the image dialog */
                // if (meta.filetype === 'image') {
                //     callback('https://www.google.com/logos/google.jpg', {
                //         alt: 'My alt text'
                //     });
                // }

                /* Provide alternative source and posted for the media dialog */
                // if (meta.filetype === 'media') {
                //     callback('movie.mp4', {
                //         source2: 'alt.ogg',
                //         poster: 'https://www.google.com/logos/google.jpg'
                //     });
                // }
            },
            height: 600,
            highlight_on_focus: false,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | fontsizeinput | forecolor backcolor quicklink charmap emoticons h2 h3 align quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'wrap',
            contextmenu: 'link image table',
            // skin: useDarkMode ? 'oxide-dark' : 'oxide',
            // content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
        // tiny mce text editor


        // table data select all function


        $('.select-all').click(function () {
            if ($(this).prop('checked')) {
                $('.delete-all').removeClass('disabled');
            } else {
                $('.delete-all').addClass('disabled');
            }
            $(this).parents('table').find('.select-item').prop('checked', $(this).prop('checked'))
        })


        // image preview for check
        $('#input-img').on('input', function (e) {
            $('.preview-img img').attr('src', URL.createObjectURL(e.target.files[0]))
        })
        // image preview for check

        $(".preview-img").click(function () {
            $('#input-img').click();
        })



        $(".select-item").click(function () {
            var allChecked = true;
            if ($(".select-item").prop('checked')) {
                $('.delete-all').removeClass('disabled');
            } else {
                $('.delete-all').addClass('disabled');
            }

            $(".select-item").each(function () {
                if (!$(this).prop('checked')) {
                    allChecked = false;
                    return false; // exit the loop early if any checkbox is not checked
                }
            });

            $(this).parents('table').find('.select-all').prop("checked", allChecked);
        });

        // table data select all function


    })


    // =================== select all ajax function ===============================

    function requestAll(url, notify, color) {

        var ids = [];

        $('.select-item:checked').each(function () {
            ids.push($(this).val());
        });

        // console.log(ids);

        $.ajax({
            type: "post",
            url: url,
            data: {
                id: ids,
            },
            success: function (res) {
                var html = `<div class="alert bg-` + color + ` text-white shadow-none fw-bold alert-dismissible fade show" role="alert">
                 ` + res[notify] + `
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;

                $('.dash-content .card .card-body:eq(0)').prepend(html);

                $('.select-item:checked').each(function () {
                    $(this).parent().parent('tr').hide(300);
                })
                setTimeout(function () {
                    window.location.reload();
                }, 1500)
            }
        });
    }


    // =================== select all ajax function ===============================


    // Sort function
    function orderUpdate(route) {
        var order = [];
        $('.sortable tr').each(function (index, element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index + 1,
            })
        })
        // console.log(order.id)

        $.ajax({
            type: "post",
            url: route,
            data: {
                orders: order
            },
            dataType: "json",
            success: function (res) {

                $('.menu-table').prepend(
                    `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${res.success}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
                )
                // console.log(res)
                setTimeout(function () {
                    window.location.reload();
                }, 1500);

            }
        });
    }

    // Sort function
