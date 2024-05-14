@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-center text-primary fw-bold">Service information</h1>

        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="my-1">Slide Image Preview</span>
                    <div class="preview-img border rounded border-1">
                        <img src="" class="img-fluid rounded">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="input-img" class="form-label">Slide Picture</label>
                        <input type="file" class="form-control @error('picture') is-invalid @enderror" id="input-img" name="picture"
                            accept="image/png, image/gif, image/jpeg">
                        <label>max size: 3mb | Dimention Ratio:1280x720 or Higher </label>
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>



                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Slide Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="sub-title" class="form-label">Slide Sub-title</label>
                        <input class="form-control @error('sub_title') is-invalid @enderror" id="sub-title" name="sub_title" placeholder="Sub-title">
                        @error('sub_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="video-link" class="form-label">video link</label>
                        <input class="form-control @error('link') is-invalid @enderror" id="video-link" name="link" placeholder="title">
                        @error('link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control nice-select wide" id="status" name="status">
                            <option value="publish">Publish</option>
                            <option value="unpublish">Unpublish</option>

                        </select>
                    </div>
                </div>

            </div>

            <button class="btn btn-primary mt-3">Create</button>

        </form>

    </div>
@endsection

@section('script')
    <script>
        // image preview for check
        $('#input-img').on('input', function(e) {
            $('.preview-img img').attr('src', URL.createObjectURL(e.target.files[0]))
        })
        // image preview for check
    </script>
@endsection
