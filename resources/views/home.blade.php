@extends('layouts.app')

@section('content')
    <div>
        <div class="row g-3">

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header text-white-50 text-center bg-primary">
                        <h3>News Info</h3>
                    </div>
                    <div class="card-body">

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Total News:</span><span> {{ count($services->where('status','publish')) }}</span>
                        </div>

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Category:</span><span> {{ count($services->where('status','unpublish')) }}</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header text-white-50 text-center bg-primary">
                        <h3>Total Post</h3>
                    </div>
                    <div class="card-body">

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Publish:</span><span> 50</span>
                        </div>

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Unpublish:</span><span> 50</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header text-white-50 text-center bg-primary">
                        <h3>Total Visited</h3>
                    </div>
                    <div class="card-body">

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Total:</span><span> 50</span>
                        </div>

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Unpublish:</span><span> 50</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header text-white-50 text-center bg-primary">
                        <h3>Total Post</h3>
                    </div>
                    <div class="card-body">

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Publish:</span><span> 50</span>
                        </div>

                        <div class=" d-flex justify-content-between ">
                            <span class="fw-bold">Unpublish:</span><span> 50</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
