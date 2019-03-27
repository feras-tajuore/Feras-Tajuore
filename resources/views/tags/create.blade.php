@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Create Tag</strong></div>

                <div class="card-body">
                  <form action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="tag">Tag</label>
                      <input class="form-control" type="text" name="tag" placeholder="Enter tag" value="{{ old('tag') }}">
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
