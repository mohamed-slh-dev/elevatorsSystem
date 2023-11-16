@extends('layouts.app')

@section('title', ' الأجزاء')
    
@section('content')
    
{{-- add button --}}
<div class="col-6 mb-5 text-end">
    <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
      <i class="fa fa-plus me-2 fs-13 "></i>
      إضافة جزء</button>
</div>



{{-- table of parts --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-primary">
          <tr>
            <th scope="col" class='min-w-200px'>الأسم</th>
            <th scope="col">النوع</th>
            <th scope="col" class='min-w-130px'>الوصف</th>
            <th scope="col" class='min-w-110px'>سعر الشراء</th>
            <th scope="col" class='min-w-110px'>سعر البيع</th>
            <th scope="col" class='min-w-110px'></th>
          </tr>
        </thead>
        <tbody>
          

        {{-- parts - loop --}}
        @foreach ($parts as $part)
          <tr>         

            <td class='scale--2'><img width="50" height="50" class='of-cover rounded-circle me-3 table--img' src="{{asset('storage/parts/'.$part->image)}}" alt="part image"><span class='fw-bold border-bottom'>{{$part->name}}</span></td>

            <td>{{$part->type}}</td>
            <td>{{$part->desc}}</td>

            <td>{{$part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}</td>
            <td>{{$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price']}}</td>

            <td>
              <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".new-price-{{$part->id}}">تغيير السعر</button>
            </td>

          </tr>
        @endforeach
        {{-- end loop --}}
          
        </tbody>
      </table>
    </div>
</div>
{{-- end table --}}




{{-- ============================================================== --}}



{{-- new part modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة جزء</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addPart')}}" method="post" enctype="multipart/form-data">
          @csrf

          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-20">
                  <label for="name">الأسم </label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="image">الصورة</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                </div>


                {{-- empty --}}
                <div class="col-12"></div>


                <div class="col-sm-4 mb-20">
                  <label for="type">النوع</label>
                  <select name="type" class="form-control form--select" id="type">

                      <option value=""></option>
                      <option value="كهربائي">كهربائي</option>
                      <option value="ميكانيكي">ميكانيكي</option>
                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="purchase_price">سعر الشراء</label>
                  <input type="number" class="form-control" min="0" step=".1" name="purchase_price" id="purchase_price">
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="sell_price">سعر البيع</label>
                  <input type="number" class="form-control" min="0" step=".1" name="sell_price" id="sell_price">
                </div>


                <div class="col-sm-12 mb-20">
                  <label for="desc">الوصف</label>
                  <input type="text" class="form-control" name="desc" id="desc">
                </div>


              </div>
          </div>
          {{-- end body --}}

          {{-- footer --}}
          <div class="modal-footer">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ</button>
          </div>

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}



{{-- ============================================================== --}}





{{-- edit pricing for each part --}}
@foreach ($parts as $part)

<div class="col-12">

  <div class="modal fade new-price-{{$part->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تغيير السعر</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addPartPrice')}}" method="post" >
          @csrf


          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
                
                <input type="hidden" name="id" value="{{$part->id}}" id="">

           
                <div class="col-sm-4 mb-20">
                  <label for="purchase_price">سعر الشراء</label>
                  <input type="number" class="form-control" min="0" step=".1" name="purchase_price" id="purchase_price" value={{ $part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price'] }}>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="sell_price">سعر البيع</label>
                  <input type="number" class="form-control" min="0" step=".1" name="sell_price" id="sell_price" value={{$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price']}}>
                </div>


              </div>
          </div>
          {{-- end body --}}

        

          {{-- footer --}}
          <div class="modal-footer">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ</button>
          </div>

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}
    
@endforeach
{{-- end parts - loop --}}


@endsection