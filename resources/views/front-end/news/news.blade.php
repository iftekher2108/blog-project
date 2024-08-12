@extends('layouts.front')



@section('title')
@endsection


@section('description')
@endsection

@section('keywords')
@endsection


@section('front-content')
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
                    <div class="card-header fw-semibold fs-5 bg-primary text-white-50">
                        Latest News
                    </div>
                    <div class="card-body">

                        <div class="card">
                            <div class="card-body">
                                name
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-2">
                <div class="card">
                    <div class="card-header fs-5 fw-semibold text-center bg-primary text-white-50">
                        Catagories
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
