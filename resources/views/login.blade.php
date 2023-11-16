@extends('layouts.login')


{{-- content --}}
@section('content')



<section>         
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 home--bg" style="background-image: url('{{asset('assets/images/background/home.jpg')}}')">
                <div class="login-card" style="background-color: rgb(0 0 0 / 40%);">
                    <form class="theme-form login-form ">

                        <h3 class='fw-bold form--subheading text-center pb-3 mb-4 rounded-1' style="letter-spacing: .9px; border-width: 4px;" dir='ltr'>Elevators.</h4>

                        {{-- email --}}
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control text-dark" type="email" required="" name='email'>
                            </div>
                        </div>


                        {{-- password --}}
                        <div class="form-group">
                            <label>كلمة المرور</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control text-dark" type="password" name="password" required="" placeholder="">
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
         
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


    
@endsection
{{-- end content --}}