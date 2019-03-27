@if ($errors->any())
      <div class="alert alert-danger" style="margin:20px 0">

    @foreach ($errors->all() as $error)

      <strong><p>{{$error}}</p></strong>

    @endforeach

  </div>
@endif