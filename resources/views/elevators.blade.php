@extends('layouts.app')

@section('title', 'المصاعد')
    
@section('content')
    

{{-- title --}}
<div class="col-6 text-end mb-5">
  <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
    <i class="fa fa-plus me-2 fs-13 "></i>
    إضافة مصعد</button>
</div>



{{-- table --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-primary">
          <tr>
            <th scope="col" style="min-width: 240px;">الأسم</th>

            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>


          </tr>
        </thead>

        {{-- tbody --}}
        <tbody>
          @foreach ($elevators as $elevator)
      
            <tr class='popover-main'>         
    
              <td class='scale--2'><img width="50" height="50" class='of-cover rounded-circle me-2 table--img' src="{{asset('storage/elevators/'.$elevator->image)}}" alt="evlevator image">
                <span class='fw-bold border-bottom fs-13'>{{$elevator->name}}</span>
              </td>
          

              {{-- edit --}}
              <td class='text-center'>
                <button class="btn btn-outline-light btn--table " data-bs-toggle="modal" data-bs-target=".edit-{{$elevator->id}}">تعديل المصعد</button>
              </td>


              {{-- ::extract parts --}}
              @php
                  $allParts = '';
                  foreach ($elevator->elevatorParts  as $part)
                    $allParts .= $part->part->name . '<br />';
              @endphp

              {{-- show parts --}}
              <td class='text-center'>
                  <button class="btn btn--table btn-outline-light " tabindex="0" role="button" data-bs-toggle="tooltip" data-bs-trigger="focus" data-bs-html="true" data-bs-placement="bottom" title="{{$allParts}}">أجزاء المصعد</button>
              </td>

                

              {{-- edit parts --}}
              <td class='text-center'>
                <a href="{{route('editElevatorParts', $elevator->id)}}">
                  <button class="btn btn-primary-light btn--table">تعديل أجزاء المصعد</button>
                </a>
              </td>



            </tr>
            {{-- end table row --}}

          @endforeach
          {{-- end loop --}}
          
        </tbody>
      </table>
    </div>

    @if($elevators instanceof \Illuminate\Pagination\LengthAwarePaginator )

    <div class="m-4">

        {{$elevators->links()}}
     
    </div>
    
    @endif

</div>





{{-- ============================================================== --}}

    

{{-- add elevator modal --}}
<div class="col-12">
  <div class="modal fade new" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة مصعد</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addElevator')}}" method="post" enctype="multipart/form-data">
          @csrf


          {{-- body --}}
          <div class="modal-body">
            <div class="row no-gutters mx-0">

              <div class="col-sm-4 mb-20">
                <label for="name">الأسم</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>

              <div class="col-sm-4 mb-20">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
              </div>



              {{-- hr --}}
              <div class="col-12 mb-3">
                <hr class='mt-0'>
              </div>

              <div class="col-12">
                  <h6 class="text-bold fw-bold form--subheading d-inline-block pb-2 mb-4">إضافة قطع المصعد</h6>
              </div>

                
              <div class="col-12 mb-3">
                  <div class="form-group m-checkbox-inline mb-0">

                    {{-- loop - parts  --}}
                    @foreach ($parts as $part)

                      {{-- single checkbox --}}
                      <div class="checkbox checkbox-dark checkbox--item mb-3">

                        <input id="inline-{{$part->id}}" type="checkbox" name="elevator_parts[]" value="{{$part->id}}">
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
              </div>
              


            </div>
          </div>
          {{-- end body --}}


          {{-- footer --}}
          <div class="modal-footer mx-3">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ</button>
          </div>
          {{-- end footer --}}

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}






{{-- ============================================================ --}}








@foreach ($elevators as $elevator)
    


{{-- edit elevator modal --}}
<div class="col-12">
  <div class="modal fade edit-{{$elevator->id}}" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل مصعد</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updateElevator')}}" method="post" enctype="multipart/form-data">
          @csrf


          <input type="hidden" name="id" value="{{$elevator->id}}" id="">


          {{-- body --}}
          <div class="modal-body">
            <div class="row no-gutters mx-0">

              <div class="col-sm-4 mb-20">
                <label for="name">الأسم</label>
                <input type="text" class="form-control" value="{{$elevator->name}}" name="name" id="name">
              </div>

              <div class="col-sm-4 mb-20">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
              </div>


            </div>

          </div>
          {{-- end body --}}


          {{-- footer --}}
          <div class="modal-footer mx-3">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ</button>
          </div>
          {{-- end footer --}}

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}


@endforeach
{{-- end loop --}}


@endsection
{{-- end content section --}}






{{-- ========================================================= --}}


@section('scripts')

<script>
  $('[data-toggle="tooltip"]').tooltip({
    trigger : 'hover'
  });
</script>
    
@endsection