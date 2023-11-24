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
    

    {{-- elevator id / type (bill / quotation)--}}
    <input type="hidden" name="id" value="{{$id}}" id="">
    <input type="hidden" name="type" value="{{$type}}" id="">

    
    {{-- checkboxes wrapper --}}
    <div class="form-group m-checkbox-inline mb-0">

      {{-- loop - parts  --}}
      @foreach ($elevator->elevatorParts as $part)

        
        <div class="d-flex align-items-center justify-content-start mb-5">

          {{-- single checkbox --}}
          <div class="checkbox checkbox-dark checkbox--item d-inline-block w-auto me-3">

            <input id="inline-{{$part->part->id}}" type="checkbox" name="elevator_parts[]" value="{{$part->part->id}}">
            <label for="inline-{{$part->part->id}}"></label>

          </div>
          {{-- end single checkbox --}}



          {{-- name --}}
          <div class="d-inline-block">
            <label class='d-block fs-11'>الأسم</label>
            <input class='form-control parts--input lg' type="text" name="part_name[{{$part->part->id}}][]" id="" value='{{$part->part->name}}'>
          </div>




          {{-- price --}}
          <div class="d-inline-block">

            <label class='d-block fs-11'>السعر</label>

            <input type="number" class='form-control parts--input'
            name="part_price[{{$part->part->id}}][]" 
            value="{{$part->part->partPrices->sortByDesc('id')->first->sell_price['sell_price']}}" 
            min="{{$part->part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}">
          </div>



          {{-- quantity --}}
          <div class="d-inline-block">
            <label class='d-block fs-11'>الكمية</label>
            <input class='form-control parts--input' type="number" step='1' name="part_quantity[{{$part->part->id}}][]" id="">
          </div>



          {{-- supplier --}}
          @if ($type == 'bill')
              
          <div class="d-inline-block min-w-200px" style="margin-right: 30px;">
            <label class='d-block fs-11'>المورد (إختياري)</label>
            <select name="part_supplier[{{$part->part->id}}][]" class="form-control form--select" data-clear={{true}}>

              <option value=""></option>
              
              @foreach ($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
              @endforeach

            </select>
          </div>

          @endif
          {{-- end if --}}


        </div>
        {{-- end wrapper --}}
          
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