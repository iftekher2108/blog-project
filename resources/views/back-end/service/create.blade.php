@extends('layouts.app')

@section('content')
    <div>

        <h3 class="text-center">Service Information</h3>

        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-md-12 mb-2">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="input-img" class="form-label">Picture</label>
                        <div class="preview-img overflow-hidden card">
                            <img src="{{ asset('back_assets/image/dummy.jpg') }}" class="img-fluid">
                        </div>
                        <input type="file" hidden class="form-control @error('picture') is-invalid @enderror"
                            id="input-img" name="picture" accept="image/png, image/gif, image/jpeg">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="video-link" class="form-label">service Catagory</label>

                        <select name="service_cat_id" id="" class="form-control wide nice-select @error('service_cat_id') is-invalid @enderror">
                           @foreach ( $services_catagories as $catagory )
                                <option value="{{ $catagory->id }}">{{ $catagory->title }}</option>
                           @endforeach

                        </select>
                        @error('service_cat_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="sub-title" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="6" id="sub-title" name="description" placeholder="Description"></textarea>
                        @error('description')
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

