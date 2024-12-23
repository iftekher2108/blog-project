@extends('layouts.app')

@section('content')
    <div>
        <h1 class="text-center text-primary fw-bold">{{ $content->content_title }} information</h1>

        <form action="{{ route('content.update',$content->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-2 ">

                <div class="col-md-6">
                    <div class="mb-3">

                        @php
                            $layouts = [
                                'one_x_col' => 'One column',
                                'two_x_col' => 'Two Column',
                                'three_x_col' => 'Three Column',
                                'four_x_col' => 'Four Column',
                            ];
                        @endphp

                        <label for="layout_column" class="form-label">Layout Column</label>
                        <select class="form-control bg-white" id="layout_column" name="layout">
                            @foreach ( $layouts as $key => $layout)
                                <option value="{{ $key }}" @selected($content->layout == $key) >{{ $layout }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="content_title" class="form-label">content_title</label>
                        <input class="form-control @error('content_title') is-invalid @enderror" id="content_title"
                            name="content_title" value="{{ $content->content_title }}" readonly tabindex="-1" placeholder="Content Title">
                        @error('content_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ $content->title }}" placeholder="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12 title_1">
                    <div class="mb-3">
                        <label for="title_1" class="form-label">Title 1</label>
                        <input class="form-control @error('title_1') is-invalid @enderror" id="title_1" name="title_1"
                            value="{{ $content->title_1 }}" placeholder="title 1">
                        @error('title_1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="col-md-12">

                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="mb-3">
                                <label for="input-img" class="form-label mb-1">Picture</label>
                                <img src="{{ !empty($content->picture) ? $content->picture : asset('back_assets/image/dummy.jpg') }}"
                                    class="img-fluid mb-1 picture rounded" alt="picture">
                                <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                    id="picture" name="picture" accept="image/png, image/gif, image/jpeg">
                                @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 picture_1">
                            <div class="mb-3">
                                <label for="input-img" class="form-label mb-1">Picture 1</label>
                                <img src="{{ !empty($content->picture_1) ? $content->picture_1 : asset('back_assets/image/dummy.jpg') }}"
                                    class="img-fluid mb-1 picture_1 rounded" alt="picture 1">
                                <input type="file" class="form-control @error('picture_1') is-invalid @enderror"
                                    id="picture_1" name="picture_1" accept="image/png, image/gif, image/jpeg">
                                @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 picture_2">
                            <div class="mb-3">
                                <label for="input-img" class="form-label mb-1">Picture 2</label>
                                <img src="{{ !empty($content->picture_2) ? $content->picture_2 : asset('back_assets/image/dummy.jpg') }}"
                                    class="img-fluid mb-1 picture_2 rounded" alt="picture 2">
                                <input type="file" class="form-control @error('picture_2') is-invalid @enderror"
                                    id="picture_2" name="picture_2" accept="image/png, image/gif, image/jpeg">
                                @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 picture_3">
                            <div class="mb-3">
                                <label for="input-img" class="form-label mb-1">Picture 3</label>
                                <img src="{{ !empty($content->picture_3) ? $content->picture_3 : asset('back_assets/image/dummy.jpg') }}"
                                    class="img-fluid mb-1 picture_3 rounded" alt="picture 3">
                                <input type="file" class="form-control @error('picture_3') is-invalid @enderror"
                                    id="picture_3" name="picture_3" accept="image/png, image/gif, image/jpeg">
                                @error('picture_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>


            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5"
                        name="description" placeholder="description">{{ $content->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 content">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="5" name="content"
                        placeholder="Content">{{ $content->content }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 content_1">
                <div class="mb-3">
                    <label for="content_1" class="form-label">Content 1</label>
                    <textarea class="form-control @error('content_1') is-invalid @enderror" id="content_1" rows="5"
                        name="content_1" placeholder="Content 1">{{ $content->content_1 }}</textarea>
                    @error('content_1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 link">
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input class="form-control @error('link') is-invalid @enderror" id="link" name="link"
                        value="{{ $content->link }}" placeholder="link">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 link_1">
                <div class="mb-3">
                    <label for="link_1" class="form-label">Link 1</label>
                    <input class="form-control @error('link_1') is-invalid @enderror" id="link_1" name="link_1"
                        value="{{ $content->link_1 }}" placeholder="link 1">

                    @error('link_1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control nice-select wide" id="status" name="status">
                                <option value="publish">Publish</option>
                                <option value="unpublish">Unpublish</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="is_homepage" class="form-label">Show Home Page</label>
                            <div class="d-flex gap-2 align-items-center">
                                <input type="checkbox" class="form-check" style="width: 2rem; height:2rem;"
                                    id="is_homepage" name="is_homepage" value="1"
                                    @if ($content->is_homepage == 1) checked @endif>

                            </div>

                        </div>
                    </div>
                </div>


            </div>


    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mt-3">Create</button>
    </div>


    </form>

    </div>
@endsection

@section('script')
    <script>
        $('.content_1').hide();

            if ($("#layout_column").val() == 'one_x_col') {
                $('.picture_1').hide(300);
                $('.picture_2').hide(300);
                $('.picture_3').hide(300);
                $('.title_1').show(300);
                $('.content').show(300);
                $('.link').hide();
                $('.link_1').hide();
            } else if ($("#layout_column").val() == 'two_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').hide(300);
                $('.picture_3').hide(300);
                $('.title_1').show(300);
                $('.content').hide(300);
                $('.link').show();
                $('.link_1').show();
            } else if ($("#layout_column").val() == 'three_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').show(300);
                $('.picture_3').hide(300);
                $('.title_1').hide(300);
                $('.content').hide(300);
                $('.link').hide();
                $('.link_1').hide();
            } else if ($("#layout_column").val() == 'four_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').show(300);
                $('.picture_3').show(300);
                $('.title_1').hide(300);
                $('.content').hide(300);
                $('.link').hide();
                $('.link_1').hide();
            }


        $('#layout_column').change(function() {
            if ($(this).val() == 'one_x_col') {
                $('.picture_1').hide(300);
                $('.picture_2').hide(300);
                $('.picture_3').hide(300);
                $('.title_1').show(300);
                $('.content').show(300);
                $('.link').hide();
                $('.link_1').hide();
            } else if ($(this).val() == 'two_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').hide(300);
                $('.picture_3').hide(300);
                $('.title_1').show(300);
                $('.content').hide(300);
                $('.link').show();
                $('.link_1').show();
            } else if ($(this).val() == 'three_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').show(300);
                $('.picture_3').hide(300);
                $('.title_1').hide(300);
                $('.content').hide(300);
                $('.link').hide();
                $('.link_1').hide();
            } else if ($(this).val() == 'four_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').show(300);
                $('.picture_3').show(300);
                $('.title_1').hide(300);
                $('.content').hide(300);
                $('.link').hide();
                $('.link_1').hide();
            }
        })


        function imagePreview(input, image) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(image).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#picture").change(function() {
            imagePreview(this, '.picture');
        });

        $("#picture_1").change(function() {
            imagePreview(this, '.picture_1');
        });

        $("#picture_2").change(function() {
            imagePreview(this, '.picture_2');
        });

        $("#picture_3").change(function() {
            imagePreview(this, '.picture_3');
        });
    </script>
@endsection
