@extends('layouts.app')

@section('content')
    @if ($mas = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $mas }}
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($mas = Session::get('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ $mas }}
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="menu-table mt-2">
        <h4 class="text-center">Slider information</h4>
        <div class="d-flex justify-content-between my-2">
            <a href="" class="btn delete-all btn-danger">Delete All</a>
             <a href="{{ route('slider.create') }}"
                class="btn btn-primary">Create</a>
        </div>

        <table class="table datatable table-striped w-100  table-hover">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Sort-Id</th>
                    <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                    <th>Id</th>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody class="sortable">

                @foreach ($sliders as $key => $slider)
                    <tr data-id={{ $slider->id }}>
                        <td> <i class="fa-solid mx-2 fa-sort"></i>{{ $slider->order_id }}</td>
                        <td><input type="checkbox" value="{{ $slider->id }}" class="select-item form-check-input"></td>
                        <td>{{ $slider->id }}</td>
                        <td><img src="{{ asset('storage/slider/'.$slider->picture) }}" class="img-thumbnail" width="50" alt=""></td>
                        <td>{{ $slider->title }}</td>
                        <td>
                            <div class="badge {{ $slider->status == 'publish' ? 'bg-success' : 'bg-danger' }}">publish</div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('slider.delete',$slider->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection

@section('script')
    <script>
        $('.sortable').sortable({
            delay: 150,
            items: 'tr',
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                orderUpdate(`{{ route('slider.order.change') }}`)
            },
        });


        $('.delete-all').click(function(e){
            e.preventDefault();
          requestAll(`{{ route('slider.delete_all') }}`, 'error', 'danger');
        })



    </script>
@endsection
