@extends('layouts.app')

@section('content')
<div class="menu-table my-2">
    <h4 class="text-center">Menu information</h4>

    <table class="table datatable table-striped w-100  table-hover">
        <thead>
            <tr class="bg-primary text-white">
                <th>Id</th>
                <th>Content title</th>
                <th>Picture</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody class="sortable">

            @foreach ($contents as $content)
                <tr>
                    <td></i>{{ $content->id }}</td>
                    </td>
                    <td>{{ $content->content_title}}</td>

                    <td><img src="{{ $content->picture }}" class="img-fluid" height="40" width="40" alt="{{ $content->content_title }}"></td>
                    <td>
                        <span
                            class="badge {{ $content->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $content->status }}</span>
                    </td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('content.edit',$content->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection


