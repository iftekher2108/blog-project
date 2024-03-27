@extends('layouts.app')

@section('content')
    <div>

        @if ($mas = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ $mas }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($mas = Session::get('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $mas }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="my-2">
            <h1></h1>
            <div class="d-flex justify-content-between mb-2">
                <a href="" class="btn btn-danger">Delete All</a>
                <a href="{{ route('menu.create') }}" class="btn btn-primary">Create</a>
            </div>
            <table class="table datatable table-striped w-100  table-hover">
                <thead>
                    <tr class="bg-primary text-white">
                        <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($menus as $menu)
                        <tr>
                            <td><input type="checkbox" class="select-item form-check-input" value='{{ $menu->id }}'>
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
                                    <a href="{{ route('menu.delete', $menu->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        <div class="my-2">
            <h1></h1>
            <div class="d-flex justify-content-between mb-2">
                <a href="" class="btn btn-danger">Delete All</a>
                <a href="{{ route('sub_menu.create') }}" class="btn btn-primary">Create</a>
            </div>
            <table class="table datatable table-striped w-100 table-hover">
                <thead>
                    <tr class="bg-primary text-white">
                        <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
                        <th>Id</th>
                        <th>menu</th>
                        <th>Sub Menu</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($sub_menus as $sub_menu)
                        <tr>
                            <td><input type="checkbox" class="select-item form-check-input" value='{{ $sub_menu->id }}'>
                            </td>
                            <td>{{ $sub_menu->id }}</td>
                            <td>
                                {{  }}
                            </td>
                            <td>{{ $sub_menu->sub_title }}</td>
                            <td>{{ $sub_menu->sub_slug }}</td>
                            <td>
                                <div class="badge {{ ($sub_menu->status == 'publish')? 'bg-success':'bg-danger'}} ">publish</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
