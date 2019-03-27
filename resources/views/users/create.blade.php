@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Create Members</strong></div>

                <div class="card-body">
                  <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input class="form-control" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                  </form>
                  @include('errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
