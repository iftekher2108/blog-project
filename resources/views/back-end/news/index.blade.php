@extends('layouts.app')

@section('content')

<div class="menu-table my-2">
<h4 class="text-center">News information</h4>
<div class="d-flex justify-content-between my-2">
    <a href="" class="btn delete-all btn-danger disabled">Delete All</a>
    <a href="{{ route('news.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table datatable table-striped w-100  table-hover">
    <thead>
        <tr class="bg-primary text-white">
            <th><input type="checkbox" class="select-all form-check-input border-1 border-white "></th>
            <th>Id</th>
            <th></th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody class="sortable">

        @foreach ($news as $new)
            <tr>
                <td><input type="checkbox" class="select-item form-check-input" id="{{ $new->id }}" value='{{ $new->id }}'>
                </td>
                <td>{{ $new->id }}</td>

                <td>{{ $new->title }}</td>
                <td>{{ $new->slug }}</td>
                <td>
                    <span
                        class="badge {{ $new->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $new->status }}</span>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="" class="btn btn-primary">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>



@endsection





