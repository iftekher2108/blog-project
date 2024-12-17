@extends('layouts.app')

@section('content')
    <div>

        <h3 class="text-center">Menu information</h3>

        <form action="{{ route('menu.update',$menu->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$menu->title) }}" id="title" name="title"
                            placeholder="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="route" class="form-label">Route</label>
                        <input class="form-control @error('slug') is-invalid @enderror" tabindex='-1' readonly value="{{ old('slug',$menu->slug) }}" id="slug" name="slug"
                            placeholder="Route">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-2">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="input-img" class="form-label">Picture</label>
                        <div class="preview-img overflow-hidden card">
                            <img src="{{ (!empty($menu->picture)) ? asset('storage/'. $menu->picture) : asset('back_assets/image/dummy.jpg') }}" class="img-fluid">
                        </div>
                        <input type="file" hidden class="form-control @error('picture') is-invalid @enderror"
                            id="input-img" name="picture" accept="image/png, image/gif, image/jpeg">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control tinymce @error('content') is-invalid @enderror" id="content" rows="5" name="content">{{ old('content',$menu->content) }}</textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="keyword" class="form-label">Keywords</label>
                        <input class="form-control @error('keyword') is-invalid @enderror" placeholder="Example, Example" value="{{ old('keyword',$menu->keyword) }}" id="keyword" name="keyword">
                        @error('keyword')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="description" rows="5" name="description">{{ old('description',$menu->description) }}</textarea>
                        @error('description')
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

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary py-2 px-4 mt-3">Update</button>
            </div>

        </form>

    </div>
@endsection


