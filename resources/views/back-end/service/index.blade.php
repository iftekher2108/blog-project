@extends('layouts.app')

@section('content')

    <div class="menu-table mt-2">
        <h4 class="text-center">Service information</h4>
        <div class="d-flex justify-content-between my-2">
            <a href="" class="btn delete-all btn-danger disabled">Delete All</a> <a href="{{ route('service.create') }}"
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

                @foreach ($services as $key => $service)
                    <tr data-id={{ $service->id }}>
                        <td> <i class="fa-solid mx-2 fa-sort"></i>{{ $service->order_id }}</td>
                        <td><input type="checkbox" value="{{ $service->id }}" class="select-item form-check-input"></td>
                        <td>{{ $service->id }}</td>
                        <td><img src="{{ asset('storage/'.$service->picture) }}" class="img-thumbnail" width="50" alt=""></td>
                        <td>{{ $service->title }}</td>
                        <td>
                            <div class="badge {{ $service->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $service->status }}</div>
                        </td>
                        <td>
                            <div class="d-flex gap-3">
                                <a href="{{ route('service.edit',$service->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('service.delete',$service->id) }}" class="btn btn-danger">Delete</a>
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
                orderUpdate(`{{ route('service.order.change') }}`)
            },
        });



        $('.delete-all').click(function(e){
            e.preventDefault();
          requestAll(`{{ route('service.delete_all') }}`, 'error', 'danger');
        })

    </script>
@endsection
