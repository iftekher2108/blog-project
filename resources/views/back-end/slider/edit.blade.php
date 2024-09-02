@extends('layouts.app')

@section('content')
    <div>

        <h3 class="text-center">Slide information</h3>

        <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">

                <div class="col-md-12 mb-2">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="input-img" class="form-label">Picture</label>
                        <div class="preview-img overflow-hidden card">
                            <img src="{{ asset('storage/slider/'.$slider->picture) }}" class="img-fluid">
                        </div>
                        <input type="file" hidden class="form-control @error('picture') is-invalid @enderror"
                            id="input-img" name="picture" accept="image/png, image/gif, image/jpeg">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$slider->title) }}" id="title" name="title"
                            placeholder="Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="sub-title" class="form-label">Sub-title</label>
                        <input class="form-control @error('sub_title') is-invalid @enderror" id="sub-title" value="{{ old('sub_title',$slider->sub_title) }}" name="sub_title" placeholder="Sub-title">
                        @error('sub_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="video-link" class="form-label">link</label>
                        <input class="form-control @error('link') is-invalid @enderror" id="video-link" value="{{ old('link',$slider->link) }}" name="link" placeholder="title">
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


            <div class="d-flex justify-content-end">
                <button class="btn btn-primary py-2 px-4 mt-3">Update</button>
            </div>

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
