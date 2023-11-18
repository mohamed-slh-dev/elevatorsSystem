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
                                <span class="m-0 fw-bold  overview--title">المصاعد</span>
                                <h4 class="mb-0 counter fs-3">{{$elevators->count()}}</h4>
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
                                <h4 class="mb-0 counter fs-3">{{$installationBills->count()}}</h4>
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
                                <h4 class="mb-0 counter fs-3">{{$maintenanceBills->count()}}</h4>
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




@endsection
{{-- end section --}}




@section('scripts')

<script>
  $('[data-toggle="tooltip"]').tooltip({
    trigger : 'hover'
})
</script>
    
@endsection