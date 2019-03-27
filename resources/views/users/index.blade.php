@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Show User</strong></div>

                <div class="card-body text-center">
                  @if ($users->count() > 0)
                    <table class="table table-striped">
                        <thead class="text-center">
                          <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Create Date</th>
                            <th scope="col">Control</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @foreach ($users as $user)
                            <tr>
                              <th scope="row">{{ $user->id }}</th>
                              <td><img src="{{ asset('uploads/avatar/1.png') }}" alt="" class="img-thumbnail" width="100" height="100"></td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->created_at }}</td>
                              <td>
                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                  <a class="btn btn-info" href="#">Show</a>
                                  {{-- <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}"><i class="fas fa-edit"></i></a> --}}
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
                    <strong>No Trashed users</strong>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
