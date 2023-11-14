@extends('layouts.app')

@section('title', 'عقود الموظف')
    
@section('content')
    
<div class="col-sm-6 mb-5">
    
    <h4>عقود الموظف : {{$employee->first_name .' '. $employee->last_name}}</h4>

</div>

<div class="col-sm-6 mb-5">

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".new">إضافة عقد</button>

</div>

<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table">
        <thead class="bg-primary">
          <tr>
            <th scope="col">الأسم</th>
            

            <th scope="col">التاريخ</th>
            <th scope="col">تاريخ الإنتهاء</th>
            <th scope="col">الراتب</th>
            <th scope="col">الحالة</th>
            <th scope="col">المرجع</th>
          

            <th scope="col">حذف</th>



          </tr>
        </thead>
        <tbody>
         
        @foreach ($employee->contracts as $contract)
            
        <tr>
          <th>{{$employee->first_name .' '. $employee->last_name}}</th>
         

          <td>{{$contract->date}}</td>
          <td>{{$contract->end_date}}</td>
          <td>{{$contract->salary}}</td>
          <td>{{$contract->status}}</td>
          <td>{{$contract->reference}}</td>

          <td>
              
              <button data-bs-toggle="modal" data-bs-target=".delete" class="btn btn-danger contract-assign-id" value="{{$contract->id}}">حذف</button>

          </td>
        </tr>

        @endforeach
          
        </tbody>
      </table>
    </div>
</div>


<div class="col-12">

    <div class="modal fade new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="new">إضافة عقد</h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
          <form action="{{route('addEmployeeContract')}}" method="post">
    
            <input type="hidden" name="id" value="{{$employee->id}}" id="">

            <div class="modal-body">
    
                @csrf
                <div class="row">
    
                  
                  <div class="col-sm-4 mb-20">
                    <label for="title">المسمى الوظيفي</label>
                    <select name="title" class="form-control" id="title">
    
                      @foreach ($jobs as $job)
                        
                        <option value="{{$job->id}}">{{$job->name}}</option>
    
                      @endforeach
                    </select>
                  </div>
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="date">التاريخ</label>
                    <input type="date" class="form-control" name="date" id="date">
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="end_date">تاريخ إنتهاء العقد</label>
                    <input type="date" class="form-control" name="end_date" id="end_date">
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="salary">المرتب</label>
                    <input type="number" class="form-control" name="salary" id="salary">
                  </div>
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="status">لحالة</label>
    
                    <select name="status" class="form-control" id="status">
    
                        <option value="حالة 1">حالة 1</option>
                        <option value="حالة 2">حالة 2</option>
                        <option value="حالة 3">حالة 3</option>
    
                    </select>
                  </div>
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="reference">المرجع</label>
                    <input type="text" class="form-control" name="reference" id="reference">
                  </div>
    
    
                </div>
    
             
    
            </div>
    
            <div class="modal-footer">
    
              <button  class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              <button class="btn btn-primary">حفظ </button>
    
            </div>
    
          </form>
    
          </div>
        </div>
      </div>

</div>



<div class="col-12">
  <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="delete">حذف عقد</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
        <form action="{{route('deleteEmployeeContract')}}" method="post">
  
          <input type="hidden" name="id" value="" id="modal-assign-contract">

          <div class="modal-body">
  
              @csrf
              <div class="row">
  
                
               <div class="col-12">
                 <h4>هل أنت متأكد من حذف هذا العقد؟</h4>
               </div>
  
              </div>

          </div>
  
          <div class="modal-footer">
  
            <button  class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
            <button class="btn btn-primary">حذف </button>
  
          </div>
  
        </form>
  
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