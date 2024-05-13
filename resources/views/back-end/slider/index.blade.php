@extends('layouts.app')

@section('content')


    <div class="mt-2">
    <h1></h1>
    <div class="d-flex justify-content-between mb-2">
       <a href="" class="btn btn-danger">Delete All</a> <a href="{{ route('slider.create') }}" class="btn btn-primary">Create</a>
    </div>

    <table class="table datatable table-striped w-100  table-hover">
        <thead >
          <tr class="bg-primary text-white">
            <th>#</th>
            <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
            <th>Id</th>
            <th>sort-id</th>
            <th>Title</th>
            <th>Sub-title</th>
            <th>Picture</th>
            <th>Status</th>
            <th >Action</th>
          </tr>

        </thead>
        <tbody class="sortable">

        @foreach ( $sliders as $slider )
            <tr data-id={{ $slider->id }}>
                        <td><i class="fa-solid fa-sort"></i></td>
                        <td><input type="checkbox" class="select-item form-check-input" ></td>
                        <td>1</td>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>
                        <td><div class="badge bg-success">publish</div></td>
                        <td><div class="d-flex justify-content-around">
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
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
    console.log(order.id)

    $.ajax({
        type: "post",
        url: `{{ route('slider.order.change') }}`,
        data: {
          orders:order
        },
        dataType: "json",
        success: function (res) {

            $('.menu-table').prepend(
                    `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${res.success}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>`,
                )
            setTimeout(function(){
                window.location.reload();
            }, 1500);

        }
    });
}

</script>

@endsection


