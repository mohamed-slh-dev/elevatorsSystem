@extends('layouts.app')

@section('title', 'تعديل أجزاء المصعد')
    
@section('content')
   
<div class="col-3"></div>
<div class="col-3 mb-5">
    <input class='form-control text-center fw-bold' type="text" readonly value='{{$elevator->name}}' style="pointer-events: none">
</div>



<div class="col-12">

  <form action="{{route('updateElevatorParts')}}" method="post">

    @csrf
    
    <input type="hidden" name="id" value="{{$elevator->id}}" id="">
    
    
    {{-- checkboxes wrapper --}}
    <div class="form-group m-checkbox-inline mb-0">

      {{-- loop - parts  --}}
      @foreach ($parts as $part)

        
        {{-- single checkbox --}}
        <div class="checkbox checkbox-dark checkbox--item mb-3" style="width: 33%">

          @if (in_array($part->id, $elevator_parts))
            <input id="inline-{{$part->id}}" checked type="checkbox" name="elevator_parts[]" value="{{$part->id}}">
          @else
            <input id="inline-{{$part->id}}" type="checkbox" name="elevator_parts[]" value="{{$part->id}}">
          @endif

          <label for="inline-{{$part->id}}">{{ $part->name}}
            <span class='fs-12 fw-bold' style="color:rgb(125, 106, 0)">
              ({{$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price'] . ' ريال'}})
            </span>
          </label>

        </div>
        {{-- end single checkbox --}}

      @endforeach
      {{-- end loop --}}

    </div>
    {{-- end checkboxes wrapper --}}



    {{-- confirm / return buttons --}}
    <div class="d-flex align-items-center justify-content-between mt-3 border-top pt-3">

      <button class="btn btn-primary">حفظ التغييرات</button>

      <a href="{{route('elevators')}}" class='scale--2'>
        <button class="btn btn-outline-danger">الرجوع الى المصاعد<i class="fa fa-angle-double-left ms-2"></i></button>
      </a>

    </div>
    {{-- end confirm / return buttons --}}

  </form>
  {{-- end form --}}

</div>
{{-- end col --}}


@endsection