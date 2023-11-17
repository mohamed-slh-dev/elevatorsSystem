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
              {{-- <a href="{{route('editElevatorParts', $elevator->id)}}">
                <button class="btn btn-primary-light btn--table">تعديل أجزاء المصعد</button>
              </a> --}}
  
              <button class="btn btn-primary-light btn--table">تعديل </button>
  
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
            {{-- <a href="{{route('editElevatorParts', $elevator->id)}}">
              <button class="btn btn-primary-light btn--table">تعديل أجزاء المصعد</button>
            </a> --}}

            <button class="btn btn-primary-light btn--table">تعديل </button>

          </td>   
          
        </tr>
       @endforeach
        {{-- end loop --}}
          
        </tbody>
      </table>
    </div>
</div>
{{-- end table --}}





{{-- new part modal --}}
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

@endsection