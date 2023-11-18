@extends('layouts.app')

@section('title', 'تعديل أجزاء المصعد')
    
@section('content')
   
<div class="col-3"></div>
<div class="col-3 mb-5">
    <input class='form-control text-center fw-bold' type="text" readonly value='{{$maintenance->elevator->name}}' style="pointer-events: none">
</div>



<div class="col-12">

  <form action="{{route('updateMaintenanceParts', [$maintenance->id, $type])}}" method="post">
    @method('POST')
    @csrf


    {{-- checkboxes wrapper --}}
    <div class="form-group m-checkbox-inline mb-0">

      {{-- loop - parts  --}}
      @foreach ($maintenance->elevator->elevatorParts as $part)

        
        {{-- : single checkbox --}}
        <div class="checkbox checkbox-dark checkbox--item mb-3" style="width: 33%">

            
            {{-- : checkbox input / rewrite price if -> part already exists --}}
            @if (in_array($part->part->id, $partsArray))
                
                <input id="inline-{{$part->part->id}}" type="checkbox"
                name="elevator_parts[]" value="{{$part->part->id}}" checked>

                <label for="inline-{{$part->part->id}}">{{ $part->part->name}}</label>


                {{-- price input --}}
                <input class='form-control d-inline-block text-center' 
                style="width: 120px; height: 40px;" type="number"
                step='0.01' 
                name="part_price[{{$part->part->id}}][]" 
                value="{{ $parts->where('part_id', $part->part->id)->first()->price}}">



            {{-- : else --}}
            @else
                
                <input id="inline-{{$part->part->id}}" type="checkbox"
                name="elevator_parts[]" value="{{$part->part->id}}">

                <label for="inline-{{$part->part->id}}">{{ $part->part->name}}</label>
                
               
                {{-- price input --}}
                <input class='form-control d-inline-block text-center' style="width: 120px; height: 40px;" type="number"
                step='0.01' 
                name="part_price[{{$part->part->id}}][]" 
                value="{{$part->part->partPrices->sortByDesc('id')->first->sell_price['sell_price']}}" 
                min="{{$part->part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}">


            @endif
            {{-- end if --}}
            



            

        </div>
        {{-- end single checkbox --}}

      @endforeach
      {{-- end loop --}}

    </div>
    {{-- end checkboxes wrapper --}}



    {{-- confirm / return buttons --}}
    <div class="d-flex align-items-center justify-content-between mt-3 border-top pt-3">

      <button class="btn btn-primary">حفظ التغييرات</button>

      <a href="{{route('maintenance')}}">

        <button class="btn btn-outline-danger">الرجوع <i class="fa fa-angle-double-left ms-2"></i></button>

      </a>


    </div>
    {{-- end confirm / return buttons --}}

  </form>
  {{-- end form --}}

</div>
{{-- end col --}}


@endsection