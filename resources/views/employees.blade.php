@extends('layouts.app')

@section('title', 'الموظفين')
    
@section('content')



{{-- title --}}
<div class="col-6 mb-5 text-end">
  <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
    <i class="fa fa-plus me-2 fs-13 "></i>
    إضافة موظف</button>
</div>



{{-- column --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-primary">
        <tr>
          <th scope="col" class='min-w-150px'>الأسم</th>
          <th scope="col" class="min-w-110px">الهاتف</th>

          <th scope="col" class='min-w-130px'>الهوية</th>

          {{-- <th scope="col" class='min-w-90px'>تاريخ الميلاد</th> --}}
          {{-- <th scope="col">الجنسية</th> --}}

          <th scope="col" class="min-w-120px">العنوان</th>

          <th scope="col">البنك</th>
          <th scope="col">الحساب</th>
          <th scope="col">IBAN</th>
          <th scope="col"></th>
          <th scope="col" class="min-w-200px"></th>

        </tr>
      </thead>
      <tbody>
        
      @foreach ($employees as $employee)
          
      <tr>
        <td><span class='fw-bold border-bottom'>{{$employee->first_name .' '. $employee->last_name}}</span></td>
        <td dir='ltr' class='text-start'>{{$employee->phone}}</td>

        <td>{{$employee->identity_type}}<br>/ {{$employee->identity_number}}</td>

        {{-- <td class='fw-bold'>{{$employee->birthdate}}</td> --}}
        {{-- <td class='fw-bold'>{{$employee->nationality->name}}</td> --}}

        <td>{{$employee->region->name_ar}} / {{$employee->province->name_ar}}, {{$employee->city->name_ar}}, {{$employee->neighbor->name_ar}}</td>
        <td>{{$employee->bank->name}}</td>
        <td>{{$employee->bank_account}}</td>
        <td>{{$employee->iban}}</td>

        <td class='py-2 '>
          <a href="{{route('employeeContracts', $employee->id)}}">
            <button class="btn btn-primary-light btn--table">العقود</button>
          </a>
        </td>

        <td>

          <button class="btn btn-outline-light btn--table d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".edit-{{$employee->id}}">تعديل</button>

          <button class="btn btn-outline-light btn--table d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new-transaction-{{$employee->id}}">إضافة مالية</button>


        </td>
      </tr>

      @endforeach
      {{-- end foreach --}}
        
      </tbody>
    </table>
  </div>

  @if($employees instanceof \Illuminate\Pagination\LengthAwarePaginator )

  <div class="m-4">

      {{$employees->links()}}
   
  </div>
  
  @endif

</div>
{{-- end column --}}




{{-- =========================================================== --}}


{{-- modal --}}
<div class="col-12">
<div class="modal fade new" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة موظف</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addEmployee')}}" method="post">

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
                  <label for="birthdate">تاريخ الميلاد</label>
                  <input type="date" id="birthdate" required name="birthdate" class="form-control" >
                </div>


                
                {{-- hr --}}
                <div class="col-12 mb-20 mt-2">
                  <hr>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="phone"> رقم الهاتف </label>
                  <input type="text" id="phone" required name="phone" class="form-control text-start">
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


                {{-- hr --}}
                <div class="col-12 mb-3">
                  <hr>
                </div>

                <div class="col-12 mb-20">
                  <h5 class='fw-bold form--subheading d-inline-block'>معلومات العقد</h5>
                </div>

                
                <div class="col-sm-4 mb-20">
                  <label for="title">المسمى الوظيفي</label>
                  <select name="title" class="form-control form--select" id="title">

                    <option value=""></option>

                    @foreach ($jobs as $job)
                      <option value="{{$job->id}}">{{$job->name}}</option>
                    @endforeach

                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="date">تاريخ العقد</label>
                  <input type="date" class="form-control" name="date" id="date">
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="end_date">تاريخ الإنتهاء</label>
                  <input type="date" class="form-control" name="end_date" id="end_date">
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="salary">المرتب</label>
                  <input type="number" class="form-control" name="salary" id="salary">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="status">الحالة</label>

                  <select name="status" class="form-control form--select" id="status">
                      <option value=""></option>
                      <option value="حالة 1">حالة 1</option>
                      <option value="حالة 2">حالة 2</option>
                      <option value="حالة 3">حالة 3</option>
                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference">
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









{{-- ===================================================================== --}}





@foreach ($employees as $employee)
    



{{-- add transaction modal --}}
<div class="col-12">
  <div class="modal fade new-transaction-{{$employee->id}}" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة إجراء</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addFinancial')}}" method="post" enctype="multipart/form-data">
          @csrf


          {{-- :hidden type --}}
          <input type="hidden" name="type" value='الموارد البشرية''>
          
          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                {{-- fixated: employee --}}
                <div class="col-sm-4 mb-20">
                  <label for="employee">الموظف</label>
                  <select name="employee" class="form-control form--select" id="employee" readonly>

                      <option value="{{$employee->id}}" selected>{{$employee->first_name . ' ' . $employee->last_name}}</option>
                      
                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="reference">رقم الإجراء </label>
                  <input type="text" class="form-control" name="reference" id="reference">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" name="date" id="date">
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="type">النوع</label>
                  <select name="type_desc" class="form-control form--select" id="type_desc">

                      <option value=""></option>
                      <option value="مرتب">مرتب</option>
                      <option value="مكافأة">مكافأة</option>
                      <option value="خصم">خصم</option>
                  </select>
                </div>


                
                <div class="col-sm-4 mb-20">
                  <label for="amount_in_days">عدد الأيام</label>
                  <input type="number" class="form-control" min="0" step="0.01" name="amount_in_days" id="amount_in_days">
                </div>


                {{-- empty --}}
                <div class="col-12"></div>


                <div class="col-sm-4 mb-20">
                  <label for="payment_type">طريقة الدفع</label>
                  <select name="payment_type" class="form-control form--select payment-select" id="payment_type" data-form='add-{{$employee->id}}'>

                      <option value=""></option>
                      <option value="المبلغ كامل">المبلغ كامل</option>
                      <option value="تقصيد المبلغ">تقصيد المبلغ</option>
                  </select>
                </div>



                <div class="col-sm-4 mb-20 payment-select-col d-none" data-form='add-{{$employee->id}}'>
                  <label for="remaining_amount">المبلغ المتبقي</label>
                  <input type="number" min='0' step='0.01' class="form-control" name="remaining_amount" id="remaining_amount">
                </div>




                <div class="col-sm-4 mb-20">
                  <label for="payment_with">آلية الدفع</label>
                  <select name="payment_with" class="form-control form--select" id="payment_with">

                      <option value=""></option>
                      <option value="تحويل بنكي">تحويل بنكي</option>
                      <option value="كاش">كاش</option>
                  </select>
                </div>



                <div class="col-sm-12 mb-20">
                  <label for="note">ملاحظة</label>
                  <input type="text" class="form-control" name="note" id="note">
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







{{-- ===================================================================== --}}






{{-- edit employee modal --}}


<div class="col-12">
  <div class="modal fade edit-{{$employee->id}}" role="dialog" aria-labelledby="new" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
  
          {{-- header --}}
          <div class="modal-header mb-3">
            <h4 class="modal-title fw-bold" id="new">تعديل موظف</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
  
          {{-- form --}}
          <form action="{{route('updateEmployee')}}" method="post">
  
            <input type="hidden" name="id" value="{{$employee->id}}" id="">
            {{-- modal body --}}
            <div class="modal-body">
                @csrf
  
                <div class="row no-gutters mx-0">
  
                  <div class="col-sm-4 mb-20">
                    <label for="first_name"> الأسم الأول</label>
                    <input type="text" id="first_name" required value="{{$employee->first_name}}" name="first_name" class="form-control" >
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="last_name"> الأسم الأخير</label>
                    <input type="text" id="last_name" required value="{{$employee->last_name}}" name="last_name" class="form-control" >
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="identity_type">نوع الهوية</label>
                    <select name="identity_type" class="form-control form--select" id="identity_type">
  
                      <option value="{{$employee->identity_type}}">{{$employee->identity_type}}</option>

                      <option value="إقامة">إقامة</option>
                      <option value="هوية وطنية">هوية وطنية</option>
                      <option value="هوية خليجية">هوية خليجية</option>
                      <option value="جواز سفر">جواز سفر</option>
  
                    </select>
                  </div>
  
                  
                  <div class="col-sm-4 mb-20">
                    <label for="identity_number">رقم الهوية</label>
                    <input type="text" id="identity_number" value="{{$employee->identity_number}}" required name="identity_number" class="form-control" >
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="nationality">الجنسية</label>
                    <select name="nationality"  class="form-control form--select" id="nationality">
                      
                      <option value="{{$employee->nationality_id}}">{{$employee->nationality->name}}</option>
  
                      @foreach ($nationalities as $nation)
                          <option value="{{$nation->id}}">{{$nation->name}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
  
                     
                  <div class="col-sm-4 mb-20">
                    <label for="birthdate">تاريخ الميلاد</label>
                    <input type="date" id="birthdate" value="{{$employee->birthdate}}" required name="birthdate" class="form-control" >
                  </div>
  
  
                  
                  {{-- hr --}}
                  <div class="col-12 mb-20 mt-2">
                    <hr>
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="phone"> رقم الهاتف </label>
                    <input type="text" id="phone" required value="{{$employee->phone}}" name="phone" class="form-control text-start">
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="region">المقاطعة</label>
                    <select name="region" class="form--select col-sm-12" id="region">
                      <option value="{{$employee->region_id}}">{{$employee->region->name_ar}}</option>
  
                      @foreach ($regions as $region)
                        <option value="{{$region->id}}">{{$region->name_ar}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="province">المحافظة</label>
                    <select name="province" class="form-control form--select" id="province">
                      
                      <option value="{{$employee->province_id}}">{{$employee->province->name_ar}}</option>
  
                      @foreach ($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name_ar}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="city">المدينة</label>
                    <select name="city" class="form-control form--select" id="city">
  
                      <option value="{{$employee->city_id}}">{{$employee->city->name_ar}}</option>
  
                        @foreach ($cities as $city)
                          <option value="{{$city->id}}">{{$city->name_ar}}</option>
                        @endforeach
  
                    </select>
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="neighbor">الحي</label>
                    <select name="neighbor" class="form-control form--select" id="neighbor">
  
                      <option value="{{$employee->neighbor_id}}">{{$employee->neighbor->name_ar}}</option>
  
                      @foreach ($neighbors as $neighbor)
                        <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="bank">البنك</label>
                    <select name="bank" class="form-control form--select form--select" id="bank">
  
                      <option value="{{$employee->bank_id}}">{{$employee->bank->name_ar}}</option>
  
                      @foreach ($banks as $bank)
                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                      @endforeach
  
                    </select>
                  </div>
  
                  <div class="col-sm-4 mb-20">
                    <label for="bank_account">رقم الحساب</label>
                    <input type="text" class="form-control" value="{{$employee->bank_account}}" name="bank_account" id="bank_account">
                  </div>
  
  
                  <div class="col-sm-4 mb-20">
                    <label for="iban">IBAN</label>
                    <input type="text" class="form-control" value="{{$employee->iban}}"  name="iban" id="iban">
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

@endforeach
{{-- end loop --}}




@endsection
{{-- end content section --}}








{{-- ======================================================= --}}


{{-- scripts --}}
@section('scripts')


<script>


  $('div').on('change', '.payment-select', function() {

    // : get dataForm / value
    dataForm = $(this).attr('data-form');
    inputVal = $(this).val();


    if (inputVal == 'تقصيد المبلغ') {

      $(`.payment-select-col[data-form=${dataForm}]`).removeClass('d-none');

    } else {

      $(`.payment-select-col[data-form=${dataForm}]`).addClass('d-none');

    } // end if


  }); // end function

</script>

    
@endsection

