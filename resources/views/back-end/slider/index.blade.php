@extends('layouts.app')

@section('content')
<div>

    <div class="mt-2">
    <h1></h1>
    <div class="d-flex justify-content-between mb-2">
       <a href="" class="btn btn-danger">Delete All</a> <a href="" class="btn btn-primary">Create</a>
    </div>

    <table class="table datatable table-striped w-100  table-hover">
        <thead >
          <tr class="bg-primary text-white">
            <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th >Action</th>

          </tr>
        </thead>
        <tbody>

        @for($i=0; $i<100; $i++)
          <tr>
            <td><input type="checkbox" class="select-item form-check-input" ></td>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td><div class="badge bg-success">publish</div></td>
            <td><div class="d-flex justify-content-around">
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </div>
            </td>
          </tr>
          @endfor


        </tbody>
      </table>

      </div>


    <div class="my-2">
      <h1></h1>
    <div class="d-flex justify-content-between mb-2">
       <a href="" class="btn btn-danger">Delete All</a> <a href="" class="btn btn-primary">Create</a>
    </div>
      <table class="table datatable table-striped w-100  table-hover">
        <thead >
          <tr class="bg-primary text-white">
            <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th >Action</th>

          </tr>
        </thead>
        <tbody>

        @for($i=0; $i<100; $i++)
          <tr>
            <td><input type="checkbox" class="select-item form-check-input" ></td>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td><div class="badge bg-success">publish</div></td>
            <td><div class="d-flex justify-content-around">
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </div>
            </td>
          </tr>
          @endfor


        </tbody>
      </table>
    </div>

</div>
@endsection



