@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-center text-primary fw-bold">Menu information</h1>

        <form action="{{ route('menu.store') }}" class="col-lg-6 col-md-6 col-sm-12" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Menu Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
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

