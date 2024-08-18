@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-center text-primary fw-bold">News Category information</h1>

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="input-img" class="form-label">Picture</label>
                    <div class="preview-img border rounded border-1">
                        <img src="{{ asset('back_assets/image/dummy.jpg') }}" width="450" class="img-fluid rounded">
                    </div>
                    @error('picture')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                        <input type="file" class="form-control @error('picture') is-invalid @enderror" id="input-img"
                            name="picture" hidden accept="image/png, image/gif, image/jpeg">


            <div class="row g-2 mt-2">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="Title">
                        @error('title')
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
                <button class="btn btn-primary py-2 px-4 mt-3">Create</button>
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

        $(".preview-img").click(function(){
            $('#input-img').click();
        })


    </script>
@endsection
