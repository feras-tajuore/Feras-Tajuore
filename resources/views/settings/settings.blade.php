@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Edit Settigns</strong></div>

                <div class="card-body">
                  <form action="{{ route('settings.update' , $settings->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="text" name="blog_name" placeholder="Enter Blong Name" value="{{ $settings->blog_name }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input class="form-control" type="email" name="blog_email" placeholder="Enter Blong Email" value="{{ $settings->blog_email }}">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone Number" value="{{ $settings->phone_number }}">
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input class="form-control" type="text" name="address" placeholder="Enter Your Address" value="{{ $settings->address }}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                  </form>
                  @include('errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
