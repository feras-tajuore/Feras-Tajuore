@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Show Tags</strong></div>

                <div class="card-body text-center">
                  @if ($tags->count() > 0)
                    <table class="table table-striped">
                        <thead class="text-center">
                          <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Create Date</th>
                            <th scope="col">Control</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @foreach ($tags as $tag)
                            <tr>
                              <th scope="row">{{ $tag->id }}</th>
                              <td>{{ $tag->tag }}</td>
                              <td>{{ $tag->created_at }}</td>
                              <td>
                                <form action="{{ route('tag.destroy',$tag->id) }}" method="POST">
                                  <a class="btn btn-info" href="#">Show</a>
                                  <a class="btn btn-primary" href="{{ route('tag.edit',$tag->id) }}"><i class="fas fa-edit"></i></a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                  </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  @else
                    <strong>No Trashed Posts</strong>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
