@extends('layouts.app')

@section('title', 'المستخدمين')
    
@section('content')
    
<div class="col-12 mb-5">
    
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".new">إضافة مستخدم</button>

</div>

<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table">
        <thead class="bg-primary">
          <tr>

            <th scope="col">الأسم</th>
            <th scope="col">اسم المستخدم</th>
            <th scope="col">البريد الإلكتروني</th>
            <th scope="col">الصورة</th>
            <th scope="col"> الحالة</th>
            <th scope="col"> تعديل</th>

          </tr>
        </thead>
        <tbody>
         
        @foreach ($users as $user)
            
        <tr>         

          <td>{{$user->name}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->email}}</td>
          <td> 
              <img width="120" height="90" src="{{asset('storage/users/'.$user->image)}}" alt="user image"> 
          </td>


         <td>
             @if ($user->active == 1)
                 <p class="text-success" style="font-weight: bold">نشط</p> 
             @else
             <p class="text-danger">غير نشط</p> 
               
             @endif
         </td>

          <td>

            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target=""> تعديل</button>

          </td>

        </tr>

        @endforeach
          
        </tbody>
      </table>
    </div>
</div>



<div class="col-12">


    <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="new">إضافة مستخدم</h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
          <form action="{{route('addUser')}}" method="post" enctype="multipart/form-data">
    
            <div class="modal-body">
    
                @csrf
                <div class="row">
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="name">الأسم </label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="username">اسم المستخدم </label>
                    <input type="text" class="form-control" name="username" id="username">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="password">كلمة المرور </label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>

                  
                  <div class="col-sm-4 mb-20">
                    <label for="email">البريد الإلكتروني </label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>

    
                  <div class="col-sm-4 mb-20">
                    <label for="image">الصورة</label>
                    <input type="file" class="form-control" name="image" id="image">
                  </div>

               
    
                </div>
    
             
    
            </div>
    
            <div class="modal-footer">
    
              <button  class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              <button class="btn btn-primary">حفظ </button>
    
            </div>
    
          </form>
    
          </div>
        </div>
      </div>

</div>

@endsection