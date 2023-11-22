@extends('layouts.app')

@section('title', 'الموردين')
    
@section('content')
    
<div class="col-6 mb-5 text-end">
    <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
      <i class="fa fa-plus me-2 fs-13 "></i>
      إضافة مورد</button>
</div>



{{-- table --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered  ">
        <thead class="bg-primary">
          <tr>
            <th scope="col">الأسم</th>
            <th scope="col">رقم الهاتف</th>
            <th scope="col">البريد الإلكتروني</th>
            <th scope="col"></th>
          </tr>
        </thead>


        {{-- body --}}
        <tbody>
          @foreach ($suppliers as $supplier)
            
          <tr>         
            <td class='scale--2'><span class='fw-bold border-bottom'>{{$supplier->name}}</span></td>
            <td dir='ltr' class='text-start'>{{$supplier->phone}}</td>
            <td>{{$supplier->email}}</td>
          

            {{-- edit --}}
            <td>
              <button class="btn btn-primary-light btn--table" data-bs-toggle="modal" data-bs-target=".edit-{{$supplier->id}}">تعديل</button>
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



{{-- add modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة مورد</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        

        {{-- form --}}
        <form action="{{route('addSupplier')}}" method="post" enctype="multipart/form-data">
          @csrf


          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
  
                <div class="col-sm-4 mb-20">
                  <label for="name">الأسم</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="col-sm-4 mb-20">
                  <label for="phone">رقم الهاتف</label>
                  <input type="text" class="form-control" name="phone" id="phone" required>
                </div>

                
                <div class="col-sm-4 mb-20">
                  <label for="email">البريد الإلكتروني </label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
  
        
              </div>
          </div>
          {{-- end body --}}
  

          {{-- footer --}}
          <div class="modal-footer">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ </button>
          </div>
  
        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal --}}




{{-- ======================================================= --}}





{{-- edit suppliers --}}
@foreach ($suppliers as $supplier)



{{-- edit modal --}}
<div class="col-12">
  <div class="modal fade edit-{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        {{-- headaer --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">تعديل مورد</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        

        {{-- form --}}
        <form action="{{route('updateSupplier')}}" method="post" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="id" value="{{$supplier->id}}" id="">

          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
  
                <div class="col-sm-4 mb-20">
                  <label for="name">الأسم</label>
                  <input type="text" class="form-control" name="name" id="name" value='{{$supplier->name}}' required>
                </div>


                <div class="col-sm-4 mb-20">
                    <label for="phone">رقم الهاتف</label>
                    <input type="text" class="form-control" name="phone" id="phone" value='{{$supplier->phone}}' required>
                  </div>

      
                <div class="col-sm-4 mb-20">
                  <label for="email">البريد الإلكتروني </label>
                  <input type="email" class="form-control" name="email" id="email" value='{{$supplier->email}}' required>
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