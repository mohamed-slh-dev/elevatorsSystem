@extends('layouts.app')

@section('title', 'أعمال الصيانة')
    
@section('content')
    
{{-- add button --}}
<div class="col-6 mb-5 text-end">
    <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
      <i class="fa fa-plus me-2 fs-13 "></i>
      إضافة عملية صيانة</button>
  </div>



  
{{-- table of maintenances --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-primary">
          <tr>
            <th scope="col">النوع</th>
            <th scope="col" class='min-w-140px'>العميل</th>
            <th scope="col">الحالة</th>
            <th scope="col"> التاريخ</th>
            <th scope="col"> المرجع</th>
            <th scope="col"> السعر</th>

            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col" style="width: auto;"></th>
            <th scope="col" style="width: auto;"></th>


          </tr>
        </thead>
        <tbody>
          

        {{-- maintenances - loop --}}
        @foreach ($maintenance_bills as $bill)
          <tr>         

            <td>فاتورة</td>
            <td>{{$bill->customer->first_name. ' '. $bill->customer->last_name}}</td>
            <td>{{$bill->status}}
              {{ ($bill->status_alt != '' ? ' / ' .$bill->status_alt: '')}}</td>
            <td>{{$bill->date}}</td>
            <td>{{$bill->reference}}</td>
            <td>{{$bill->price}}</td>

            <td>
              <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".edit-bill-{{$bill->id}}">تعديل</button>
            </td>

            <td>
              <a href="{{route('editMaintenanceParts', [$bill->id, 'bill'])}}">
                <button class="btn btn-outline-light btn--table">تعديل أجزاء المصعد</button>
              </a>
            </td>   




            {{-- print / remove --}}
            <td class="text-center">
              <a href="{{route('printMaintenance', [$bill->id, 'bill'])}}" class='text-center d-inline-block'>
                <button class="btn btn-none btn--table d-flex align-items-center scale--2 remove--btn"><i data-feather="printer" style='width: 17px;'></i></button>
              </a>
            </td>


            <td class="text-center">
              <button data-bs-toggle="modal" data-bs-target=".delete" class="btn btn-none text-danger btn--table contract-assign-id scale--2 remove--btn" data-id="{{$bill->id}}" data-type='bill'>
                <i class='fa fa-trash fs-5'></i>
              </button>
            </td>
            

          </tr>
        @endforeach
        {{-- end loop --}}

        
        



        {{-- ----------------------------------------------- --}}
        
        
        
        {{-- quotations loop --}}
        @foreach ($maintenance_quotations as $quotation)
        
        <tr>         

          <td>عرض سعر</td>
          <td>{{$quotation->customer->first_name. ' '. $quotation->customer->last_name}}</td>
          <td>{{$quotation->status}}
            {{ ($quotation->status_alt != '' ? ' / ' .$quotation->status_alt: '')}}</td>
          <td>{{$quotation->date}}</td>
          <td>{{$quotation->reference}}</td>
          <td>{{$quotation->price}}</td>

          <td>
            <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".edit-quotation-{{$quotation->id}}">تعديل</button>
          </td>

          <td>
            <a href="{{route('editMaintenanceParts', [$quotation->id, 'quotation'])}}">
              <button class="btn btn-outline-light btn--table">تعديل أجزاء المصعد</button>
            </a>
          </td> 
          


          {{-- print / delete --}}
          <td class="text-center">
            <a href="{{route('printMaintenance', [$quotation->id, 'quotation'])}}" class='text-center d-inline-block'>
              <button class="btn btn-none btn--table d-flex align-items-center scale--2 remove--btn"><i data-feather="printer" style='width: 17px;'></i></button>
            </a>
          </td>


          <td class="text-center">
            <button data-bs-toggle="modal" data-bs-target=".delete" class="btn btn-none text-danger btn--table contract-assign-id scale--2 remove--btn" data-id="{{$quotation->id}}" data-type='quotation'>
              <i class='fa fa-trash fs-5'></i>
            </button>
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





{{-- new maintenance modal --}}
<div class="col-12">
  <div class="modal fade new" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة عملية صيانة</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addMaintenance')}}" method="post">
          @csrf

          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-20">
                  <label for="type">النوع </label>
                  <select name="type" required class="form-control form--select form--select" id="type">

                    <option value=""></option>
                    <option value="فاتورة">فاتورة</option>
                    <option value="عرض سعر">عرض سعر</option>

                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="customer">العميل </label>
                  <select name="customer" required class="form-control form--select form--select" id="customer">

                    <option value=""></option>

                    @foreach ($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->first_name .' '. $customer->last_name}}</option>
                    @endforeach

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator">المصعد</label>
                  <select name="elevator" class="form-control form--select form--select" id="elevator">

                    <option value=""></option>

                    @foreach ($elevators as $elevator)
                      <option value="{{$elevator->id}}">{{$elevator->name}}</option>
                    @endforeach

                  </select>
                </div>




                


                {{-- options for reports --}}

                <div class="col-sm-4 mb-20">
                  <label for="elevator_type">نوع المصاعد</label>
                  <select name="elevator_type" required class="form-control form--select form--select" id="elevator_type">

                      <option value=""></option>

                      <option value="مصعد بضائع">مصعد بضائع</option>
                      <option value="مصعد أشخاص">مصعد أشخاص</option>
                      <option value="مصعد سيارات">مصعد سيارات</option>

                  </select>
                </div>

                
                 
                <div class="col-sm-4 mb-20">
                  <label for="elevator_passengers">عدد الركاب</label>
                  <input type="number" step='1' class="form-control" name="elevator_passengers" id="elevator_passengers">
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_count">عدد المصاعد</label>
                  <input type="number" step='1' class="form-control" name="elevator_count" id="elevator_count" required>
                </div>



                
                <div class="col-sm-4 mb-20">
                  <label for="elevator_opening_mechanism">آلية فتح الباب</label>
                  <select name="elevator_opening_mechanism" required class="form-control form--select form--select" id="elevator_opening_mechanism">

                      <option value=""></option>
                      <option value="مانيول">مانيول</option>
                      <option value="اوتوماتيك">اوتوماتيك</option>

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_load">حمولة المصعد</label>
                  <input type="number" step='0.01' class="form-control" name="elevator_load" id="elevator_load">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_speed">سرعة المصعد</label>
                  <input type="number" step='0.01' class="form-control" name="elevator_speed" id="elevator_speed">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_floors">عدد المحطات</label>
                  <input type="number" step='1' class="form-control" name="elevator_floors" id="elevator_floors">
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_doors">عدد المداخل</label>
                  <input type="number" step='1' class="form-control" name="elevator_doors" id="elevator_doors">
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_power">مدد القدرة للطاقة</label>
                  <input type="text" class="form-control" name="elevator_power" id="elevator_power">
                </div>



                <div class="col-sm-12 mb-20">
                  <label for="elevator_operating_mechanism">طريقة التشغيل</label>
                  <input type="text" class="form-control" name="elevator_operating_mechanism" id="elevator_operating_mechanism">
                </div>



                {{-- options for reports --}}




                {{-- hr --}}
                <div class="col-12">
                  <hr class='mt-4 mb-5'>
                </div>




                <div class="col-sm-4 mb-20">
                  <label for="status">الحالة</label>
                  <select name="status" required class="form-control form--select form--select status-select" id="status" data-form='add'>

                    <option value=""></option>

                    @foreach ($statuses as $status)
                      <option value="{{$status}}">{{$status}}</option>
                    @endforeach

                  </select>
                </div>


                {{-- status alt --}}
                <div class="col-sm-4 mb-20 status-select-col d-none" data-form='add'>
                  <label for="statusAlt">حالة اخرى</label>
                  <input type="text" class="form-control" name="status_alt" id="statusAlt">
                </div>





                <div class="col-sm-4 mb-20">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference">
                </div>
                


                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" required name="date" id="date">
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






{{-- edit maintenance/bill modal --}}

@foreach ($maintenance_quotations as $quotation)
    
<div class="col-12">
  <div class="modal fade edit-quotation-{{$quotation->id}}" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل عملية صيانة</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updateMaintenance')}}" method="post">
          @csrf


          {{-- id --}}
          <input type="hidden" name="id" value='{{$quotation->id}}'>



          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-20">
                  <label for="type">النوع </label>
                  <select name="type" required class="form-control form--select form--select" id="type">
                    <option value="عرض سعر" selected>عرض سعر</option>
                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="customer">العميل </label>
                  <select name="customer" required class="form-control form--select form--select" id="customer" value='{{$quotation->customer_id}}'>

                    @foreach ($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->first_name .' '. $customer->last_name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="elevator">المصعد</label>
                  <select name="elevator" class="form-control form--select form--select" id="elevator" value='{{$quotation->elevator_id}}'>

                    @foreach ($elevators as $elevator)
                      <option value="{{$elevator->id}}">{{$elevator->name}}</option>
                    @endforeach

                  </select>
                </div>




                



                {{-- options for reports --}}

                <div class="col-sm-4 mb-20">
                  <label for="elevator_type">نوع المصاعد</label>
                  <select name="elevator_type" required class="form-control form--select form--select" id="elevator_type" value='{{$quotation->elevator_type}}'>

                      <option value=""></option>

                      <option value="مصعد بضائع">مصعد بضائع</option>
                      <option value="مصعد أشخاص">مصعد أشخاص</option>
                      <option value="مصعد سيارات">مصعد سيارات</option>

                  </select>
                </div>

                
                 
                <div class="col-sm-4 mb-20">
                  <label for="elevator_passengers">عدد الركاب</label>
                  <input type="number" step='1' class="form-control" name="elevator_passengers" id="elevator_passengers" value='{{$quotation->elevator_passengers}}'>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_count">عدد المصاعد</label>
                  <input type="number" step='1' class="form-control" name="elevator_count" id="elevator_count" value='{{$quotation->elevator_count}}'>
                </div>



                
                <div class="col-sm-4 mb-20">
                  <label for="elevator_opening_mechanism">آلية فتح الباب</label>
                  <select name="elevator_opening_mechanism" required class="form-control form--select form--select" id="elevator_opening_mechanism" value='{{$quotation->elevator_opening_mechanism}}'>

                      <option value=""></option>
                      <option value="مانيول">مانيول</option>
                      <option value="اوتوماتيك">اوتوماتيك</option>

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_load">حمولة المصعد</label>
                  <input type="number" step='0.01' class="form-control" name="elevator_load" id="elevator_load" value='{{$quotation->elevator_load}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_speed">سرعة المصعد</label>
                  <input type="number" step='0.01' class="form-control" name="elevator_speed" id="elevator_speed" value='{{$quotation->elevator_speed}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_floors">عدد المحطات</label>
                  <input type="number" step='1' class="form-control" name="elevator_floors" id="elevator_floors" value='{{$quotation->elevator_floors}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_doors">عدد المداخل</label>
                  <input type="number" step='1' class="form-control" name="elevator_doors" id="elevator_doors" value='{{$quotation->elevator_doors}}'>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_power">مدد القدرة للطاقة</label>
                  <input type="text" class="form-control" name="elevator_power" id="elevator_power" value='{{$quotation->elevator_power}}'>
                </div>



                <div class="col-sm-12 mb-20">
                  <label for="elevator_operating_mechanism">طريقة التشغيل</label>
                  <input type="text" class="form-control" name="elevator_operating_mechanism" id="elevator_operating_mechanism" value='{{$quotation->elevator_operating_mechanism}}'>
                </div>



                {{-- options for reports --}}



                {{-- hr --}}
                <div class="col-12">
                  <hr class='mt-4 mb-5'>
                </div>




                <div class="col-sm-4 mb-20">
                  <label for="status">الحالة</label>
                  <select name="status" required class="form-control form--select form--select status-select" id="status" value='{{$quotation->status}}' data-form='edit-quotation-{{$quotation->id}}'>

                    <option value=""></option>

                    @foreach ($statuses as $status)
                      <option value="{{$status}}">{{$status}}</option>
                    @endforeach

                  </select>
                </div>


                
                {{-- status alt --}}
                <div class="col-sm-4 mb-20 status-select-col d-none" data-form='edit-quotation-{{$quotation->id}}'>
                  <label for="statusAlt">حالة اخرى</label>
                  <input type="text" class="form-control" name="status_alt" id="statusAlt" value='{{ ($quotation->status == 'اخرى' ? $quotation->status_alt: '') }}'>
                </div>
                


                <div class="col-sm-4 mb-20">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference" value='{{$quotation->reference}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" required name="date" id="date" value='{{$quotation->date}}'>
                </div>



                <div class="col-sm-12 mb-20">
                  <label for="desc">الوصف</label>
                  <input type="text" class="form-control" name="desc" id="desc" value='{{$quotation->desc}}'>
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










{{-- ============================================================== --}}






{{-- edit maintenance/quotations modal --}}

@foreach ($maintenance_bills as $bill)
    
<div class="col-12">
  <div class="modal fade edit-bill-{{$bill->id}}" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل عملية صيانة</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updateMaintenance')}}" method="post">
          @csrf


          {{-- id --}}
          <input type="hidden" name="id" value='{{$bill->id}}'>



          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-20">
                  <label for="type">النوع </label>
                  <select name="type" required class="form-control form--select form--select" id="type">
                    <option value="فاتورة" selected>فاتورة</option>
                  </select>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="customer">العميل </label>
                  <select name="customer" required class="form-control form--select form--select" id="customer" value='{{$bill->customer_id}}'>

                    @foreach ($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->first_name .' '. $customer->last_name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="elevator">المصعد</label>
                  <select name="elevator" class="form-control form--select form--select" id="elevator" value='{{$bill->elevator_id}}'>

                    @foreach ($elevators as $elevator)
                      <option value="{{$elevator->id}}">{{$elevator->name}}</option>
                    @endforeach

                  </select>
                </div>




                


                {{-- options for reports --}}

                <div class="col-sm-4 mb-20">
                  <label for="elevator_type">نوع المصاعد</label>
                  <select name="elevator_type" required class="form-control form--select form--select" id="elevator_type" value='{{$bill->elevator_type}}'>

                      <option value=""></option>

                      <option value="مصعد بضائع">مصعد بضائع</option>
                      <option value="مصعد أشخاص">مصعد أشخاص</option>
                      <option value="مصعد سيارات">مصعد سيارات</option>

                  </select>
                </div>

                
                 
                <div class="col-sm-4 mb-20">
                  <label for="elevator_passengers">عدد الركاب</label>
                  <input type="number" step='1' class="form-control" name="elevator_passengers" id="elevator_passengers" value='{{$bill->elevator_passengers}}'>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_count">عدد المصاعد</label>
                  <input type="number" step='1' class="form-control" name="elevator_count" id="elevator_count" value='{{$bill->elevator_count}}'>
                </div>



                
                <div class="col-sm-4 mb-20">
                  <label for="elevator_opening_mechanism">آلية فتح الباب</label>
                  <select name="elevator_opening_mechanism" required class="form-control form--select form--select" id="elevator_opening_mechanism" value='{{$bill->elevator_opening_mechanism}}'>

                      <option value=""></option>
                      <option value="مانيول">مانيول</option>
                      <option value="اوتوماتيك">اوتوماتيك</option>

                  </select>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_load">حمولة المصعد</label>
                  <input type="number" step='0.01' class="form-control" name="elevator_load" id="elevator_load" value='{{$bill->elevator_load}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_speed">سرعة المصعد</label>
                  <input type="number" step='0.01' class="form-control" name="elevator_speed" id="elevator_speed" value='{{$bill->elevator_speed}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_floors">عدد المحطات</label>
                  <input type="number" step='1' class="form-control" name="elevator_floors" id="elevator_floors" value='{{$bill->elevator_floors}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="elevator_doors">عدد المداخل</label>
                  <input type="number" step='1' class="form-control" name="elevator_doors" id="elevator_doors" value='{{$bill->elevator_doors}}'>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="elevator_power">مدد القدرة للطاقة</label>
                  <input type="text" class="form-control" name="elevator_power" id="elevator_power" value='{{$bill->elevator_power}}'>
                </div>



                <div class="col-sm-12 mb-20">
                  <label for="elevator_operating_mechanism">طريقة التشغيل</label>
                  <input type="text" class="form-control" name="elevator_operating_mechanism" id="elevator_operating_mechanism" value='{{$bill->elevator_operating_mechanism}}'>
                </div>



                {{-- options for reports --}}



                {{-- hr --}}
                <div class="col-12">
                  <hr class='mt-4 mb-5'>
                </div>



                <div class="col-sm-4 mb-20">
                  <label for="status">الحالة</label>
                  <select name="status" required class="form-control form--select form--select status-select" id="status" value='{{$bill->status}}' data-form='edit-bill-{{$bill->id}}'>

                    <option value=""></option>

                    @foreach ($statuses as $status)
                      <option value="{{$status}}">{{$status}}</option>
                    @endforeach

                  </select>
                </div>



                {{-- status alt --}}
                <div class="col-sm-4 mb-20 status-select-col d-none" data-form='edit-bill-{{$bill->id}}'>
                  <label for="statusAlt">حالة اخرى</label>
                  <input type="text" class="form-control" name="status_alt" id="statusAlt" value='{{ ($bill->status == 'اخرى' ? $bill->status_alt: '') }}'>
                </div>


                


                <div class="col-sm-4 mb-20">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference" value='{{$bill->reference}}'>
                </div>
                
                

                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" required name="date" id="date" value='{{$bill->date}}'>
                </div>


                <div class="col-sm-12 mb-20">
                  <label for="desc">الوصف</label>
                  <input type="text" class="form-control" name="desc" id="desc" value='{{$bill->desc}}'>
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









{{-- ============================================================== --}}



{{-- confirmation modal --}}
<div class="col-12 justify-content-center">
  <div class="modal fade delete" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog modal-sm">

        {{-- content --}}
        <div class="modal-content modal--remove">


          {{-- form --}}
          <form action="{{route('deleteMaintenance')}}" method="post">
            @csrf
            
            <input type="hidden" name="id" value="" id="modal-assign-id">
            <input type="hidden" name="type" value="" id="modal-assign-type">



            {{-- body --}}
            <div class="modal-body">
    
                <div class="row no-gutters mx-0">
                  <div class="col-12 text-center">
                    
                    {{-- main title --}}
                    <h5 class="modal-title fw-bold form--subheading d-inline-block mb-4" id="delete">حذف عملية الصيانة</h5>

                    {{-- desc --}}
                    <h6 class='mb-3'>هل أنت متأكد من حذف هذه العملية؟</h6>

                    {{-- actions --}}
                    <div class="d-block text-center">
                      <button  class="btn btn-none py-1 px-3" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
                      <button class="btn btn-danger py-1 px-3">حذف</button>
                    </div>

                  </div>
                </div>

            </div>
            {{-- end body --}}
            
          </form>
          {{-- end form --}}
  
        </div>
      </div>
    </div>
</div>




@endsection
{{-- end section --}}










{{-- ======================================================= --}}


@section('scripts')




<script>


  // :status change event
  $('div').on('change', '.status-select', function() {

    // : get dataForm / value
    dataForm = $(this).attr('data-form');
    inputVal = $(this).val();


    if (inputVal == 'اخرى') {

      $(`.status-select-col[data-form=${dataForm}]`).removeClass('d-none');

    } else {

      $(`.status-select-col[data-form=${dataForm}]`).addClass('d-none');

    } // end if


  }); // end function





  // :remove btn
  $('.remove--btn').click(function() {

    $('#modal-assign-id').val($(this).attr('data-id'));
    $('#modal-assign-type').val($(this).attr('data-type'));

  });

</script>
    
@endsection
{{-- end content --}}






