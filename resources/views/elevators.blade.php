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
            <th scope="col" class='min-w-130px'>الأسم</th>
            <th scope="col">الشركة</th>
            <th scope="col">المنشأ</th>
            <th scope="col">المورد</th>
            <th scope="col" class='min-w-130px'>هاتف المورد</th>
            <th scope="col">عنوان بريد المورد</th>
            <th scope="col" class='min-w-130px'>العنوان</th>

            <th scope="col">البنك</th>
            <th scope="col">الحساب</th>
            <th scope="col">IBAN</th>

            <th scope="col" class='min-w-140px'></th>

            <th scope="col">تعديل</th>
            <th scope="col">تعديل أجزاء المصعد</th>


          </tr>
        </thead>

        {{-- tbody --}}
        <tbody>
          @foreach ($elevators as $elevator)
      
            <tr>         
    
              <td class='scale--2'><img width="50" height="50" class='of-cover rounded-circle me-3 table--img' src="{{asset('storage/elevators/'.$elevator->image)}}" alt="evlevator image">{{$elevator->name}}</td>
          
              <td>{{$elevator->company}}</td>
              <td>{{$elevator->nationality->name}}</td>
              <td>{{$elevator->supplier_name}}</td>
              <td dir='ltr'>{{$elevator->supplier_phone}}</td>
              <td>{{$elevator->supplier_email}}</td>

              <td>{{$elevator->region->name_ar}} / {{$elevator->province->name_ar}}, {{$elevator->city->name_ar}}, {{$elevator->neighbor->name_ar}}</td>
          
              
              <td>{{$elevator->bank->name}}</td>
              <td>{{$elevator->bank_account}}</td>
              <td>{{$elevator->iban}}</td>


              {{-- parts --}}
              <td>
                @foreach ($elevator->elevatorParts  as $part)
                  ( {{$part->part->name}} )
                @endforeach
                {{-- TODO: POPOVER --}}
                {{-- <button class="btn btn--table btn-primary-light">أجزاء المصعد</button> --}}
              </td>

              <td>
                 <button class="btn btn-outline-warning d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".edit-{{$elevator->id}}">تعديل</button>
              </td>


              <td>
                <a href="{{route('editElevatorParts', $elevator->id)}}">

                  <button class="btn btn-outline-warning d-inline-flex align-items-center scaleRotate--1">تعديل أجزاء المصعد</button>

                </a>
               
             </td>

            </tr>
            
          @endforeach
          {{-- end loop --}}
          
        </tbody>
      </table>
    </div>
</div>





{{-- ============================================================== --}}

    

{{-- add elevator modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
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

              <div class="col-sm-4 mb-4">
                <label for="name">الأسم</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>

              <div class="col-sm-4 mb-4">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
              </div>


              {{-- empty --}}
              <div class="col-12"></div>


              <div class="col-sm-4 mb-4">
                <label for="company">الشركة</label>
                <input type="text" class="form-control" name="company" id="company">
              </div>


              <div class="col-sm-4 mb-4">
                <label for="nationality">بلد المنشأ</label>
                <select name="nationality" required class="form-control form--select" id="nationality">

                  <option value=""></option>

                  @foreach ($nationalities as $nation)
                    <option value="{{$nation->id}}">{{$nation->name}}</option>
                  @endforeach
                  
                </select>
              </div>



              {{-- empty --}}
              <div class="col-12"></div>


              <div class="col-sm-4 mb-4">
                <label for="supplier_name">اسم المورد</label>
                <input type="text" class="form-control" name="supplier_name" id="supplier_name">
              </div>

              <div class="col-sm-4 mb-4">
                <label for="supplier_phone">هاتف المورد</label>
                <input type="text" class="form-control text-start" name="supplier_phone" id="supplier_phone" dir="ltr">
              </div>

              <div class="col-sm-4 mb-4">
                <label for="supplier_email">البريد الالكتروني للمورد</label>
                <input type="email" class="form-control" name="supplier_email" id="supplier_email">
              </div>



              {{-- hr --}}
              <div class="col-12 mb-4 mt-2">
                <hr>
              </div>


              <div class="col-sm-4 mb-4">
                <label for="region">المقاطعة</label>
                <select name="region" required class="form-control form--select" id="region">

                  <option value=""></option>

                  @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->name_ar}}</option>
                  @endforeach

                </select>
              </div>



              <div class="col-sm-4 mb-4">
                <label for="province">المحافظة</label>
                <select name="province" required class="form-control form--select" id="province">

                  <option value=""></option>

                  @foreach ($provinces as $province)
                    <option value="{{$province->id}}">{{$province->name_ar}}</option>
                  @endforeach

                </select>
              </div>



              <div class="col-sm-4 mb-4">
                <label for="city">المدينة</label>
                <select name="city" required class="form-control form--select" id="city">

                  <option value=""></option>
                  
                  @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name_ar}}</option>
                  @endforeach

                </select>
              </div>


              <div class="col-sm-4 mb-4">
                <label for="neighbor">الحي</label>
                <select name="neighbor" required class="form-control form--select" id="neighbor">

                  <option value=""></option>

                  @foreach ($neighbors as $neighbor)
                    <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>
                  @endforeach

                </select>
              </div>



              <div class="col-sm-4 mb-4">
                <label for="bank">البنك</label>
                <select name="bank" required class="form-control form--select" id="bank">

                  <option value=""></option>

                  @foreach ($banks as $bank)
                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-sm-4 mb-4">
                <label for="bank_account">رقم الحساب</label>
                <input type="text" class="form-control" name="bank_account" id="bank_account">
              </div>


              <div class="col-sm-4 mb-4">
                <label for="iban">IBAN</label>
                <input type="text" class="form-control" name="iban" id="iban">
              </div>


            </div>


            {{-- hr --}}
            <div class="col-12 mb-4">
              <hr>
            </div>

            <div class="col-12">
                <h4 class="text-bold fw-bold form--subheading d-inline-block pb-2 mb-4">إضافة قطع المصعد</h4>
            </div>

              
            <div class="col-12 mb-3">
                <div class="form-group m-checkbox-inline mb-0">

                  {{-- loop - parts  --}}
                  @foreach ($parts as $part)

                    {{-- single checkbox --}}
                    <div class="checkbox checkbox-dark checkbox--item">

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

