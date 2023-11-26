@extends('layouts.app')

@section('title', 'لوحة التحكم')
    
@section('content')
    

{{-- :altering the align flow --}}
<style>

    .overview--title {
        font-size: 17px;
        letter-spacing: 0.8px
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
                                <h4 class="mb-0 counter fs-3">{{$customers->count()}}</h4>
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
                                <span class="m-0 fw-bold  overview--title">الأجزاء</span>
                                <h4 class="mb-0 counter fs-3">{{$parts->count()}}</h4>
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
                                <h4 class="mb-0 counter fs-3">{{$installationBills->count() + $installationQuotations->count()  }}</h4>
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
                                <h4 class="mb-0 counter fs-3">{{$maintenanceBills->count() + $maintenanceQuotations->count() }}</h4>
                                <i class="icon-bg" data-feather="shield"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end item --}}




        </div>





        {{-- ===================================================== --}}

        <div class="row">


            {{-- maintenance --}}
            <div class="col-xl-6">
                <div class="card o-hidden">
                <div class="chart-widget-top">
                    <div class="row card-body">
                    <div class="col-7">
                        <h6 class="f-w-600 font-dark fs-4 fw-bold">صيانة المصاعد</h6>
                        <span class="num fw-bold fs-5"
                        ><span class="counter">2</span>%<i
                            class="icon-angle-up f-12 ms-2"></i
                        ></span>
                    </div>
                    <div class="col-5 text-end">
                        <h4 class="num total-value counter fw-bold fs-3">{{$maintenanceBills->count()}}</h4>
                    </div>
                    </div>
                    <div id="chart-widget2">
                    <div
                        class="flot-chart-placeholder"
                        id="chart-widget-top-second"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card o-hidden">
                <div class="chart-widget-top">
                    <div class="row card-body">
                    <div class="col-8">
                        <h6 class="f-w-600 font-success fs-4 fw-bold">تركيب المصاعد</h6>
                        <span class="num fw-bold fs-5"
                        ><span class="counter">5</span>%<i
                            class="icon-angle-up f-12 ms-2"></i
                        ></span>
                    </div>
                    <div class="col-4 text-end">
                        <h4 class="num total-value">
                        <span class="counter fw-bold fs-3">{{$installationBills->count()}}</span>
                        </h4>
                    </div>
                    </div>
                    <div id="chart-widget3">
                    <div
                        class="flot-chart-placeholder"
                        id="chart-widget-top-third"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>


    </div>
</div>




@endsection
{{-- end section --}}




@section('scripts')

<script>
  $('[data-toggle="tooltip"]').tooltip({
    trigger : 'hover'
})
</script>
    
@endsection