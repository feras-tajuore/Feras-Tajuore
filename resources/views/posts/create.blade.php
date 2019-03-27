@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Create Post</strong></div>

                <div class="card-body">
                  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="catogory">Catogory</label>
                      <select class="form-control" name="catogory_id" id="catogory">
                        <option value="0"></option>
                        @foreach ($catogories as $catogory)
                          <option value="{{ $catogory->id }}">{{ $catogory->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-check">
                      @foreach ($tags as $tag)
                        <input class="form-check-input" type="checkbox" name="tag[]" value="{{ $tag->id }}">
                        <label for="tag" class="form-check-label">{{ $tag->tag }}</label><br/>
                      @endforeach
                    </div>
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input class="form-control" type="text" name="title" placeholder="Enter Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                      <label for="content">Description</label>
                      <textarea class="form-control" name="content" cols="8" rows="8" placeholder="Enter Content">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="photo">Photo</label>
                      <input class="form-control-file" type="file" name="photo">
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
