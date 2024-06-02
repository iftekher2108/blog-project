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


 <div class="mt-2">
        <h4 class="text-center">Service Catagory information</h4>
        <div class="d-flex justify-content-between my-2">
            <a href="" class="btn btn-danger">Delete All</a> <a href="{{ route('service.category.create') }}"
                class="btn btn-primary">Create</a>
        </div>

        <table class="table datatable table-striped w-100  table-hover">
            <thead>
                <tr class="bg-primary text-white">
                    <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                    <th>Id</th>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>

                @foreach ($services_catagories as $key => $service)
                    <tr>
                        <td><input type="checkbox" class="select-item form-check-input"></td>
                        <td>{{ $service->id }}</td>
                        <td><img src="{{ asset('storage/service/category/'.$service->picture) }}" class="img-thumbnail" width="50" alt=""></td>
                        <td>{{ $service->title }}</td>
                        <td>
                            <div class="badge {{ $service->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $service->status }}</div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('service.category.edit',$service->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('service.category.delete',$service->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <div class="menu-table mt-2">
        <h4 class="text-center">Service information</h4>
        <div class="d-flex justify-content-between my-2">
            <a href="" class="btn btn-danger">Delete All</a> <a href="{{ route('service.create') }}"
                class="btn btn-primary">Create</a>
        </div>

        <table class="table datatable table-striped w-100  table-hover">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Sort-Id</th>
                    <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                    <th>Id</th>
                    <th>Picture</th>
                    <th>Catagory</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody class="sortable">

                @foreach ($services as $key => $service)
                    <tr data-id={{ $service->id }}>
                        <td> <i class="fa-solid mx-2 fa-sort"></i>{{ $service->order_id }}</td>
                        <td><input type="checkbox" class="select-item form-check-input"></td>
                        <td>{{ $service->id }}</td>
                        <td><img src="{{ asset('storage/service/'.$service->picture) }}" class="img-thumbnail" width="50" alt=""></td>
                        <td>{{ $service->service_catagory->title }}</td>
                        <td>{{ $service->title }}</td>
                        <td>
                            <div class="badge {{ $service->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $service->status }}</div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-around">
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
                orderUpdate()
            },
        });



        function orderUpdate() {
            var order = [];
            $('.sortable tr').each(function(index, element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index + 1,
                })
            })
            console.log(order.id)

            $.ajax({
                type: "post",
                url: `{{ route('service.order.change') }}`,
                data: {
                    orders: order
                },
                dataType: "json",
                success: function(res) {

                    $('.menu-table').prepend(
                        `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${res.success}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>`,
                    )
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);

                }
            });
        }
    </script>
@endsection
