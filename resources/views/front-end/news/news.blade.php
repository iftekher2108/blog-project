@extends('layouts.front')



@section('title')
@endsection


@section('description')
@endsection

@section('keywords')
@endsection


@section('content')
    <div class="position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPh3bY8WieFS-lF8PyxffepwCBL0pAnY5RfQ&s" class=" w-100"
            style="height: 70vh;" alt="">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1 class="text-bold text-primary">what is your name</h1>
            <p></p>
        </div>
    </div>

    <div class="row g-2">

        <div class="col-md-8">
            <div class="p-2">
                <div class="card border-0">
                    <div class="card-header fw-semibold mb-3 fs-4 bg-primary text-white-50">
                        Latest News
                    </div>

                        @foreach ($categories as $category)
                            @foreach ($category->news as $new)
                            <a href="" class="mb-3">
                              <div class="card overflow-hidden">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/news/'.$new->picture) }}" class="img-fluid h-100" alt="">
                                        </div>
                                        <div class="col-md-8
                                        ">
                                            <div class="bg-primary p-lg-3 p-md-2 p-sm-1 fs-6 text-white-50">
                                                {{ $new->title }}
                                            </div>
                                            <div class="card-body ">
                                                <p class="line-clamp-3 text-dark">
                                                    {{ $new->description }}
                                                </p>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </a>

                            @endforeach
                        @endforeach

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-2">
                <div class="card">
                    <div class="card-header fs-6 fw-semibold text-center bg-primary text-white-50">
                        Catagories
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="">{{ $category->cat_title }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
