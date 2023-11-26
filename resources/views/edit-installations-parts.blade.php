@extends('layouts.app')

@section('title', 'تعديل أجزاء المصعد')
    
@section('content')
   

{{-- 
  ! add finance to the supplier page
  --}}


<div class="col-3"></div>
<div class="col-3 mb-5">
    <input class='form-control text-center fw-bold' type="text" readonly value='{{$installation->elevator_type}}' style="pointer-events: none">
</div>



<div class="col-12">

  <form action="{{route('updateInstallationParts', [$installation->id, $type])}}" method="post">
    @method('POST')
    @csrf


    {{-- checkboxes wrapper --}}
    <div class="form-group m-checkbox-inline mb-0">

      {{-- loop - parts  --}}
      @foreach ($partsOG as $part)


        <div class="d-flex align-items-center justify-content-start mb-5">

          
          

          {{-- : checkbox input / rewrite price if -> part already exists --}}
          @if (in_array($part->id, $partsArray))
              

            {{-- single checkbox --}}
            <div class="checkbox checkbox-dark checkbox--item d-inline-block w-auto me-3">

              <input id="inline-{{$part->id}}" type="checkbox"
              name="elevator_parts[]" value="{{$part->id}}" checked>

              <label for="inline-{{$part->id}}"></label>
            
            </div>
            {{-- end single checkbox --}}




            {{-- name --}}
            <div class="d-inline-block">
              <label class='d-block fs-11'>الأسم</label>
              <input class='form-control parts--input lg' type="text" name="part_name[{{$part->id}}][]" id="" value='{{$parts->where('part_id', $part->id)->first()->name}}'>
            </div>




            {{-- price --}}
            <div class="d-inline-block">

              <label class='d-block fs-11'>السعر</label>

              <input type="number" class='form-control parts--input'
              name="part_price[{{$part->id}}][]" 
              value="{{$parts->where('part_id', $part->id)->first()->price}}" min="{{$part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}">
            </div>




            {{-- quantity / bill --}}
            @if ($type == 'bill')

              <div class="d-inline-block">
                <label class='d-block fs-11'>الكمية</label>
                <input class='form-control parts--input' type="number" step='1' min='0' 
                max='{{ ($part->quantity + ($parts->where('part_id', $part->id)->first()->quantity * $installation->elevator_count)) / $installation->elevator_count  }}' 
                name="part_quantity[{{$part->id}}][]" 
                value='{{$parts->where('part_id', $part->id)->first()->quantity}}' {{ ($part->quantity == 0 && $parts->where('part_id', $part->id)->first()->quantity == 0 ) ? 'readonly' : ''}}>
              </div>


            {{-- quantity / quotation --}}
            @else


              <div class="d-inline-block">
                <label class='d-block fs-11'>الكمية</label>
                <input class='form-control parts--input' type="number" step='1' min='0' 
                max='{{ $part->quantity / $installation->elevator_count}}' 
                name="part_quantity[{{$part->id}}][]" 
                value='{{$parts->where('part_id', $part->id)->first()->quantity}}' {{ ($part->quantity == 0 && $parts->where('part_id', $part->id)->first()->quantity == 0 ) ? 'readonly' : ''}}>
              </div>


            @endif
            {{-- end if --}}


            






            {{-- supplier --}}
            @if ($type == 'bill')
                
            <div class="d-inline-block min-w-200px" style="margin-right: 30px;">
              <label class='d-block fs-11'>المورد (إختياري)</label>
              <select name="part_supplier[{{$part->id}}][]" class="form-control form--select" value='{{$parts->where('part_id', $part->id)->first()->supplier_id}}' data-clear={{true}}>

                <option value=""></option>
                
                @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach

              </select>
            </div>

            @endif
            {{-- end if --}}





          {{-- ------------------------------------------- --}}



          {{-- : else --}}
          @else
              
            



            {{-- single checkbox --}}
            <div class="checkbox checkbox-dark checkbox--item d-inline-block w-auto me-3">

              <input id="inline-{{$part->id}}" type="checkbox" name="elevator_parts[]" value="{{$part->id}}">
              <label for="inline-{{$part->id}}"></label>

            </div>
            {{-- end single checkbox --}}



            {{-- name --}}
            <div class="d-inline-block">
              <label class='d-block fs-11'>الأسم</label>
              <input class='form-control parts--input lg' type="text" name="part_name[{{$part->id}}][]" id="" value='{{$part->name}}'>
            </div>




            {{-- price --}}
            <div class="d-inline-block">

              <label class='d-block fs-11'>السعر</label>

              <input type="number" class='form-control parts--input'
              name="part_price[{{$part->id}}][]" 
              value="{{$part->partPrices->sortByDesc('id')->first->sell_price['sell_price']}}" 
              min="{{$part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}">
            </div>



            {{-- quantity --}}
            <div class="d-inline-block">
              <label class='d-block fs-11'>الكمية</label>
              <input class='form-control parts--input' type="number" step='1' min='0' max='{{$part->quantity / $installation->elevator_count}}' name="part_quantity[{{$part->id}}][]" id="" {{ ($part->quantity > 0) ? '' : 'readonly'}}>
            </div>



            {{-- supplier --}}
            @if ($type == 'bill')
                
            <div class="d-inline-block min-w-200px" style="margin-right: 30px;">
              <label class='d-block fs-11'>المورد (إختياري)</label>
              <select name="part_supplier[{{$part->id}}][]" class="form-control form--select" data-clear={{true}}>

                <option value=""></option>
                
                @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach

              </select>
            </div>

            @endif
            {{-- end if --}}



              
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

      @if ($type == 'bill')
          
      <a href="{{route('installationsBills')}}">

        <button class="btn btn-outline-danger">الرجوع <i class="fa fa-angle-double-left ms-2"></i></button>

      </a>

      @else
          
      <a href="{{route('installationsQuotations')}}">

        <button class="btn btn-outline-danger">الرجوع <i class="fa fa-angle-double-left ms-2"></i></button>

      </a>

      @endif
   


    </div>
    {{-- end confirm / return buttons --}}

  </form>
  {{-- end form --}}

</div>
{{-- end col --}}


@endsection