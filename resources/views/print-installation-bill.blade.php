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
    <title>طباعة فاتورة تركيب المصعد - ({{'IB-'.$installation->id}})</title>
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
                                <h6>نحن صاعد للمصاعد يسرنا أن نقدم لعنايتكم  فاتورة توريد وتركيب مصعد جيرلس حسب المواصفات التالية
                                    <i class='fa fa-chevron-down me-2 text-reports'></i>
                                </h6>
                            </div>


                        </div>
                        {{-- end mid invoice --}}







                        {{-- -------------------------------- --}}





                        {{-- table seciton --}}
                        <div class="row no-gutters mx-0">
                            <div class="col-12 mb-5">

                                {{-- table --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table--reports">

                                        <thead class="bg-primary">
                                            <th>القطعة</th>
                                            <th>الكمية * عدد المصاعد</th>
                                            <th>السعر الإفرادي</th>
                                            <th>المبلغ الإجمالي</th>


                                        </thead>
                                
                                
                                        {{-- body --}}
                                        <tbody>


                                            @php
                                                $sum = 0;
                                            @endphp

                                            @foreach ($installation->installationBillParts as $part)
                                                
                                            @php
                                                $sum += ($part->quantity * $installation->elevator_count) * $part->price;
                                            @endphp

                                            <tr>

                                           
                                                <td>{{$part->name}}</td>
                                                <td>{{$part->quantity }} * {{ $installation->elevator_count}}</td>
                                                <td>{{$part->price}}</td>
                                                <td>{{ ($part->quantity * $installation->elevator_count) * $part->price}}</td>

                                            </tr>

                                            @endforeach

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="text-bold" style="font-size: 16px">المجموع</td>
                                                <td class="text-bold" style="font-size: 16px">
                                                @php
                                                    echo $sum;
                                                @endphp
                                                </td>
                                            </tr>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="text-bold" style="font-size: 16px"> الإجمالي بعد الضريبة (15%)</td>
                                                <td class="text-bold" style="font-size: 16px">
                                                @php
                                                    echo $sum + ($sum * .15);
                                                @endphp
                                                </td>
                                            </tr>
                                           
                                           
                                        </tbody>
                                        {{-- end body --}}

                                    </table>
                                </div>
                                {{-- end table --}}

                            </div>

                            <div class="col-sm-4">
                                    <p class="text-bold">اسم المستلم : {{$installation->customer->first_name . ' ' . $installation->customer->last_name}}</p>
                            </div>

                            <div class="col-sm-4 text-bold">

                                <p>البائع</p>

                            </div>


                            <div class="col-sm-4 text-bold">
                                
                                <p>الحسابات</p>

                            </div>

                            <div class="col-12 mt-3 text-bold">
                                <p>التوقيع</p>
                            </div>

                        </div>
                        {{-- end table seciton --}}





                        {{-- -------------------------------- --}}


                        <div class="row no-gutters mx-0 mt-5 pt-5">

                            <div class="col-12 text-start px-2">
                                <h6 class='fw-bold mb-1'>الحياة بشكل أسهل</h6>
                                <h5 class='text-reports text-uppercase fw-bold' style="letter-spacing: 2.5px">Life Easier</h5>
                            </div>


                            {{-- socials --}}
                            <div class="col-12 px-0 ps-2" style="background-color: rgb(245, 245, 245); border-right: 30px solid #009a70">

                                {{-- flex div --}}
                                <div class="d-flex justify-content-between align-items-center">

                                    {{-- whatsapp --}}
                                    <div class='d-inline-flex align-items-center pt-3 pb-2'>
                                        <span style="letter-spacing: 3px" class="ms-3 me-4 text-black fs-5">0551108180</span>

                                        <span class='footer-icons scale--2'>
                                            <i class='fa fa-whatsapp'></i>
                                        </span>
                                    </div>


                                    {{-- other socials --}}
                                    <div class='d-inline-flex align-items-center pt-3 pb-2'>
                                        
                                        <span style="letter-spacing: 3px" class="ms-3 me-4 text-black fs-5">SAAEDELV</span>

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
        
             window.location.href = '/installations-bills'; 

        });
        
    </script>

</body>
{{-- end body --}}



</html>
{{-- end html --}}