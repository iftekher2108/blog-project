@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-center text-primary fw-bold">Menu information</h1>

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


                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control tinymce @error('content') is-invalid @enderror" id="content" rows="5" name="content">
                            {{ old('content',$menu->content) }}
                        </textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="keywords" class="form-label">Keywords</label>
                        <input class="form-control @error('keywords') is-invalid @enderror" value="{{ old('keywords',$menu->keywords) }}" id="keywords" name="keywords">
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

