<!DOCTYPE html>
<html lang="en" dir="rtl">



{{-- head --}}
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elevators system">
    <meta name="keywords" content="Elevators, system">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title>عرض سعر تركيب المصعد - ({{'IQ-'.$installation->id}})</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
    <!-- Plugins css Ends-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">


    {{-- uthmanTaha font (ar) / Roboto (en) --}}
    <link rel="stylesheet" href="{{asset('assets/fonts/NotoSans/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/Roboto/styles.css')}}">

    

    {{-- Customized style  --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/customized-style.css')}}">

</head>
{{-- end header --}}



<style>
    .table-bordered td, .table-bordered th {
        border-color: ##d9d9d9 !important
    }
</style>

{{-- body --}}
<body dir="rtl" style="background: url('{{asset('assets/images/background/ordinary-2.svg')}}'); background-size:cover; background-position:top; background-attachment: fixed; background-repeat: no-repeat">

    <div class="home--form-bg" style="background-color: transparent">
        <div class="container-fluid">
            <div class="row justify-content-center">

                {{-- print action column --}}
                <div class="col-12 px-0">
                    <div class="card p-0 text-center mb-0">
                        <button id="print-btn" class="btn btn-none py-3 fs-6 fw-bold ls-07 text-white rounded-0" style="background-color: #000;">
                            طباعة {{$type}}
                        </button>
                    </div>
                </div>



                {{-- print card column --}}
                <div class="col-12 px-0" id="partnerreportdiv">
                    <div class="card pt-5 mb-0">


                        {{-- top invoice --}}
                        <div class="row no-gutters mx-0">


                            <div class="col text-center">
                                <h3 class='fw-bold text-reports ls-08'>صاعد للمصاعد</h3>
                                <h6 class='fw-500 ls-06'>تأسيس وتركيب</h6>
                                <h6 class='fw-500 ls-06'>وصيانة جميع المصاعد</h6>
                                <h6 class='fw-500 ls-06'>س.ت: 1010718840</h6>
                                <h6 class='fw-500 ls-06'>ترخيص: 21025051827</h6>
                            </div>



                            <div class="col-3 text-center">
                                <img src="{{asset('assets/images/logo/main-logo.png')}}" alt="" class='w-100 of-contain mb-2' style="height: 100px;">
                                <h6 class='fw-bold mb-1 ls-08'>صاعد للمصاعد</h6>
                                <h6 class='fw-bold text-uppercase ls-08'>saaed to elevators</h6>

                            </div>


                            <div class="col text-center">
                                <h3 class='text-uppercase fw-bold text-reports ls-08'>saaed to elevators</h3>
                                <h6 class='text-uppercase fw-500 ls-06'>establishment and installation</h6>
                                <h6 class='text-uppercase fw-500 ls-06'>maintenance of all elevators</h6>
                                <h6 class='text-uppercase fw-500 ls-06'>cr: 1010718840</h6>
                                <h6 class='text-uppercase fw-500 ls-06'>lic: 21025051827</h6>
                            </div>

                    
                        </div>
                        {{-- end top invoice --}}





                        {{-- hr --}}
                        <hr class='hr--reports mb-5'>




                        {{-- mid invoice --}}
                        <div class="row no-gutters mx-0">


                            {{-- empty --}}
                            <div class="col-3"></div>


                            <div class="col-6 text-center mb-4">
                                <h5 class='text-reports '>العرض الفني والمالي بتوريد وتركيب</h5>
                            </div>


                            <div class="col-3">
                                <h6>{{date('d / m / Y', strtotime($installation->date))}}</h6>
                            </div>



                            {{-- ------------------------ --}}


                            <div class="col-9 mb-2">
                                <h6>السادة المحترمين / {{$installation->customer->first_name . ' ' . $installation->customer->last_name}}</h6>
                            </div>


                            <div class="col-3 mb-2">
                                <h6>العنوان / {{$type}}</h6>
                            </div>

                            {{-- ----------- --}}



                            <div class="col-4 mb-4">
                                <h6>السلام عليكم ورحمة الله وبركاته</h6>
                            </div>
                            
                            <div class="col-4 text-center mb-4">
                                <h6>تحية طيبة</h6>
                            </div>


                            {{-- empty --}}
                            <div class="col-1"></div>


                            <div class="col-3 mb-4">
                                <h6>الرقم / {{$installation->reference}}</h6>
                            </div>



                            {{-- ----------- --}}


                            <div class="col-12 mb-4">
                                <h6>نحن صاعد للمصاعد يسرنا أن نقدم لعنايتكم عرض سعر توريد وتركيب مصعد جيرلس حسب المواصفات التالية
                                    <i class='fa fa-chevron-down me-2 text-reports'></i>
                                </h6>
                            </div>


                        </div>
                        {{-- end mid invoice --}}







                        {{-- -------------------------------- --}}





                        {{-- table seciton --}}
                        <div class="row no-gutters mx-0">
                            <div class="col-12">

                                {{-- table --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table--reports">

                                
                                
                                        {{-- body --}}
                                        <tbody>


                                            {{-- elevator count / type --}}
                                            <tr>
                                                <th class='table--innertitle'>عدد المصاعد</th>
                                                <th>{{$installation->elevator_count}} مصعد</th>

                                                <th class='table--innertitle'>نوع المصاعد</th>
                                                <th>{{$installation->elevator_type}}</th>
                                            </tr>
                                            


                                            {{-- elevator load / passengers --}}
                                            <tr>
                                                <th class='table--innertitle'>حمولة المصعد</th>
                                                <th>{{$installation->elevator_load}} كغ</th>

                                                <th class='table--innertitle'>عدد الركاب</th>
                                                <th>{{$installation->elevator_passengers}} أشخاص</th>
                                            </tr>



                                            {{-- elevator speed / opening --}}
                                            <tr>
                                                <th class='table--innertitle'>سرعة المصعد</th>
                                                <th>{{$installation->elevator_speed}} م/ث</th>

                                                <th class='table--innertitle'>آلية فتح الباب</th>
                                                <th>{{$installation->elevator_opening_mechanism}}</th>
                                            </tr>



                                            {{-- elevator floors / doors --}}
                                            <tr>
                                                <th class='table--innertitle'>عدد المحطات</th>
                                                <th>{{$installation->elevator_floors}} محطة</th>

                                                <th class='table--innertitle'>عدد مداخل الكابينة</th>
                                                <th>{{$installation->elevator_doors}} مدخل</th>
                                            </tr>



                                            
                                            {{-- elevator count / type --}}
                                            <tr>
                                                <th class='table--innertitle'>طريقة التشغيل</th>
                                                <th colspan="3">{{$installation->elevator_operating_mechanism}}</th>
                                            </tr>




                                            {{-- elevator power --}}
                                            <tr>
                                                <th class='table--innertitle'>مدد القدرة للطاقة</th>
                                                <th colspan="3">{{$installation->elevator_power}}</th>
                                            </tr>





                                            {{-- ======================================= --}}


                                            {{-- * dynamically print parts grouped on usage --}}
                                            @if ($parts)


                                                {{-- loop - grouping parts --}}
                                                @foreach ($usages as $usage => $parts)
                                                    
                                                    {{-- usage row --}}
                                                    <tr>
                                                        <th colspan="4" class='text-center table--text-reports fw-bold'> {{ $usage}} </th>
                                                    </tr>


                                                    {{-- loop - parts --}}
                                                    @foreach ($parts as $part)

                                                        <tr>
                                                            <th class='table--innertitle'>
                                                            {{ $part->name }}</th>
                                                            <th colspan="3">{{$part->desc}}</th>
                                                        </tr>

                                                    @endforeach
                                                    {{-- end loop - parts --}}



                                                @endforeach
                                                {{-- end foreach --}}
                                                
                                            @endif
                                            {{-- end if --}}
                                        </tbody>
                                        {{-- end body --}}

                                    </table>
                                </div>
                                {{-- end table --}}

                            </div>
                        </div>
                        {{-- end table seciton --}}






                        {{-- ============================================ --}}
                        {{-- ============================================ --}}




                        {{-- 2: invoice duration / pricing --}}
                        <div class="row no-gutters mx-0 mt-5 pt-5">


                            <div class="col-12 mb-5 pb-5">

                                <h6 class='fw-bold text-reports ls-08 mb-3'>
                                    مدة التركيب والضمان</h6>
                                <h6 class='fw-500 ls-06 mb-2'>التركيب / ستون يوم بعد توقيع العقد وإستلام البئر جاهزة وتحويل الدفعة الأولى</h6>
                                
                                <h6 class='fw-500 ls-06 mb-2'>الضمان / سنتان شامل قطع الغيار تبدأ من تاريخ تسليم المصعد</h6>

                                <h6 class='fw-500 ls-08 mb-2'>شهادة الضمان / تسلم شهادة الضمان من المؤسسة مختومة</h6>
                                <h6 class='fw-500 ls-08 mb-2'>ضمان الماكينة / عشر سنوات</h6>


                                {{-- ------------------------- --}}

                                <h6 class='fw-500 ls-08 mb-5 pb-3'>سعر المصعد حسب المواصفات الفنية المبينة أعلاه شامل التوريد والتركيب والتشغيل والضمان والصيانة. الدورة المجانية لمدة عامين شامل قطع الغيار</h6>

                                {{-- ------------------------- --}}



                                {{-- pricing table --}}
                                <h6 class='fw-bold text-reports ls-08 mb-4 mt-5'>السعر النهائي وجدول الدفعات</h6>




                                {{-- table --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table--reports">

                                
                                
                                        {{-- body --}}
                                        <tbody>


                                            {{-- titles --}}
                                            <tr>
                                                <th rowspan="2" class='text-center table--text-reports fw-bold'>السعر الإجمالي</th>

                                                <th class='text-center table--text-reports '>رقماً</th>
                                                <th class='text-center table--text-reports '>بعد الضريبة (15%)</th>
                                            </tr>
                                            


                                            {{-- price / in arabic --}}
                                            <tr>
                                                <th class='text-center fw-bold'>{{number_format($installation->price)}} ريال</th>
                                                <th class='text-center fw-bold'>{{number_format($installation->price * 0.15 + $installation->price )}} ريال</th>
                                            </tr>



                                            {{-- phase 1 --}}
                                            <tr>
                                                <th class='text-center table--text-reports '>المرحلة الأولى</th>
                                                <th class='text-center '>45%</th>
                                                <th class='text-center '>عند توقيع العقد</th>
                                            </tr>


                                            {{-- phase 2 --}}
                                            <tr>
                                                <th class='text-center table--text-reports '>المرحلة الثانية</th>
                                                <th class='text-center '>45%</th>
                                                <th class='text-center '>بعد الإنتهاء من تركيب الأبواب والسكك</th>
                                            </tr>


                                            {{-- phase 3 --}}
                                            <tr>
                                                <th class='text-center table--text-reports'>مرحلة التشغيل</th>
                                                <th class='text-center'>10%</th>
                                                <th class='text-center'>عند التشغيل واستلام شهادة الضمان</th>
                                            </tr>


                                        </tbody>
                                        {{-- end body --}}

                                    </table>
                                </div>
                                {{-- end table --}}


                            </div>
                            {{-- end col --}}





                            {{-- ------------------------------ --}}


                            {{-- footers --}}
                            <div class="col-6 text-center">
                                <h6 class='fw-bold ls-08 mb-3'>{{$installation->user->name}}</h6>
                                <h6 class='fw-bold ls-08 mb-2' dir='ltr'>{{$installation->user->phone}}</h6>
                            </div>

                            <div class="col-6 text-center">
                                <h6 class='fw-bold ls-08 mb-3'>صاعد للمصاعد</h6>
                                <h6 class='fw-bold ls-08 mb-2'>الختم</h6>
                            </div>


                        </div>
                        {{-- end row --}}



                        {{-- ------------------------------ --}}




                        <div class="row no-gutters mx-0 mt-5 pt-5">

                            <div class="col-12 text-start px-2">
                                <h6 class='fw-bold mb-1'>الحياة بشكل أسهل</h6>
                                <h5 class='text-reports text-uppercase fw-bold' style="letter-spacing: 2.5px">Life Easier</h5>
                            </div>


                            {{-- socials --}}
                            <div class="col-12 px-0 ps-2" style="background-color: black; border-right: 30px solid #009a70">

                                {{-- flex div --}}
                                <div class="d-flex justify-content-between align-items-center">

                                    {{-- whatsapp --}}
                                    <div class='d-inline-flex align-items-center pt-3 pb-2'>
                                        <span style="letter-spacing: 3px" class="ms-3 me-4 text-white fs-5">0551108180</span>

                                        <span class='footer-icons scale--2'>
                                            <i class='fa fa-whatsapp'></i>
                                        </span>
                                    </div>


                                    {{-- other socials --}}
                                    <div class='d-inline-flex align-items-center pt-3 pb-2'>
                                        
                                        <span style="letter-spacing: 3px" class="ms-3 me-4 text-white fs-5">SAAEDELV</span>

                                        <span class='footer-icons scale--2'>
                                            <i class='fa fa-youtube-play'></i>
                                        </span>


                                        <span class='footer-icons scale--2 me-3'>
                                            <i class='fa fa-snapchat-ghost'></i>
                                        </span>

                                        <span class='footer-icons scale--2 me-3'>
                                            <i class='fa fa-twitter'></i>
                                        </span>

                                        <span class='footer-icons scale--2 me-3'>
                                            <i class='fa fa-instagram'></i>
                                        </span>

                                        <span class='footer-icons scale--2 me-3'>
                                            <i class='fa fa-facebook'></i>
                                        </span>

                                    </div>

                                
                                </div>
                            </div>
                            {{-- end flex div --}}

                        </div>
                        {{-- end row --}}



                    </div>
                    {{-- end card --}}

                </div>
                {{-- end main col --}}


            </div>
        </div>
        {{-- end container --}}

    </div>   
    {{-- end div --}}






{{-- ================================================ --}}



    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('assets/js/chart/apex-chart/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>


    <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('assets/js/tooltip-init.js')}}"></script>

    <script src="{{asset('assets/js/chart-widget.js')}}"></script>
    
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    
    <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>

    <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->


    <script>

        $('#print-btn').click(function() {

            var div = document.getElementById('print-btn');
            div.style.visibility = "hidden";
            div.style.display = "none";   

            var p = document.getElementById('partnerreportdiv');
            print(p);
        
             window.location.href = '/installations-quotations'; 

        });
        
    </script>

</body>
{{-- end body --}}



</html>
{{-- end html --}}