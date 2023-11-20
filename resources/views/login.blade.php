@extends('layouts.login')


{{-- content --}}
@section('content')



<section>         
    <div class="container-fluid p-0">
      
        <div class="row">
       
            <div class="col-12 home--bg" style="background-image: url('{{asset('assets/images/background/home.jpg')}}')">


                <div class="login-card" style="background-color: rgb(0 0 0 / 40%);">


                    <div class="theme-form">

                        <form class="login-form" method='post' action={{route('checkLogin')}}>

                            
                            @csrf
                            @method('POST')


                            <h4 class='fw-bold form--subheading text-center pt-3 pb-4 mb-4 rounded-1 position-relative' style="letter-spacing: .9px; border-width: 4px; color: #222" dir='ltr'>
                                <img src="{{asset('assets/images/logo/main-logo.png')}}" alt="" class='logo--login'>
                                صاعد للمصاعد</h4>

                            {{-- email --}}
                            <div class="form-group">
                                <label>إسم المستخدم</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                                    <input class="form-control text-dark" type="text" required="" name='username'>
                                </div>
                            </div>


                            {{-- password --}}
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control text-dark" type="password" name="password" required="" >
                                    {{-- <div class="show-hide"><span class="show"></span></div> --}}
                                </div>
                            </div>


                

                            {{-- remember password --}}
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1" class='text-dark'>تذكر كلمة المرور</label>
                                </div>
                            </div>


                            
                            {{-- submit --}}
                            <div class="form-group text-center d-block">
                                <button class="btn btn-primary-light btn-block mx-auto py-2 px-5" type="submit">تسجيل دخول</button>
                            </div>
            


                            {{-- alert message --}}
                            @if (!empty(session('warning')))
                                <div class="d-block text-center">
                                    <p class='mb-0 text-danger fs-12 border-bottom border-danger pb-1 d-inline-block'>* {{session('warning')}}</p>
                                </div> 
                            @endif
                            {{-- end if --}}


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


    
@endsection
{{-- end content --}}