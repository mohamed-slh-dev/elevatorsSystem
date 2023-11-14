@extends('layouts.app')

@section('title', 'الموظفين')
    
@section('content')



{{-- title --}}
<div class="col-12 mb-5">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".new">إضافة موظف</button>
</div>



{{-- column --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
  <div class="table-responsive">
    <table class="table table-">
      <thead class="bg-primary">
        <tr>
          <th scope="col">الأسم</th>
          <th scope="col" class='min-w-80px'>نوع الهوية</th>
          <th scope="col" class="min-w-80px">رقم الهوية</th>

          {{-- <th scope="col" class='min-w-90px'>تاريخ الميلاد</th> --}}
          {{-- <th scope="col">الجنسية</th> --}}

          <th scope="col">رقم الهاتف</th>
          <th scope="col">المقاطعة</th>
          <th scope="col">المحافظة</th>
          <th scope="col">المدينة</th>
          <th scope="col">الحي</th>

          <th scope="col">البنك</th>
          <th scope="col">الحساب</th>
          <th scope="col">IBAN</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        
      @foreach ($employees as $employee)
          
      <tr>
        <td >{{$employee->first_name .' '. $employee->last_name}}</td>
        <td>{{$employee->identity_type}}</td>
        <td>{{$employee->identity_number}}</td>

        {{-- <td class='fw-bold'>{{$employee->birthdate}}</td> --}}
        {{-- <td class='fw-bold'>{{$employee->nationality->name}}</td> --}}

        <td>{{$employee->phone}}</td>
        <td>{{$employee->region->name_ar}}</td>
        <td>{{$employee->province->name_ar}}</td>
        <td>{{$employee->city->name_ar}}</td>
        <td>{{$employee->neighbor->name_ar}}</td>

        <td>{{$employee->bank->name}}</td>
        <td>{{$employee->bank_account}}</td>
        <td>{{$employee->iban}}</td>

        <td class='py-2 '>
          <a href="{{route('employeeContracts', $employee->id)}}">
            <button class="btn btn-outline-success btn--table">العقود</button>
          </a>
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
        <div class="modal-header">
          
          <h4 class="modal-title" id="new">إضافة موظف</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addEmployee')}}" method="post">

          {{-- modal body --}}
          <div class="modal-body">
              @csrf

              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-4">
                  <label for="first_name"> الأسم الأول</label>
                  <input type="text" id="first_name" required name="first_name" class="form-control" >
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="last_name"> الأسم الأخير</label>
                  <input type="text" id="last_name" required name="last_name" class="form-control" >
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="identity_type">نوع الهوية</label>
                  <select name="identity_type" class="form-control" id="identity_type">

                    <option value="إقامة">إقامة</option>
                    <option value="هوية وطنية">هوية وطنية</option>
                    <option value="هوية خليجية">هوية خليجية</option>
                    <option value="جواز سفر">جواز سفر</option>

                  </select>
                </div>

                
                <div class="col-sm-4 mb-4">
                  <label for="identity_number">رقم الهوية</label>
                  <input type="text" id="identity_number" required name="identity_number" class="form-control" >
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="nationality">الجنسية</label>
                  <select name="nationality" class="form-control js-example-basic-single" id="nationality">

                    @foreach ($nationalities as $nation)
                    <optgroup >

                      <option value="{{$nation->id}}">{{$nation->name}}</option>

                    </optgroup>
                    @endforeach
                    
                  </select>
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="phone"> رقم الهاتف </label>
                  <input type="text" id="phone" required name="phone" class="form-control" >
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="birthdate">تاريخ الميلاد</label>
                  <input type="date" id="birthdate" required name="birthdate" class="form-control" >
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="region">المقاطعة</label>
                  <select name="region" class=" js-example-basic-single col-sm-12" id="region">

                    <optgroup>

                      @foreach ($regions as $region)
                      
                        <option value="{{$region->id}}">{{$region->name_ar}}</option>
                          
                      @endforeach

                  </optgroup>
                  </select>
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="province">المحافظة</label>
                  <select name="province" class="form-control js-example-basic-single" id="province">

                    <optgroup>

                      @foreach ($provinces as $province)
                          
                        <option value="{{$province->id}}">{{$province->name_ar}}</option>

                      @endforeach

                  </optgroup>
                  </select>
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="city">المدينة</label>
                  <select name="city" class="form-control js-example-basic-single" id="city">

                    <optgroup>
                      @foreach ($cities as $city)
                        
                        <option value="{{$city->id}}">{{$city->name_ar}}</option>

                      @endforeach
                  </optgroup>
                  </select>
                </div>


                <div class="col-sm-4 mb-4">
                  <label for="neighbor">الحي</label>
                  <select name="neighbor" class="form-control js-example-basic-single" id="neighbor">

                    <optgroup>
                      @foreach ($neighbors as $neighbor)
                          
                        <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>

                      @endforeach
                  </optgroup>
                  </select>
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="bank">البنك</label>
                  <select name="bank" class="form-control js-example-basic-single" id="bank">

                    <optgroup>
                      @foreach ($banks as $bank)
                        
                        <option value="{{$bank->id}}">{{$bank->name}}</option>

                      @endforeach
                  </optgroup>
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


                {{-- hr --}}
                <div class="col-12 mb-3">
                  <hr>
                </div>

                <div class="col-12 mb-4">
                  <h4>معلومات العقد</h4>
                </div>

                
                <div class="col-sm-4 mb-4">
                  <label for="title">المسمى الوظيفي</label>
                  <select name="title" class="form-control" id="title">

                    @foreach ($jobs as $job)
                      
                      <option value="{{$job->id}}">{{$job->name}}</option>

                    @endforeach
                  </select>
                </div>


                <div class="col-sm-4 mb-4">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" name="date" id="date">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="end_date">تاريخ إنتهاء العقد</label>
                  <input type="date" class="form-control" name="end_date" id="end_date">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="salary">المرتب</label>
                  <input type="number" class="form-control" name="salary" id="salary">
                </div>


                <div class="col-sm-4 mb-4">
                  <label for="status">الحالة</label>

                  <select name="status" class="form-control" id="status">

                      <option value="حالة 1">حالة 1</option>
                      <option value="حالة 2">حالة 2</option>
                      <option value="حالة 3">حالة 3</option>

                  </select>
                </div>


                <div class="col-sm-4 mb-4">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference">
                </div>

              </div>
          </div>
          {{-- end body --}}


          {{-- footer --}}
          <div class="modal-footer">

            <button  class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary">حفظ </button>

          </div>
          {{-- end footer --}}

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}

@endsection