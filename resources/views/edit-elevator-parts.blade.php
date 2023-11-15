@extends('layouts.app')

@section('title', 'تعديل أجزاء المصعد')
    
@section('content')
    
<div class="col-12">
    <h4>تعديل أجزاء المصعد : {{$elevator->name}}</h4>
</div>
<div class="col-12">

    <form action="{{route('updateElevatorParts')}}" method="post">

        @csrf
        <input type="hidden" name="id" value="{{$elevator->id}}" id="">
    <div class="form-group m-checkbox-inline mb-0">

        {{-- loop - parts  --}}
        @foreach ($parts as $part)

          {{-- single checkbox --}}
          <div class="checkbox checkbox-dark checkbox--item">

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

      <br><br>
      <div class="row">

        <div class="col-6">
            <button class="btn btn-primary">حفظ</button>
        </div>
    
        <div class="col-6">
            <a href="{{route('elevators')}}">
    
            <button class="btn btn-outline-danger">الرجوع الى المصاعد</button>
    
            </a>
        </div>

      </div>

     



    </form>


</div>


@endsection