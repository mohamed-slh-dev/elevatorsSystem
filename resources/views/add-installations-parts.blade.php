@extends('layouts.app')

@section('title', 'إضافة أجزاء المصعد')
    
@section('content')
   
<div class="col-3"></div>
<div class="col-3 mb-5">
    <input class='form-control text-center fw-bold' type="text" readonly value='{{$elevator->name}}' style="pointer-events: none">
</div>



<div class="col-12">

  <form action="{{route('addInstallationParts')}}" method="post">

    @csrf
    
    <input type="hidden" name="id" value="{{$id}}" id="">
    
    <input type="hidden" name="type" value="{{$type}}" id="">
    
    {{-- checkboxes wrapper --}}
    <div class="form-group m-checkbox-inline mb-0">

      {{-- loop - parts  --}}
      @foreach ($elevator->elevatorParts as $part)

        
        {{-- single checkbox --}}
        <div class="checkbox checkbox-dark checkbox--item mb-3" style="width: 33%">

            <input id="inline-{{$part->id}}" type="checkbox" name="elevator_parts[]" value="{{$part->part->id}}">

          <label for="inline-{{$part->part->id}}">{{ $part->part->name}}</label>

          <input type="number" name="part_price[{{$part->id}}][]" value="{{$part->part->partPrices->sortByDesc('id')->first->sell_price['sell_price']}}" min="{{$part->part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}" id="">

        </div>
        {{-- end single checkbox --}}

      @endforeach
      {{-- end loop --}}

    </div>
    {{-- end checkboxes wrapper --}}



    {{-- confirm / return buttons --}}
    <div class="d-flex align-items-center justify-content-between mt-3 border-top pt-3">

      <button class="btn btn-primary">حفظ التغييرات</button>

    </div>
    {{-- end confirm / return buttons --}}

  </form>
  {{-- end form --}}

</div>
{{-- end col --}}


@endsection