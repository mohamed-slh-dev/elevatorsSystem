@extends('layouts.app')

@section('title', 'المستخدمين')
    
@section('content')
    
<div class="col-6 mb-5 text-end">
    <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
      <i class="fa fa-plus me-2 fs-13 "></i>
      إضافة مستخدم</button>
</div>



{{-- table --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table">
        <thead class="bg-primary">
          <tr>
            <th scope="col">الأسم</th>
            <th scope="col">اسم المستخدم</th>
            <th scope="col">البريد الإلكتروني</th>
            <th scope="col"> الحالة</th>
            <th scope="col"></th>
          </tr>
        </thead>


        {{-- body --}}
        <tbody>
          @foreach ($users as $user)
            
          <tr>         
            <td><img width="50" height="50" class='of-cover rounded-circle me-3 table--img' src="{{asset('storage/users/'.$user->image)}}" alt="user image">{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
          


            {{-- active --}}
            <td>
                @if ($user->active == 1)
                    <p class="text-success mb-0" style="font-weight: bold">نشط</p> 
                @else
                  <p class="text-danger mb-0">غير نشط</p> 
                @endif
            </td>


            {{-- edit --}}
            <td>
              <button class="btn btn-none text-secondary btn--table scale--2" data-bs-toggle="modal" data-bs-target="">
                <i class='fa fa-edit fs-5'></i>
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



{{-- add modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        {{-- headaer --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة مستخدم</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        

        {{-- form --}}
        <form action="{{route('addUser')}}" method="post" enctype="multipart/form-data">
          @csrf


          {{-- body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
  
                <div class="col-sm-4 mb-4">
                  <label for="name">الأسم</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="username">اسم المستخدم </label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="password">كلمة المرور </label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>

                
                <div class="col-sm-4 mb-4">
                  <label for="email">البريد الإلكتروني </label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>

  
                <div class="col-sm-4 mb-4">
                  <label for="image">الصورة</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
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

@endsection