@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-center text-primary fw-bold">Service information</h1>

        <form action="{{ route('service.update',$service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="preview-img border rounded border-1">
                        <img src="{{asset('storage/service/'.$service->picture) }}" class="img-fluid rounded">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="input-img" class="form-label">Picture</label>
                        <input type="file" class="form-control @error('picture') is-invalid @enderror" value="{{ old('picture',$service->picture) }}" id="input-img" name="picture"
                            accept="image/png, image/gif, image/jpeg">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>



                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title',$service->title) }}" name="title"
                            placeholder="Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="video-link" class="form-label">service Catagory</label>

                        <select name="service_cat_id" id="" class="form-control wide nice-select @error('service_cat_id') is-invalid @enderror">
                           @foreach ( $services_catagories as $catagory )
                                <option value="{{ $catagory->id }}" @selected(old('service_cat_id') == $catagory->id) >{{ $catagory->title }}</option>
                           @endforeach

                        </select>
                        @error('service_cat_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="sub-title" class="form-label">Description</label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror" rows="6" id="sub-title" name="short_description" placeholder="Description">{{ old('short_description',$service->short_description) }}</textarea>
                        @error('short_description')
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

            <button class="btn btn-primary mt-3">Update</button>

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
