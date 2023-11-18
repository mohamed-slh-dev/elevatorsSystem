@extends('layouts.app')

@section('title', 'لوحة التحكم')
    
@section('content')
    

{{-- :altering the align flow --}}
<style>

    .overview--title {
        font-size: 17px;
        letter-spacing: 0.8px
    }


    .page-wrapper .page-body-wrapper .page-header .row {
        align-items: start;
    }

    .widget-joins:after {
        content: none;
    }

    .widget-joins .media .details {
        padding-left: 0px !important;
    }


    .widget-joins .media {
        padding: 20px 20px;
    }

    .widget-joins .media .media-body > span {
        font-weight: 700;
        font-size: 14px;
        color: #222;
        letter-spacing: 0.7px;
    }

    .widget-joins .media h5 {
        margin-top: 5px;
        font-size: 24px;
        color: #bf8f00
    }

    .widget-joins .media .media-body svg {
        margin-right: 0px !important;
        width: 50px;
        height: 50px;
    }
</style>





{{-- empty --}}
<div class="col-12"></div>


{{-- left column --}}
<div class="col-12">
    <div class="container-fluid general-widget">
        <div class="row">


            {{-- item --}}
            <div class="col-sm-3 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="users"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0 fw-bold  overview--title">العملاء</span>
                                <h4 class="mb-0 counter fs-3">15</h4>
                                <i class="icon-bg" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end item --}}







            {{-- item --}}
            <div class="col-sm-3 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="codepen"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0 fw-bold  overview--title">المصاعد</span>
                                <h4 class="mb-0 counter fs-3">32</h4>
                                <i class="icon-bg" data-feather="codepen"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end item --}}








            {{-- item --}}
            <div class="col-sm-3 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="settings"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0 fw-bold  overview--title">أعمال التركيب</span>
                                <h4 class="mb-0 counter fs-3">85</h4>
                                <i class="icon-bg" data-feather="settings"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end item --}}





            {{-- item --}}
            <div class="col-sm-3 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="shield"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0 fw-bold  overview--title">أعمال الصيانة</span>
                                <h4 class="mb-0 counter fs-3">50</h4>
                                <i class="icon-bg" data-feather="shield"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end item --}}




        </div>
    </div>
</div>




{{-- right column --}}
<div class="col-xl-7 box-col-7 d-none">
    <div class="widget-joins card" style="border: 2px solid #e9f0ee; border-radius: 5px;">
        <div class="row">

            {{-- item --}}
            <div class="col-sm-6 pe-0">
                <div class="media border-after-xs">
                <div class="align-self-center me-3 fw-bold fs-5">
                    22%<i class="fa fa-angle-up ms-2"></i>
                </div>
                <div class="media-body details ps-3 text-center">
                    <span class="mb-1">أعمال التركيب</span>
                    <h5 class="mb-0 counter">{{$installationBills->count()}}</h5>
                </div>
                <div class="media-body align-self-center">
                    <i
                    class="font-primary float-end ms-2"
                    data-feather="settings"></i>
                </div>
                </div>
            </div>



            {{-- item --}}
            <div class="col-sm-6 ps-0">
                <div class="media">
                <div class="align-self-center me-3 fw-bold fs-5">
                    12%<i class="fa fa-angle-down ms-2"></i>
                </div>
                <div class="media-body details ps-3 text-center">
                    <span class="mb-1">أعمال الصيانة</span>
                    <h5 class="mb-0 counter">{{$installationQuotations->count()}}</h5>
                </div>
                <div class="media-body align-self-center">
                    <i
                    class="font-primary float-end ms-3"
                    data-feather="shield"></i>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>




{{-- ========================================================= --}}






{{-- table of installations --}}
<div class="col-sm-12 col-lg-6 col-xl-6 mb-5 d-none">
    <div class="table-responsive">

        <h5 class='fw-bold text-center table--heading'>أعمال التركيب</h5>

        <table class="table table-bordered">

            {{-- thead --}}
            <thead class="bg-primary">
                <tr>
                    <th scope="col">النوع</th>
                    <th scope="col">العميل</th>
                    <th scope="col">المصعد</th>
                    <th scope="col" class='min-w-110px'> التاريخ</th>
                    <th scope="col" class='min-w-110px'> السعر</th>

                </tr>
            </thead>
            {{-- end thead --}}



            
            {{-- tbody --}}
            <tbody>
            

                {{-- installations - loop --}}
                @foreach ($installationBills as $bill)

                    <tr>         

                        <td>فاتورة</td>
                        <td>{{$bill->customer->first_name. ' '. $bill->customer->last_name}}</td>
                        <td>{{$bill->elevator->name}}</td>
                        <td>{{$bill->date}}</td>
                        <td>{{$bill->price}}</td>

                    </tr>

                @endforeach
                {{-- end loop --}}




                {{-- ------------------------------- --}}


                {{-- quotations loop --}}
                @foreach ($installationQuotations as $quotation)

                    <tr>         
                        <td>عرض سعر</td>
                        <td>{{$quotation->customer->first_name. ' '. $quotation->customer->last_name}}</td>
                        <td>{{$quotation->elevator->name}}</td>
                        <td>{{$quotation->date}}</td>
                        <td>{{$quotation->price}}</td>
                    </tr>


                @endforeach
                {{-- end loop --}}
            
            </tbody>
        </table>
    </div>
