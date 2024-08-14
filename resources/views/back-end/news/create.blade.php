@extends('layouts.app')

@section('content')
<div>

    <h1 class="text-center text-primary fw-bold">News information</h1>

    <form action="" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row g-2 ">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="preview-img border rounded border-1">
                    <img src="" class="img-fluid rounded">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="input-img" class="form-label">Picture</label>
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" id="input-img" name="picture"
                        accept="image/png, image/gif, image/jpeg">
                    @error('picture')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    <input class="form-control @error('sub_title') is-invalid @enderror" id="sub-title" name="sub_title" placeholder="Sub-title">
                    @error('sub_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5" name="description" placeholder="Sub-title"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control tinymce @error('content') is-invalid @enderror" id="content" rows="5" name="content"></textarea>
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

        <input type="submit" class="btn btn-primary mt-3" value="Create">

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
