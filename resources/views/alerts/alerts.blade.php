

    @if ($message = Session::get('success'))

    <div class="alert alert-primary dark alert-dismissible fade show text-center" role="alert">
        <strong>{{$message}}</strong> 
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    {{Session::forget('success')}}
    @endif

    @if ($message = Session::get('warning'))

    <div class="alert alert-danger dark alert-dismissible fade show text-center" role="alert">
        <strong>{{$message}} </strong> 
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    {{Session::forget('warning')}}
    @endif

   


