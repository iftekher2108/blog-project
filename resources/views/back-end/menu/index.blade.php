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


        <div class="menu-table my-2">
            <h4 class="text-center">Menu information</h4>
            <div class="d-flex justify-content-between my-2">
                <a href="" class="btn btn-danger">Delete All</a>
                <a href="{{ route('pages.create') }}" class="btn btn-primary">Create</a>
            </div>
            <table class="table datatable table-striped w-100  table-hover">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Sort-Id</th>
                        <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                        <th>Id</th>
                        <th></th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="sortable">

                    @foreach ($menus as $menu)
                        <tr data-id="{{ $menu->id }}">
                            <td><i class="fa-solid mx-2 fa-sort"></i>{{ $menu->order_id }}</td>
                            <td><input type="checkbox" class="select-item form-check-input" id="{{ $menu->id }}" value='{{ $menu->id }}'>
                            </td>
                            <td>{{ $menu->id }}</td>

                            <td>{{ $menu->title }}</td>
                            <td>{{ $menu->slug }}</td>
                            <td>
                                <span
                                    class="badge {{ $menu->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $menu->status }}</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="" class="btn btn-primary">Edit</a>
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

// order_id('.order_id','.menu-table',`{{ route('menu.order.change') }}`);


$('.sortable').sortable({
    delay:150,
    items:'tr',
    cursor:'move',
    opacity:0.6,
    update:function() {
        orderUpdate()
    },
});

function orderUpdate() {
    var order = [];
    $('.sortable tr').each(function(index, element) {
        order.push({
            id: $(this).attr('data-id'),
            position: index+1,
        })
    })
    // console.log(order.id)

    $.ajax({
        type: "post",
        url: `{{ route('menu.order.change') }}`,
        data: {
          orders:order
        },
        dataType: "json",
        success: function (res) {

            $('.menu-table').prepend(
                    `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${res.success}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>`
                )
                // console.log(res)
            setTimeout(function(){
                window.location.reload();
            }, 1500);

        }
    });
}


</script>
@endsection
