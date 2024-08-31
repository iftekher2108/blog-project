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
        <h4 class="text-center">News Category information</h4>
        <div class="d-flex justify-content-between my-2">
            <a href="" class="btn delete-all btn-danger disabled">Delete All</a>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table datatable table-striped w-100  table-hover">
            <thead>
                <tr class="bg-primary text-white">
                    <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                    <th>Id</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td><input type="checkbox" class="select-item form-check-input" id="{{ $category->id }}"
                                value='{{ $category->id }}'>
                        </td>
                        <td>{{ $category->id }}</td>
                        <td><img src="{{ asset('storage/category/' . $category->cat_picture) }}" class="img-thumbnail"
                                width="50" alt=""></td>
                        <td>{{ $category->cat_title }}</td>
                        <td>
                            <span
                                class="badge {{ $category->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $category->status }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-3">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger">delete</a>
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
        $('.delete-all').click(function(e) {
            e.preventDefault();
            requestAll(`{{ route('category.delete_all') }}`,'error','danger')
        })
    </script>
@endsection
