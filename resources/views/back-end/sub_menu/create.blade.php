@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-center text-primary fw-bold">Create New Menu</h1>

        <form action="{{ route('sub_menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 ">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="men_id" class="form-label">Menu</label>
                        <select class="form-control nice-select wide @error('men_id') is-invalid  @enderror" id="men_id" name="men_id">
                           @foreach ( $menus as $menu )
                                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                           @endforeach


                        </select>
                        @error('men_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Menu Title</label>
                        <input class="form-control @error('title') is-invalid  @enderror" id="title" name="title" placeholder="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input class="form-control" id="slug" readonly name="slug" placeholder="title">
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

            <input type="submit" class="btn btn-primary mt-3" value="Create">

        </form>

    </div>
@endsection

@section('script')
    <script>

        $("input[name=title]").on('input', function() {
            $('input[name=slug]').val($(this).val().toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-"));
        })

    </script>
@endsection
