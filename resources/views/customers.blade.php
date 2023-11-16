@extends('layouts.app')

@section('title', 'العملاء')
    
@section('content')



{{-- title --}}
<div class="col-6 mb-5 text-end">
  <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
    <i class="fa fa-plus me-2 fs-13 "></i>
    إضافة عميل</button>
</div>



{{-- column --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-primary">
        <tr>
          <th scope="col" class='min-w-200px'>أسم العميل</th>
          <th scope="col" class='min-w-130px'>البريد الإلكتروني</th>
          <th scope="col" class="min-w-110px">الهاتف</th>
          <th scope="col" class='min-w-120px'>الهوية</th>

          {{-- <th scope="col" class='min-w-90px'>تاريخ الميلاد</th> --}}
          {{-- <th scope="col">الجنسية</th> --}}

          <th scope="col" class="min-w-130px">العنوان</th>

          <th scope="col">البنك</th>
          <th scope="col">الحساب</th>
          <th scope="col">IBAN</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        
      @foreach ($customers as $customer)
          
      <tr>
        <td class='scale--2'><img width="50" height="50" class='of-cover rounded-circle table--img me-2' src="{{asset('storage/customers/'.$customer->image)}}" alt="part image"><span class='fw-bold border-bottom fs-13'>{{$customer->first_name. ' '. $customer->last_name}}</span></td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phone}}</td>

        <td>{{$customer->identity_type}}<br>/ {{$customer->identity_number}}</td>

        {{-- <td class='fw-bold'>{{$customer->birthdate}}</td> --}}
        {{-- <td class='fw-bold'>{{$customer->nationality->name}}</td> --}}

        <td>{{$customer->region->name_ar}} / {{$customer->province->name_ar}}, {{$customer->city->name_ar}}, {{$customer->neighbor->name_ar}}</td>
        <td>{{$customer->bank->name}}</td>
        <td>{{$customer->bank_account}}</td>
        <td>{{$customer->iban}}</td>

        <td>
            <button class="btn btn-primary-light btn--table" data-bs-toggle="modal" data-bs-target=".edit-{{$customer->id}}">تعديل</button>
        </td>
      </tr>

      @endforeach
      {{-- end foreach --}}
        
      </tbody>
    </table>
  </div>
</div>
{{-- end column --}}




{{-- =========================================================== --}}


