@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Edit Tag</strong></div>

                <div class="card-body">
                  <form action="{{ route('tag.update' , $tag->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                      <label for="tag">Tag</label>
                      <input class="form-control" type="text" name="tag" placeholder="Enter tag" value="{{ $tag->tag }}">
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
