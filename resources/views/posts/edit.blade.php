@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Edit Post</strong></div>

                <div class="card-body">
                  <form action="{{ route('post.update' , $post->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                      <label for="catogory">Catogory</label>
                      <select class="form-control" name="catogory_id" id="catogory">
                        @foreach ($catogories as $catogory)
                          @if ($catogory->id == $post->catogory_id)
                            <option value="{{ $catogory->id }}" selected>{{ $catogory->name }}</option>                                
                          @else
                            <option value="{{ $catogory->id }}">{{ $catogory->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-check">
                      @foreach ($tags as $tag)
                      <label for="tag" class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="tag[]" value="{{ $tag->id }}"
                        @foreach ($post->tags as $ta)
                            
                          @if ($tag->id == $ta->id)
                            checked
                          @endif
                        @endforeach
                        >{{ $tag->tag }}</label><br>
                      @endforeach
                    </div>

                    {{-- <div class="form-group">
                        @foreach ($tags as $tag)
                      <label form="completed" class="{{ $tag->completed ? 'is-completed' : '' }}">
                        <input type="checkbox" name="completed" {{ $tag->completed ? "checked" : '' }}/>
                        {{$tag->tag}}
                      </label>
                      @endforeach
                    </div> --}}

                    <div class="form-group">
                      <label for="title">Title</label>
                      <input class="form-control" type="text" name="title" placeholder="Enter Title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                      <label for="content">Description</label>
                      <textarea class="form-control" name="content" cols="8" rows="8" placeholder="Enter Content">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="photo">Photo</label>
                      <input class="form-control-file" type="file" name="photo">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">update</button>
                    </div>
                  </form>
                  @include('errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
