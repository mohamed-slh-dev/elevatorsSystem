@extends('layouts.app')

@section('title', 'لوحة التحكم')
    
@section('content')
    

{{-- :altering the align flow --}}
<style>
    .page-wrapper .page-body-wrapper .page-header .row {
        align-items: start;
    }

</style>





{{-- empty --}}
<div class="col-12"></div>



{{-- elevators table --}}
<div class="col-sm-12 col-lg-6 col-xl-6">

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
<div class="col-sm-12 col-lg-6 col-xl-6">

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