{{-- modal --}}
<div class="col-12">
<div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة عميل</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addCustomer')}}" method="post" enctype="multipart/form-data">

          {{-- modal body --}}
          <div class="modal-body">
              @csrf

              <div class="row no-gutters mx-0">


              
                <div class="col-sm-4 mb-20">
                  <label for="first_name"> الأسم الأول</label>
                  <input type="text" id="first_name" required name="first_name" class="form-control" >
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="last_name"> الأسم الأخير</label>
                  <input type="text" id="last_name" required name="last_name" class="form-control" >
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="email"> البريد الإلكتروني</label>
                  <input type="email" id="email"  name="email" class="form-control" >
                </div>

                <div class="col-sm-4 mb-20">
                    <label for="type">نوع العميل</label>
                    <select name="type" class="form-control form--select" id="type">
  
                      <option value="عميل جديد">عميل جديد</option>
                      <option value="عميل محتمل">عميل محتمل</option>
                      <option value="عميل">عميل</option>
  
                    </select>
                  </div>

         


                <div class="col-sm-4 mb-20">
                  <label for="identity_type">نوع الهوية</label>
                  <select name="identity_type" class="form-control form--select" id="identity_type">

                    <option value=""></option>
                    <option value="إقامة">إقامة</option>
                    <option value="هوية وطنية">هوية وطنية</option>
                    <option value="هوية خليجية">هوية خليجية</option>
                    <option value="جواز سفر">جواز سفر</option>

                  </select>
                </div>

                
                <div class="col-sm-4 mb-20">
                  <label for="identity_number">رقم الهوية</label>
                  <input type="text" id="identity_number" required name="identity_number" class="form-control" >
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="nationality">الجنسية</label>
                  <select name="nationality" required class="form-control form--select" id="nationality">
                    
                    <option value=""></option>

                    @foreach ($nationalities as $nation)
                        <option value="{{$nation->id}}">{{$nation->name}}</option>
                    @endforeach

                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="image">الصورة</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                </div>



                {{-- hr --}}
                <div class="col-12 mb-4 mt-2">
                  <hr>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="phone"> رقم الهاتف </label>
                  <input type="text" id="phone" required name="phone" class="form-control text-start" dir='ltr' >
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="region">المقاطعة</label>
                  <select name="region" required class="form--select col-sm-12" id="region">
                    <option value=""></option>

                    @foreach ($regions as $region)
                      <option value="{{$region->id}}">{{$region->name_ar}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="province">المحافظة</label>
                  <select name="province" required class="form-control form--select" id="province">
                    
                    <option value=""></option>

                    @foreach ($provinces as $province)
                      <option value="{{$province->id}}">{{$province->name_ar}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="city">المدينة</label>
                  <select name="city" required class="form-control form--select" id="city">

                      <option value=""></option>

                      @foreach ($cities as $city)
                        <option value="{{$city->id}}">{{$city->name_ar}}</option>
                      @endforeach

                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="neighbor">الحي</label>
                  <select name="neighbor" required class="form-control form--select" id="neighbor">

                    <option value=""></option>

                    @foreach ($neighbors as $neighbor)
                      <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="bank">البنك</label>
                  <select name="bank" required class="form-control form--select form--select" id="bank">

                    <option value=""></option>

                    @foreach ($banks as $bank)
                      <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="bank_account">رقم الحساب</label>
                  <input type="text" class="form-control" name="bank_account" id="bank_account">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="iban">IBAN</label>
                  <input type="text" class="form-control" name="iban" id="iban">
                </div>

              </div>
          </div>
          {{-- end body --}}


          {{-- footer --}}
          <div class="modal-footer">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ </button>
          </div>
          {{-- end footer --}}

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}


@foreach ($customers as $customer)

{{-- modal --}}
<div class="col-12">
  <div class="modal fade edit-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
  
          {{-- header --}}
          <div class="modal-header mb-3">
            <h4 class="modal-title fw-bold" id="new">تعديل عميل</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
  
          {{-- form --}}
          <form action="{{route('updateCustomer')}}" method="post" enctype="multipart/form-data">
  
            <input type="hidden" name="id" value="{{$customer->id}}" id="">

            {{-- modal body --}}
            <div class="modal-body">
                @csrf
  
                <div class="row no-gutters mx-0">
  
  
                
                  <div class="col-sm-4 mb-20">
                    <label for="first_name"> الأسم الأول</label>
                    <input type="text" id="first_name" required name="first_name" value="{{$customer->first_name}}" class="form-control" >
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="last_name"> الأسم الأخير</label>
                    <input type="text" id="last_name" value="{{$customer->last_name}}" required name="last_name" class="form-control" >
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="email"> البريد الإلكتروني</label>
                    <input type="email" id="email" value="{{$customer->email}}" name="email" class="form-control" >
                  </div>
  
                  <div class="col-sm-4 mb-20">
                      <label for="type">نوع العميل</label>
                      <select name="type" class="form-control form--select" id="type">
    
                        <option value="{{$customer->type}}">{{$customer->type}}</option>

                        <option value="عميل جديد">عميل جديد</option>
                        <option value="عميل محتمل">عميل محتمل</option>
                        <option value="عميل">عميل</option>
    
                      </select>
                    </div>
  
         
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="identity_type">نوع الهوية</label>
                    <select name="identity_type" class="form-control form--select" id="identity_type">
  
                      <option value="{{$customer->identity_type}}">{{$customer->identity_type}}</option>

                      <option value="إقامة">إقامة</option>
                      <option value="هوية وطنية">هوية وطنية</option>
                      <option value="هوية خليجية">هوية خليجية</option>
                      <option value="جواز سفر">جواز سفر</option>
  
                    </select>
                  </div>
  
                  
                  <div class="col-sm-4 mb-20">
                    <label for="identity_number">رقم الهوية</label>
                    <input type="text" id="identity_number" value="{{$customer->identity_number}}" required name="identity_number" class="form-control" >
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="nationality">الجنسية</label>
                    <select name="nationality" class="form-control form--select" id="nationality">
                      
                      <option value="{{$customer->nationality_id}}">{{$customer->nationality->name}}</option>
  
                      @foreach ($nationalities as $nation)
                          <option value="{{$nation->id}}">{{$nation->name}}</option>
                      @endforeach
  
                    </select>
                  </div>
                  

                  <div class="col-sm-4 mb-20">
                    <label for="image">الصورة</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*" >
                  </div>




                  {{-- hr --}}
                  <div class="col-12 mb-4 mt-2">
                    <hr>
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="phone"> رقم الهاتف </label>
                    <input type="text" id="phone" required value="{{$customer->phone}}" name="phone" class="form-control text-start" dir='ltr' >
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="region">المقاطعة</label>
                    <select name="region" class="form--select col-sm-12" id="region">
                      <option value="{{$customer->region_id}}">{{$customer->region->name_ar}}</option>
  
                      @foreach ($regions as $region)
                        <option value="{{$region->id}}">{{$region->name_ar}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="province">المحافظة</label>
                    <select name="province" class="form-control form--select" id="province">
                      
                      <option value="{{$customer->province_id}}">{{$customer->province->name_ar}}</option>
  
                      @foreach ($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name_ar}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="city">المدينة</label>
                    <select name="city" class="form-control form--select" id="city">
  
                      <option value="{{$customer->city_id}}">{{$customer->city->name_ar}}</option>
  
                        @foreach ($cities as $city)
                          <option value="{{$city->id}}">{{$city->name_ar}}</option>
                        @endforeach
  
                    </select>
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="neighbor">الحي</label>
                    <select name="neighbor" class="form-control form--select" id="neighbor">
  
                      <option value="{{$customer->neighbor_id}}">{{$customer->neighbor->name_ar}}</option>
  
                      @foreach ($neighbors as $neighbor)
                        <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="bank">البنك</label>
                    <select name="bank" class="form-control form--select form--select" id="bank">
  
                      <option value="{{$customer->bank_id}}">{{$customer->bank->name}}</option>
  
                      @foreach ($banks as $bank)
                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="bank_account">رقم الحساب</label>
                    <input type="text" class="form-control" value="{{$customer->bank_account}}" name="bank_account" id="bank_account">
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="iban">IBAN</label>
                    <input type="text" class="form-control" value="{{$customer->iban}}" name="iban" id="iban">
                  </div>
  
                </div>
            </div>
            {{-- end body --}}
  
  
            {{-- footer --}}
            <div class="modal-footer">
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