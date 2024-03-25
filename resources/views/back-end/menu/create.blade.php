@extends('layouts.app')

@section('content')
<div>

    <h1 class="text-center text-primary fw-bold">Create New Menu</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Example select</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="title" class="form-label">Example select</label>
            <select class="form-select" id="title" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>

    </form>

</div>
@endsection



