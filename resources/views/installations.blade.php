@extends('layouts.app')

@section('title', 'أعمال التركيب')
    
@section('content')
    
{{-- add button --}}
<div class="col-6 mb-5 text-end">
    <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
      <i class="fa fa-plus me-2 fs-13 "></i>
      إضافة عملية تركيب</button>
  </div>



  
{{-- table of installations --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-primary">
          <tr>
            <th scope="col" class='min-w-200px'>النوع</th>
            <th scope="col">العميل</th>
            <th scope="col" class='min-w-130px'>المصعد</th>
            <th scope="col" class='min-w-110px'> التاريخ</th>
            <th scope="col" class='min-w-110px'> المرجع</th>
            <th scope="col" class='min-w-110px'> السعر</th>

            <th scope="col" class='min-w-110px'></th>
          </tr>
        </thead>
        <tbody>
          

        {{-- installations - loop --}}
        @foreach ($installation_bills as $bill)
          <tr>         

            <td>فاتورة</td>
            <td>{{$bill->customer->first_name. ' '. $bill->customer->last_name}}</td>
            <td>{{$bill->elevator->name}}</td>
            <td>{{$bill->date}}</td>
            <td>{{$bill->reference}}</td>
            <td>{{$bill->price}}</td>

            <td>
        
              <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".edit-bill-{{$bill->id}}">تعديل</button>

              <a href="{{route('editInstallationParts', [$bill->id, 'bill'])}}">
                <button class="btn btn-outline-light btn--table">تعديل أجزاء المصعد</button>
              </a>
  
            </td>   

          </tr>
        @endforeach
        {{-- end loop --}}

         {{-- quotations loop --}}
        @foreach ($installation_quotations as $quotation)
        <tr>         

          <td>عرض سعر</td>
          <td>{{$quotation->customer->first_name. ' '. $quotation->customer->last_name}}</td>
          <td>{{$quotation->elevator->name}}</td>
          <td>{{$quotation->date}}</td>
          <td>{{$quotation->reference}}</td>
          <td>{{$quotation->price}}</td>

          <td>

            <button class="btn btn--table btn-primary-light" data-bs-toggle="modal" data-bs-target=".edit-quotation-{{$quotation->id}}">تعديل</button>

            <a href="{{route('editInstallationParts', [$quotation->id, 'quotation'])}}">
              <button class="btn btn-outline-light btn--table">تعديل أجزاء المصعد</button>
            </a>

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





{{-- new installation modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة عملية تركيب</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('addInstallation')}}" method="post">
          @csrf

          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">

                <div class="col-sm-4 mb-20">
                  <label for="type">النوع </label>
                  <select name="type" required class="form-control form--select form--select" id="type">

                    <option value="عرض سعر">عرض سعر</option>
                    <option value="فاتورة">فاتورة</option>
                  

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
                  <select name="elevator" required class="form-control form--select form--select" id="elevator">

                    <option value=""></option>

                    @foreach ($elevators as $elevator)
                      <option value="{{$elevator->id}}">{{$elevator->name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" required name="date" id="date">
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






{{-- edit installation/bill modal --}}

@foreach ($installation_quotations as $quotation)
    
<div class="col-12">
  <div class="modal fade edit-quotation-{{$quotation->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل عملية تركيب</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updateInstallation')}}" method="post">
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
                  <select name="elevator" required class="form-control form--select form--select" id="elevator" value='{{$quotation->elevator_id}}'>

                    @foreach ($elevators as $elevator)
                      <option value="{{$elevator->id}}">{{$elevator->name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" required name="date" id="date" value='{{$quotation->date}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference" value='{{$quotation->reference}}'>
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






{{-- edit installation/quotations modal --}}

@foreach ($installation_bills as $bill)
    
<div class="col-12">
  <div class="modal fade edit-bill-{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- heading --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل عملية تركيب</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        {{-- form --}}
        <form action="{{route('updateInstallation')}}" method="post">
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
                  <select name="elevator" required class="form-control form--select form--select" id="elevator" value='{{$bill->elevator_id}}'>

                    @foreach ($elevators as $elevator)
                      <option value="{{$elevator->id}}">{{$elevator->name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="date">التاريخ</label>
                  <input type="date" class="form-control" required name="date" id="date" value='{{$bill->date}}'>
                </div>


                <div class="col-sm-4 mb-20">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference" value='{{$bill->reference}}'>
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