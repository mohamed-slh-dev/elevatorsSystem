@extends('layouts.login')


{{-- content --}}
@section('content')


{{-- login changes: move to right side and left side get pattern background from https://heropatterns.com/ --}}

<section>         
    <div class="container-fluid p-0">
      
        <div class="row">

            
            
            {{-- login column --}}
            <div class="col-5 px-0 login--form-bg" >


                <div class="login-card" style="background-color: rgb(0 0 0 / 40%);">


                    <div class="theme-form">

                        <form class="login-form" method='post' action={{route('checkLogin')}}>

                            
                            @csrf
                            @method('POST')


                            <h4 class='fw-bold form--subheading text-center pt-3 pb-4 mb-4 position-relative' style="letter-spacing: .9px; border-radius: 1px; color: #222; border-bottom: 3px solid #7ea59a" dir='ltr'>
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


            {{-- background column --}}
            <div class="col-7 home--bg px-0" style="background-image: url('{{asset('assets/images/background/home.jpg')}}')">
                <div class="login-card" style="background-color: rgb(0 0 0 / 40%);"></div>
            </div>


        </div>
    </div>
</section>


    
@endsection
{{-- end content --}}