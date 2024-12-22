@extends('layouts.app')

@section('content')
    <div>
        <h1 class="text-center text-primary fw-bold">{{ $content->content_title }} information</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="layout_column" class="form-label">Layout Column</label>
                            <select class="form-control wide" id="layout_column" name="layout">
                                <option value="one_x_col">One column</option>
                                <option value="two_x_col">Two Column</option>
                                <option value="three_x_col">Three Column</option>
                                <option value="four_x_col">Four Column</option>

                            </select>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub-title" class="form-label">Sub-title</label>
                        <input class="form-control @error('sub_title') is-invalid @enderror" id="sub-title" name="sub_title"
                            placeholder="Sub-title">
                        @error('sub_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12">

                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="mb-3">
                                <label for="input-img" class="form-label">Picture</label>
                                <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                    id="picture" name="picture" accept="image/png, image/gif, image/jpeg">
                                @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 picture_1">
                            <div class="mb-3">
                                <label for="input-img" class="form-label">Picture 1</label>
                                <input type="file" class="form-control @error('picture_1') is-invalid @enderror"
                                    id="picture_1" name="picture_1" accept="image/png, image/gif, image/jpeg">
                                @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 picture_2">
                            <div class="mb-3">
                                <label for="input-img" class="form-label">Picture 2</label>
                                <input type="file" class="form-control @error('picture_2') is-invalid @enderror"
                                    id="picture_2" name="picture_2" accept="image/png, image/gif, image/jpeg">
                                @error('picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 picture_3">
                            <div class="mb-3">
                                <label for="input-img" class="form-label">Picture 3</label>
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
                        name="description" placeholder="Sub-title"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="5"
                        name="content"></textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords">
                    @error('keywords')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control nice-select wide" id="status" name="status">
                            <option value="publish">Publish</option>
                            <option value="unpublish">Unpublish</option>
                        </select>
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
        $('.picture_1').hide();
        $('.picture_2').hide();
        $('.picture_3').hide();
        $('#layout_column').change(function() {
            if ($(this).val() == 'one_x_col') {
                $('.picture_1').hide(300);
                $('.picture_2').hide(300);
                $('.picture_3').hide(300);
            } else if ($(this).val() == 'two_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').hide(300);
                $('.picture_3').hide(300);
            } else if ($(this).val() == 'three_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').show(300);
                $('.picture_3').hide(300);
            } else if ($(this).val() == 'four_x_col') {
                $('.picture_1').show(300);
                $('.picture_2').show(300);
                $('.picture_3').show(300);
            }
        })
    </script>
@endsection
