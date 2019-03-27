@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Create Catogories</strong></div>

                <div class="card-body text-center">
                  @if ($catogories->count() > 0)
                    <table class="table table-striped">
                        <thead class="text-center">
                          <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">control</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @foreach ($catogories as $catogory)
                            <tr>
                              <th scope="row">{{ $catogory->id }}</th>
                              <td>{{ $catogory->name }}</td>
                              <td>
                                <form action="{{ route('catogory.destroy',$catogory->id) }}" method="POST">
                                  <a class="btn btn-info" href="#">Show</a>
                                  <a class="btn btn-primary" href="{{ route('catogory.edit',$catogory->id) }}"><i class="fas fa-edit"></i></a>
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
