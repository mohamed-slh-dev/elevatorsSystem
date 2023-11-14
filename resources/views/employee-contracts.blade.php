@extends('layouts.app')

@section('title', 'عقود الموظف')
    
@section('content')
   

{{-- add button --}}
<div class="col-sm-6 text-end mb-5">
  <button class="btn btn-outline-primary d-inline-flex align-items-center scaleRotate--1" data-bs-toggle="modal" data-bs-target=".new">
    <i class="fa fa-plus me-2 fs-13 "></i>
    إضافة عقد</button>
</div>


{{-- employee name --}}
<div class="col-sm-12 text-center mb-3">
    <h5 class='fw-bold'>عقود الموظف : {{$employee->first_name .' '. $employee->last_name}}</h5>
</div>




{{-- table of contracts --}}
<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table table-bordered">

        {{-- tbody --}}
        <thead class="bg-primary">
          <tr>
            <th scope="col">تاريخ العقد</th>
            <th scope="col">تاريخ الإنتهاء</th>
            <th scope="col">الراتب</th>
            <th scope="col">الحالة</th>
            <th scope="col">المرجع</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
         
        @foreach ($employee->contracts as $contract)
            
        <tr>
          <td>{{$contract->date}}</td>
          <td>{{$contract->end_date}}</td>
          <td>{{$contract->salary}}</td>
          <td>{{$contract->status}}</td>
          <td>{{$contract->reference}}</td>
          <td>
            <button data-bs-toggle="modal" data-bs-target=".delete" class="btn btn-none text-danger btn--table contract-assign-id scaleRotate--1" value="{{$contract->id}}">
              <i class='fa fa-trash fs-5'></i>
            </button>
          </td>
        </tr>

        @endforeach
        {{-- end loop --}}
          
        </tbody>
      </table>
    </div>
</div>
{{-- end table --}}





{{-- ============================================================== --}}




{{-- add modal --}}
<div class="col-12">
  <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- header --}}
        <div class="modal-header mb-3">
          <h4 class="modal-title fw-bold" id="new">إضافة عقد</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- end header --}}

        <form action="{{route('addEmployeeContract')}}" method="post">
          @csrf

          {{-- id --}}
          <input type="hidden" name="id" value="{{$employee->id}}" id="">


          {{-- modal body --}}
          <div class="modal-body">
              <div class="row no-gutters mx-0">
                
                <div class="col-sm-4 mb-4">
                  <label for="title">المسمى الوظيفي</label>
                  <select name="title" class="form-control form--select" id="title">

                    <option value=""></option>
                    @foreach ($jobs as $job)
                      <option value="{{$job->id}}">{{$job->name}}</option>
                    @endforeach
                    
                  </select>
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="date">تاريخ العقد</label>
                  <input type="date" class="form-control" name="date" id="date">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="end_date">تاريخ الإنتهاء</label>
                  <input type="date" class="form-control" name="end_date" id="end_date">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="salary">المرتب</label>
                  <input type="number" class="form-control" name="salary" id="salary">
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="status">الحالة</label>
                  <select name="status" class="form-control form--select" id="status">
                      <option value=""></option>
                      <option value="حالة 1">حالة 1</option>
                      <option value="حالة 2">حالة 2</option>
                      <option value="حالة 3">حالة 3</option>
                  </select>
                </div>

                <div class="col-sm-4 mb-4">
                  <label for="reference">المرجع</label>
                  <input type="text" class="form-control" name="reference" id="reference">
                </div>

              </div>
          </div>
          {{-- end body --}}


          {{-- footer --}}
          <div class="modal-footer">
            <button  class="btn btn-none text-danger px-3 btn--close" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary px-5">حفظ </button>
          </div>
          {{-- end footer --}}

        </form>
        {{-- end form --}}

      </div>
    </div>
  </div>
</div>
{{-- end modal / col --}}




{{-- ============================================================== --}}



{{-- confirmation modal --}}
<div class="col-12 justify-content-center">
  <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog modal-sm">

        {{-- content --}}
        <div class="modal-content">


          {{-- form --}}
          <form action="{{route('deleteEmployeeContract')}}" method="post">
            @csrf
            
            <input type="hidden" name="id" value="" id="modal-assign-contract">


            {{-- body --}}
            <div class="modal-body">
    
                <div class="row">
                  <div class="col-12 text-center">
                    
                    {{-- main title --}}
                    <h5 class="modal-title fw-bold form--subheading d-inline-block mb-4" id="delete">حذف عقد</h5>

                    {{-- desc --}}
                    <h6 class='mb-3'>هل أنت متأكد من حذف هذا العقد؟</h6>

                    {{-- actions --}}
                    <div class="d-block text-center">
                      <button  class="btn btn-none py-1 px-3" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
                      <button class="btn btn-danger py-1 px-3">حذف</button>
                    </div>

                  </div>
                </div>

            </div>
            {{-- end body --}}
            
          </form>
          {{-- end form --}}
  
        </div>
      </div>
    </div>
</div>


@endsection


@section('scripts')

<script>

  $('.contract-assign-id').click(function() {

  // get selling id
  id = $(this).val();

  $('#modal-assign-contract').val(id);

  });

</script>
    
@endsection