<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elevators system">
    <meta name="keywords" content="Elevators, system">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title>طباعة صيانة المصعد - {{$maintenance->id}}</title>
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

<body dir="rtl">


<div class="col-lg-10 mx-auto" id="partnerreportdiv">
    <div class="card ">
        <div class="card-body invoice-head pt-0 pb-0"> 
            <div class="row mt-5">
                <div class="col-12 text-center printimagediv">                                                
                   <h3>طباعة اعمال الصيانة</h3>                                          
                </div>
            </div>
            <div class="row p-3" style="border: 1px solid #b9b9b9;" >
               
              
                <div class="col-sm-2">
                    <span id="left-header">المرجع : {{$maintenance->reference}}</span>
                </div>
                <div class="col-sm-8 text-center mt-2">
                        
                    <h4> <span id="title-header "> {{$type}}  </h4>
              
                </div>
                <div class="col-sm-2" id="p-date">
                    <span id="print-date">تاريخ الطباعة : {{date('Y/m/d')}}</span>
                </div>

                

            </div> 
          
        </div><!--end card-body-->

        <div class="row" id="btnss">
            
            

            <div class="col-sm-12 text-center mt-3">

                <button id="print-btn" class="btn btn-dark">
                    <i class="fa fa-print mx-1"></i>  طباعة
                </button>

            </div>

        </div>


        <div class="card-body pt-0">
   
            <hr>

            <div class="row">
                
                    <div class="col-sm 4 ">
                        <h4><span style="font-size: 18px">العميل: </span>  <br> 
                            {{$maintenance->customer->first_name . ' '. $maintenance->customer->last_name}}</h4>
                    </div>


                    <div class="col-sm 4 text-center">
                        <h4> <span style="font-size: 18px">المصعد: </span>  <br>
                             {{$maintenance->elevator->name }}</h4>
                    </div>

                    <div class="col-sm 4" style="text-align: left">
                        <h4> <span style="font-size: 18px">السعر: </span>  <br>
                             {{$maintenance->price }}  <small>ريال</small></h4>
                    </div>
              
                <div class="col-12 mb-30 mt-5">
                    <div class="box">
                        <div class="box-head ">
                            <h5 class="title">أجزاء المصعد المختارة</h5>
                        </div>
                        <div>
                              <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                      
                                        <th>الأسم</th>
                                        <th>النوع</th>
                                        <th>التفاصيل</th>
                                        <th>السعر</th>
        
                                    </tr>
                                </thead>

                              

                                <tbody>

        
                                @foreach ($parts as $part)

                                    <tr>
                                        <td>{{$part->part->name}}</td>
                                       
                                        <td>{{$part->part->type}}</td>
                                        <td>{{$part->part->desc}}</td>
                                        <td>{{$part->price}}</td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
          
            </div>

         
        </div>
    </div><!--end card-->
</div><!--end col-->


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

            var div = document.getElementById('btnss');
                div.style.visibility = "hidden";
                div.style.display = "none";   

            var p = document.getElementById('partnerreportdiv');
            print(p);
        
             window.location.href = '/maintenance'; 

        });
        
        
    </script>

</body>
