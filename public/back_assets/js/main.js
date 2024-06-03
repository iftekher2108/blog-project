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
            "pageLength": 10,
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
        $(".btn").click(function () {
            $(this).prepend('<i class="fa-solid fa-spinner me-2 fa-spin"></i>')
        })

        // tiny mce plugins initialization

        // const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea.tinymce',
            plugins: 'preview importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount charmap quickbars emoticons accordion',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table',
            toolbar: "undo redo | bold italic underline strikethrough blocks fontsizeinput fontfamily  | align numlist bullist | link image | forecolor backcolor removeformat | table media | lineheight outdent indent| charmap emoticons | print |code fullscreen preview |  pagebreak anchor codesample | accordion accordionremove | ltr rtl",
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
                    value: 'paralax-img'
                },
                {
                    title: 'Sun Flower Style',
                    value: 'sun-flower-img'
                }
            ],
            importcss_append: true,
            file_picker_types: 'image',
            file_picker_callback: (cb, value, meta) => {
                /* Provide file and text for the link dialog */

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                  var file = this.files[0];
                  var reader = new FileReader();

                  reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), { title: file.name });
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
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            // skin: useDarkMode ? 'oxide-dark' : 'oxide',
            // content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });


    })
