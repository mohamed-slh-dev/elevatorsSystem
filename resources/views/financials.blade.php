@extends('layouts.app')

@section('title', ' المالية')
    
@section('content')


@php
    $typeOptions = ['الموارد البشرية', 'تركيب مصعد', 'صيانة مصعد'];
@endphp
    
{{-- add button --}}
<div class="col-6 mb-5 text-end">
    <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
      <i class="fa fa-plus me-2 fs-13 "></i>
      إضافة اجراء مالي</button>
</div>



{{-- table of parts --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-primary">
          <tr>
            <th scope="col" class='min-w-140px'>الاجراء</th>
            <th scope="col">رقم الاجراء</th>
            <th scope="col">المبلغ</th>
            <th scope="col">المبلغ المتبقي</th>

            <th scope="col" class='min-w-110px'>طريقة الدفع</th>
            <th scope="col" class='min-w-110px'>آلية الدفع</th>

            <th scope="col" class='min-w-110px'>النوع</th>
            <th scope="col" class='min-w-110px'>الموظف</th>

            <th scope="col">التاريخ</th>
            <th scope="col">الملاحظات</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          

        {{-- financials - loop --}}
        @foreach ($financials as $financial)
          <tr>         
            <td><span class='fw-bold border-bottom'>{{$financial->type}}</span></td>
            <td>{{$financial->reference}}</td>

            <td>{{$financial->amount}}</td>
            <td>{{$financial->remaining_amount}}</td>

            <td>{{$financial->payment_type}}</td>
            <td>{{$financial->payment_with}}</td>


            <td>{{$financial->type_desc}}</td>
            <td>{{ (!empty($financial->employee)) ? $financial->employee->first_name . ' ' . $financial->employee->last_name : ' '}}</td>

            <td>{{ date('d-m-Y', strtotime($financial->date))}}</td>
            <td>{{$financial->note}}</td>

            <td>
              <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".edit-{{$financial->id}}">تعديل</button>
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



{{-- new transaction modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
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

          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
              
                <div class="col-sm-4 mb-20">
                  <label for="type">الإجراء</label>
                  <select name="type" class="form-control form--select type-select" data-form='add' id="type">
                    
                    <option value=""></option>
                  
                    @foreach ($typeOptions as $option)
                      <option value="{{$option}}">{{$option}}</option>
                    @endforeach

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



                {{-- empty --}}
                <div class="col-12"></div>


                {{-- hr only --}}
                <div class="col-12 type-select-col d-none" data-form='add'>
                  <div class="row">
                    
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
                      <label for="employee">الموظف</label>
                      <select name="employee" class="form-control form--select" id="employee">

                          <option value=""></option>
                          
                          @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->first_name . ' ' . $employee->last_name}}</option>
                          @endforeach
                          
                      </select>
                    </div>
                    
                    
                    <div class="col-sm-4 mb-20">
                      <label for="amount_in_days">عدد الأيام</label>
                      <input type="number" class="form-control" min="0" step="0.01" name="amount_in_days" id="amount_in_days">
                    </div>


                  </div>
                </div>
                {{-- end row / column--}}


                {{-- empty --}}
                <div class="col-12"></div>


                <div class="col-sm-4 mb-20 type-select-amount" data-form='add'>
                  <label for="purchase_price">المبلغ</label>
                  <input type="number" class="form-control" min="0" step="0.01" name="amount" id="amount">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="payment_type">طريقة الدفع</label>
                  <select name="payment_type" class="form-control form--select payment-select" id="payment_type" data-form='add'>

                      <option value=""></option>
                      <option value="المبلغ كامل">المبلغ كامل</option>
                      <option value="تقصيد المبلغ">تقصيد المبلغ</option>
                  </select>
                </div>



                <div class="col-sm-4 mb-20 payment-select-col d-none" data-form='add'>
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



{{-- ============================================================== --}}







@foreach ($financials as $financial)
    
{{-- edit transaction modal --}}
<div class="col-12">
  <div class="modal fade edit-{{$financial->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل إجراء</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updateFinancial')}}" method="post" enctype="multipart/form-data">

          @method('POST')
          @csrf


          <input type="hidden" name="id" value='{{$financial->id}}'>



          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
              
                <div class="col-sm-4 mb-20">
                  <label for="type">الإجراء</label>
                  <select name="type" class="form-control form--select type-select" data-form='edit-{{$financial->id}}' id="type" value='{{$financial->type}}'>

                    @foreach ($typeOptions as $option)
                      <option value="{{$option}}">{{$option}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="reference">رقم الإجراء </label>
                  <input type="text" class="form-control" name="reference" id="reference" value='{{$financial->reference}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" name="date" id="date" value='{{$financial->date}}'>
                </div>



                {{-- empty --}}
                <div class="col-12"></div>


                {{-- hr only --}}
                <div class="col-12 type-select-col {{$financial->type != 'الموارد البشرية' ? 'd-none' : ''}}" data-form='edit-{{$financial->id}}'>
                  <div class="row">
                    
                    <div class="col-sm-4 mb-20">
                      <label for="type">النوع</label>
                      <select name="type_desc" class="form-control form--select" id="type_desc" value='{{$financial->type_desc}}'>

                          <option value=""></option>
                          <option value="مرتب" >مرتب</option>
                          <option value="مكافأة">مكافأة</option>
                          <option value="خصم">خصم</option>
                      </select>
                    </div>


                    <div class="col-sm-4 mb-20">
                      <label for="employee">الموظف</label>
                      <select name="employee" class="form-control form--select" id="employee" value='{{$financial->employee_id}}'>

                          <option value=""></option>
                          
                          @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->first_name . ' ' . $employee->last_name}}</option>
                          @endforeach
                          
                      </select>
                    </div>
                    
                    
                    <div class="col-sm-4 mb-20">
                      <label for="amount_in_days">عدد الأيام</label>
                      <input type="number" class="form-control" min="0" step="0.01" name="amount_in_days" id="amount_in_days" value='{{$financial->amount_in_days}}'>
                    </div>


                  </div>
                </div>
                {{-- end row / column--}}


                {{-- empty --}}
                <div class="col-12"></div>



                <div class="col-sm-4 mb-20 type-select-amount {{$financial->type == 'الموارد البشرية' ? 'd-none' : ''}}" data-form='edit-{{$financial->id}}'>

                  <label for="purchase_price">المبلغ</label>
                  <input type="number" class="form-control" min="0" step="0.01" name="amount" id="amount" value='{{$financial->amount}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="payment_type">طريقة الدفع</label>
                  <select name="payment_type" class="form-control form--select payment-select" data-form='edit-{{$financial->id}}' id="payment_type" value='{{$financial->payment_type}}'>

                      <option value=""></option>
                      <option value="المبلغ كامل">المبلغ كامل</option>
                      <option value="تقصيد المبلغ">تقصيد المبلغ</option>
                  </select>
                </div>



                <div class="col-sm-4 mb-20 payment-select-col {{$financial->payment_type != 'تقصيد المبلغ' ? 'd-none' : ''}}" data-form='edit-{{$financial->id}}'>
                  <label for="remaining_amount">المبلغ المتبقي</label>
                  <input type="number" min='0' step='0.01' class="form-control" name="remaining_amount" id="remaining_amount" value='{{$financial->remaining_amount}}'>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="payment_with">آلية الدفع</label>
                  <select name="payment_with" class="form-control form--select" id="payment_with" value='{{$financial->payment_with}}'>

                      <option value=""></option>
                      <option value="تحويل بنكي">تحويل بنكي</option>
                      <option value="كاش">كاش</option>
                  </select>
                </div>



                <div class="col-sm-12 mb-20">
                  <label for="note">ملاحظة</label>
                  <input type="text" class="form-control" name="note" id="note" value='{{$financial->note}}'>
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
{{-- end loop --}}



@endsection
{{-- end section --}}







{{-- ======================================================= --}}


{{-- scripts --}}
@section('scripts')


<script>
  $('div').on('change', '.type-select', function() {

    // : get dataForm / value
    dataForm = $(this).attr('data-form');
    inputVal = $(this).val();

    
    if (inputVal == 'الموارد البشرية') {

      $(`.type-select-col[data-form=${dataForm}]`).removeClass('d-none');
      $(`.type-select-amount[data-form=${dataForm}]`).addClass('d-none');

    } else {

      $(`.type-select-col[data-form=${dataForm}]`).addClass('d-none');
      $(`.type-select-amount[data-form=${dataForm}]`).removeClass('d-none');


    } // end if


  }); // end function





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