@foreach ($elevators as $elevator)
    


{{-- edit elevator modal --}}
<div class="col-12">
  <div class="modal fade edit-{{$elevator->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
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

              <div class="col-sm-4 mb-4">
                <label for="name">الأسم</label>
                <input type="text" class="form-control" value="{{$elevator->name}}" name="name" id="name">
              </div>

              <div class="col-sm-4 mb-4">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
              </div>


              {{-- empty --}}
              <div class="col-12"></div>


              <div class="col-sm-4 mb-4">
                <label for="company">الشركة</label>
                <input type="text" class="form-control" value="{{$elevator->company}}" name="company" id="company">
              </div>


              <div class="col-sm-4 mb-4">
                <label for="nationality">بلد المنشأ</label>
                <select name="nationality" class="form-control form--select" id="nationality">

                  <option value="{{$elevator->nationality_id}}">{{$elevator->nationality->name}}</option>

                  @foreach ($nationalities as $nation)
                    <option value="{{$nation->id}}">{{$nation->name}}</option>
                  @endforeach
                  
                </select>
              </div>



              {{-- empty --}}
              <div class="col-12"></div>


              <div class="col-sm-4 mb-4">
                <label for="supplier_name">اسم المورد</label>
                <input type="text" class="form-control" value="{{$elevator->supplier_name}}" name="supplier_name" id="supplier_name">
              </div>

              <div class="col-sm-4 mb-4">
                <label for="supplier_phone">هاتف المورد</label>
                <input type="text" class="form-control text-start" value="{{$elevator->supplier_phone}}" name="supplier_phone" id="supplier_phone" dir="ltr">
              </div>

              <div class="col-sm-4 mb-4">
                <label for="supplier_email">البريد الالكتروني للمورد</label>
                <input type="email" class="form-control" value="{{$elevator->supplier_email}}" name="supplier_email" id="supplier_email">
              </div>



              {{-- hr --}}
              <div class="col-12 mb-4 mt-2">
                <hr>
              </div>


              <div class="col-sm-4 mb-4">
                <label for="region">المقاطعة</label>
                <select name="region" class="form-control form--select" id="region">

                  <option value="{{$elevator->region_id}}">{{$elevator->region->name_ar}}</option>

                  @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->name_ar}}</option>
                  @endforeach

                </select>
              </div>



              <div class="col-sm-4 mb-4">
                <label for="province">المحافظة</label>
                <select name="province" class="form-control form--select" id="province">

                  <option value="{{$elevator->province_id}}">{{$elevator->province->name_ar}}</option>

                  @foreach ($provinces as $province)
                    <option value="{{$province->id}}">{{$province->name_ar}}</option>
                  @endforeach

                </select>
              </div>



              <div class="col-sm-4 mb-4">
                <label for="city">المدينة</label>
                <select name="city" class="form-control form--select" id="city">

                  <option value="{{$elevator->city_id}}">{{$elevator->city->name_ar}}</option>
                  
                  @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name_ar}}</option>
                  @endforeach

                </select>
              </div>


              <div class="col-sm-4 mb-4">
                <label for="neighbor">الحي</label>
                <select name="neighbor" class="form-control form--select" id="neighbor">

                  <option value="{{$elevator->neighbor_id}}">{{$elevator->neighbor->name_ar}}</option>

                  @foreach ($neighbors as $neighbor)
                    <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>
                  @endforeach

                </select>
              </div>



              <div class="col-sm-4 mb-4">
                <label for="bank">البنك</label>
                <select name="bank" class="form-control form--select" id="bank">

                  <option value="{{$elevator->bank_id}}">{{$elevator->bank->name}}</option>

                  @foreach ($banks as $bank)
                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-sm-4 mb-4">
                <label for="bank_account">رقم الحساب</label>
                <input type="text" class="form-control" value="{{$elevator->bank_account}}" name="bank_account" id="bank_account">
              </div>


              <div class="col-sm-4 mb-4">
                <label for="iban">IBAN</label>
                <input type="text" class="form-control" value="{{$elevator->iban}}" name="iban" id="iban">
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



@endsection