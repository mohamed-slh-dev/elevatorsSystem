


  {{-- add / update Message --}}
  @if ($message = Session::get('success'))

    <div class="col-12">

      <div class="alert alert-primary dark alert-dismissible fade show text-center" role="alert">
        <strong>{{$message}}</strong> 
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      {{Session::forget('success')}}
    </div>
    {{-- end col --}}

  @endif


  {{-- error / delete message --}}
  @if ($message = Session::get('warning'))

    <div class="col-12">

      <div class="alert alert-danger dark alert-dismissible fade show text-center" role="alert">
        <strong>{{$message}} </strong> 
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      {{Session::forget('warning')}}
    </div>
    {{-- end col --}}
    
  @endif

   


