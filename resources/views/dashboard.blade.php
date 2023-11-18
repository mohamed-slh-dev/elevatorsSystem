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










{{-- table of installations --}}
<div class="col-sm-12 col-lg-6 col-xl-6 mb-5">
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
<div class="col-sm-12 col-lg-6 col-xl-6 mb-5">
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



<div class="col-12 mb-4">
    <hr>
</div>


{{-- ============================================================== --}}






{{-- elevators table --}}
<div class="col-sm-12 col-lg-6 col-xl-6 mb-5">

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