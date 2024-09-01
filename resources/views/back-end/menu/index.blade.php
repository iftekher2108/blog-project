@extends('layouts.app')

@section('content')

        <div class="menu-table my-2">
            <h4 class="text-center">Menu information</h4>

            <table class="table datatable table-striped w-100  table-hover">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Sort-Id</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="sortable">

                    @foreach ($menus as $menu)
                        <tr data-id="{{ $menu->id }}">
                            <td><i class="fa-solid mx-2 fa-sort"></i>{{ $menu->order_id }}</td>
                            </td>
                            <td>{{ $menu->id }}</td>

                            <td>{{ $menu->title }}</td>
                            <td>
                                <span
                                    class="badge {{ $menu->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $menu->status }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('menu.edit',$menu->id) }}" class="btn btn-primary">Edit</a>
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
        orderUpdate(`{{ route('menu.order.change') }}`)
    },
});

</script>
@endsection