</div>
{{-- end table --}}




{{-- ============================================================= --}}






{{-- table of maintenance --}}
<div class="col-sm-12 col-lg-6 col-xl-6 mb-5 d-none">
    <div class="table-responsive">

        <h5 class='fw-bold text-center table--heading'>أعمال الصيانة</h5>

        <table class="table table-bordered">

            {{-- thead --}}
            <thead class="bg-primary">
                <tr>
                    <th scope="col">النوع</th>
                    <th scope="col">العميل</th>
                    <th scope="col">المصعد</th>
                    <th scope="col" class='min-w-110px'> التاريخ</th>
                    <th scope="col" class='min-w-110px'> السعر</th>

                </tr>
            </thead>
            {{-- end thead --}}



            
            {{-- tbody --}}
            <tbody>
            

                {{-- maintenance - bills loop --}}
                @foreach ($maintenanceBills as $bill)

                    <tr>         

                        <td>فاتورة</td>
                        <td>{{$bill->customer->first_name. ' '. $bill->customer->last_name}}</td>
                        <td>{{$bill->elevator->name}}</td>
                        <td>{{$bill->date}}</td>
                        <td>{{$bill->price}}</td>

                    </tr>

                @endforeach
                {{-- end loop --}}




                {{-- ------------------------------- --}}


                {{-- maintenance - quotes loop --}}
                @foreach ($maintenanceQuotations as $quotation)

                    <tr>         
                        <td>عرض سعر</td>
                        <td>{{$quotation->customer->first_name. ' '. $quotation->customer->last_name}}</td>
                        <td>{{$quotation->elevator->name}}</td>
                        <td>{{$quotation->date}}</td>
                        <td>{{$quotation->price}}</td>
                    </tr>


                @endforeach
                {{-- end loop --}}
            
            </tbody>
        </table>
    </div>
</div>
{{-- end table --}}






{{-- ============================================================== --}}



<div class="col-12 mb-4 d-none">
    <hr>
</div>


{{-- ============================================================== --}}






{{-- elevators table --}}
<div class="col-sm-12 col-lg-6 col-xl-6 mb-5 d-none">

    <div class="table-responsive">

        <h5 class='fw-bold text-center table--heading'>المصاعد</h5>

        <table class="table table-bordered">
            <thead class="bg-primary">
            <tr>
                <th scope="col" style="min-width: 240px;">الأسم</th>
                <th scope="col">الشركة</th>
                <th scope="col" class='min-w-150px'>تفاصيل المورد</th>
            </tr>
            </thead>

            {{-- tbody --}}
            <tbody>
            @foreach ($elevators as $elevator)
        
                <tr class='popover-main'>         
        
                <td class='scale--2'><img width="50" height="50" class='of-cover rounded-circle me-2 table--img' src="{{asset('storage/elevators/'.$elevator->image)}}" alt="evlevator image">
                    <span class='fw-bold border-bottom fs-13'>{{$elevator->name}}</span>
                </td>
            
                <td>{{$elevator->company}}</td>

                {{-- supplier info --}}
                <td class='position-relative'>{{$elevator->supplier_name}}
                    <a class="example-popover btn btn-none p-0 ms-1 scale--2" tabindex="0" role="button" data-bs-toggle="tooltip" data-bs-trigger="focus" data-bs-html="true" data-bs-placement="left" title="{{'هاتف : '  . $elevator->supplier_phone . '<br />' . 'البريد الالكتروني : '  . $elevator->supplier_email}}">
                        <i class='fa fa-info-circle fs-5 text-theme'></i>
                    </a>
                </td>


                </tr>
                {{-- end table row --}}

            @endforeach
            {{-- end loop --}}
            
            </tbody>
        </table>
    </div>
</div>





{{-- ============================================================== --}}






{{-- customers table --}}
<div class="col-sm-12 col-lg-6 col-xl-6 d-none">

    <div class="table-responsive">

        <h5 class='fw-bold text-center table--heading'>العملاء</h5>

        <table class="table table-bordered">
            <thead class="bg-primary">
            <tr>
                <th scope="col" class='min-w-140px'>أسم العميل</th>
                <th scope="col" class='min-w-110px'>نوع العميل</th>
                <th scope="col" class='min-w-130px'>البريد الإلكتروني</th>
                <th scope="col" class="min-w-110px">الهاتف</th>
            </tr>
            </thead>

            {{-- tbody --}}
            <tbody>
            @foreach ($customers as $customer)
        
                <tr class='popover-main'>         
        
                    <td><span class='fw-bold border-bottom fs-13'>{{$customer->first_name. ' '. $customer->last_name}}</span></td>
                    <td></td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>


                </tr>
                {{-- end table row --}}

            @endforeach
            {{-- end loop --}}
            
            </tbody>
        </table>
    </div>
</div>



{{-- ============================================================== --}}

    



@endsection
{{-- end section --}}




@section('scripts')

<script>
  $('[data-toggle="tooltip"]').tooltip({
    trigger : 'hover'
})
</script>
    
@endsection