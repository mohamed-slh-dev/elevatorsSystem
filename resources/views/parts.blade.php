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
            <th scope="col" class='min-w-130px'>الإستخدام</th>
            <th scope="col">المخزون</th>
            <th scope="col">سعر الشراء</th>
            <th scope="col">سعر البيع</th>

            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          

        {{-- parts - loop --}}
        @foreach ($parts as $part)
          <tr>         

            <td class='scale--2'><img width="50" height="50" class='of-cover rounded-circle me-3 table--img' src="{{asset('storage/parts/'.$part->image)}}" alt="image"><span class='fw-bold border-bottom'>{{$part->name}}</span></td>


            <td>{{$part->type}}</td>
            <td>{{$part->usage}}</td>
            <td>{{$part->quantity}}</td>

            <td>{{$part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}</td>
            <td>{{$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price']}}</td>

            <td>

              <button class="btn btn-outline-light btn--table d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".edit-{{$part->id}}">تعديل</button>


            </td>

            <td>

              <button class="btn btn-outline-light btn--table d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".price-history-{{$part->id}}">عرض الأسعار السابقة</button>


            </td>

            <td>
              <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".new-price-{{$part->id}}">تغيير السعر</button>
            </td>

          </tr>
        @endforeach
        {{-- end loop --}}
          
        </tbody>
      </table>
    </div>

    
    @if($parts instanceof \Illuminate\Pagination\LengthAwarePaginator )

    <div class="m-4">

        {{$parts->links()}}
     
    </div>
    
    @endif
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
                  <input type="text" class="form-control" required name="name" id="name">
                </div>


                <div class="col-sm-8 mb-20">
                  <label for="desc">الوصف</label>
                  <input type="text" class="form-control" name="desc" id="desc">
                </div>



                {{-- empty --}}
                <div class="col-12"></div>


                <div class="col-sm-4 mb-20">
                  <label for="type">النوع</label>
                  <select name="type" class="form-control form--select" id="type" required>

                      <option value=""></option>
                      <option value="كهربائي">كهربائي</option>
                      <option value="ميكانيكي">ميكانيكي</option>
                  </select>
                </div>

                
                <div class="col-sm-4 mb-20">
                  <label for="purchase_price">سعر الشراء</label>
                  <input type="number" class="form-control" required min="0" step="0.01" name="purchase_price" id="purchase_price">
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="sell_price">سعر البيع</label>
                  <input type="number" class="form-control" required min="0" step="0.01" name="sell_price" id="sell_price">
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="nationality">بلد المنشأ</label>
                  <select name="nationality" class="form-control form--select" id="nationality" required>

                      <option value=""></option>

                      @foreach ($nationalities as $nation)
                          <option value="{{$nation->id}}">{{$nation->name}}</option>
                      @endforeach

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="usage">الإستخدام</label>
                  <select name="usage" class="form-control form--select" id="usage" required>

                      <option value=""></option>

                      @foreach ($usages as $usage)
                          <option value="{{$usage}}">{{$usage}}</option>
                      @endforeach

                  </select>
                </div>




                <div class="col-sm-4 mb-20">
                  <label for="quantity">الكمية</label>
                  <input type="number" class="form-control" required min="0" step="0.01" name="quantity" id="quantity">
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



@foreach ($parts as $part)
    
{{-- edit part modal --}}
<div class="col-12">
  <div class="modal fade edit-{{$part->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل جزء</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updatePart')}}" method="post" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="id" value="{{$part->id}}" id="">
          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-20">
                  <label for="name">الأسم </label>
                  <input type="text" class="form-control" value="{{$part->name}}" required name="name" id="name">
                </div>

              
                <div class="col-sm-8 mb-20">
                  <label for="desc">الوصف</label>
                  <input type="text" value="{{$part->desc}}" class="form-control" name="desc" id="desc">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="type">النوع</label>
                  <select name="type" class="form-control form--select" id="type" required value='{{$part->type}}'>
                      <option value="كهربائي">كهربائي</option>
                      <option value="ميكانيكي">ميكانيكي</option>
                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="nationality">بلد المنشأ</label>
                  <select name="nationality" class="form-control form--select" id="nationality" required value='{{$part->nationality_id}}'>

                      <option value=""></option>

                      @foreach ($nationalities as $nation)
                          <option value="{{$nation->id}}">{{$nation->name}}</option>
                      @endforeach

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="usage">الإستخدام</label>
                  <select name="usage" class="form-control form--select" id="usage" required value='{{$part->usage}}'>

                      <option value=""></option>

                      @foreach ($usages as $usage)
                          <option value="{{$usage}}">{{$usage}}</option>
                      @endforeach

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="quantity">الكمية</label>
                  <input type="number" class="form-control" required min="0" step="0.01" name="quantity" id="quantity" value='{{$part->quantity}}'>
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
                  <input type="number" class="form-control" min="0" step="0.01" name="purchase_price" id="purchase_price" value={{ $part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price'] }}>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="sell_price">سعر البيع</label>
                  <input type="number" class="form-control" min="0" step="0.01" name="sell_price" id="sell_price" value={{$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price']}}>
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






{{-- ============================================================== --}}






@foreach ($parts as $part)
    

{{-- edit part modal --}}
<div class="col-12">
  <div class="modal fade price-history-{{$part->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">أسعار الجزء</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          <div class="modal-body">
              <div class="row no-gutters mx-0 mb-3">


               <div class="col-sm-12 col-lg-12 col-xl-12 px-0">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="bg-primary">
                        <tr>
                        
                          <th scope="col" class='min-w-130px'>سعر البيع</th>
                          <th scope="col" class='min-w-110px'>سعر الشراء</th>
                          <th scope="col" class='min-w-110px'> تاريخ الإنشاء</th>

                        </tr>
                      </thead>
                      <tbody>
                        

                      {{-- parts - loop --}}
                      @foreach ($part->partPrices->sortByDesc('id') as $price)
                        <tr>         

                          <td>{{$price->purchase_price}}</td>
                          <td>{{$price->sell_price}}</td>
                          <td dir="ltr" class='text-start'>{{ date('d / m / Y', strtotime($price->created_at))}}</td>
                          

                        </tr>
                      @endforeach
                      {{-- end loop --}}
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                {{-- end table --}}


              </div>
          </div>
          {{-- end body --}}


      </div>
    </div>
  </div>
</div>
{{-- end modal --}}

@endforeach



@endsection