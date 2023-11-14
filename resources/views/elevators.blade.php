@extends('layouts.app')

@section('title', 'المصاعد')
    
@section('content')
    
<div class="col-12 mb-5">
    
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".new">إضافة مصعد</button>

</div>


    <div class="col-sm-12 col-lg-12 col-xl-12">
        <div class="table-responsive">
          <table class="table">
            <thead class="bg-primary">
              <tr>
                <th scope="col">الأسم</th>
                <th scope="col">الصورة</th>
                <th scope="col">الشركة</th>
                <th scope="col">البلد المنشأ</th>
                <th scope="col">اسم المورد</th>
                <th scope="col">رقم هاتف المورد</th>
                <th scope="col">عنوان بريد المورد</th>
    
                <th scope="col">المقاطعة</th>
                <th scope="col">المحافظة</th>
                <th scope="col">المدينة</th>
                <th scope="col">الحي</th>

                <th scope="col">البنك</th>
                <th scope="col">رقم الحساب</th>
                <th scope="col">iban</th>

                <th scope="col"  width="100">أجزاء المصعد</th>
    
    
              </tr>
            </thead>
            <tbody>
             
                @foreach ($elevators as $elevator)
            
                <tr>         
        
                  <td>{{$elevator->name}}</td>
                  <td> 
                    <img width="90" height="90" src="{{asset('storage/elevators/'.$elevator->image)}}" alt="elevator image"> 
                  </td>
                  <td>{{$elevator->company}}</td>
                  <td>{{$elevator->nationality->name}}</td>
                  <td>{{$elevator->supplier_name}}</td>
                  <td>{{$elevator->supplier_phone}}</td>
                  <td>{{$elevator->supplier_email}}</td>

                  <td>{{$elevator->region->name_ar}}</td>
                  <td>{{$elevator->province->name_ar}}</td>
                  <td>{{$elevator->city->name_ar}}</td>
                  <td>{{$elevator->neighbor->name_ar}}</td>
                 
                  <td>{{$elevator->bank->name}}</td>
                  <td>{{$elevator->bank_account}}</td>
                  <td>{{$elevator->iban}}</td>

                  <td width="100">
                  @foreach ($elevator->elevatorParts  as $part)

                          ( {{$part->part->name}} )

                  @endforeach

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
              <h4 class="modal-title" id="new">إضافة مصعد</h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
          <form action="{{route('addElevator')}}" method="post" enctype="multipart/form-data">
    
            <div class="modal-body">
    
                @csrf
                <div class="row">
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="name">الأسم</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="image">الصورة</label>
                    <input type="file" class="form-control" name="image" id="image">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="company">الشركة</label>
                    <input type="text" class="form-control" name="company" id="company">
                  </div>


                  <div class="col-sm-4 mb-20">
                    <label for="nationality">البلد المنشأ</label>
                    <select name="nationality" class="form-control js-example-basic-single" id="nationality">
    
                      @foreach ($nationalities as $nation)
                      <optgroup >
    
                        <option value="{{$nation->id}}">{{$nation->name}}</option>
    
                      </optgroup>
                      @endforeach
                     
                    </select>
                  </div>


                  <div class="col-sm-4 mb-20">
                    <label for="supplier_name">اسم المورد</label>
                    <input type="text" class="form-control" name="supplier_name" id="supplier_name">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="supplier_phone">هاتف المورد</label>
                    <input type="text" class="form-control" name="supplier_phone" id="supplier_phone">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="supplier_email">عنوان بريد المورد</label>
                    <input type="email" class="form-control" name="supplier_email" id="supplier_email">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="region">المقاطعة</label>
                    <select name="region" class=" js-example-basic-single col-sm-12" id="region">
    
                      <optgroup>
    
                        @foreach ($regions as $region)
                        
                          <option value="{{$region->id}}">{{$region->name_ar}}</option>
                            
                        @endforeach
    
                    </optgroup>
                    </select>
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="province">المحافظة</label>
                    <select name="province" class="form-control js-example-basic-single" id="province">
    
                      <optgroup>
    
                        @foreach ($provinces as $province)
                            
                          <option value="{{$province->id}}">{{$province->name_ar}}</option>
    
                        @endforeach
    
                    </optgroup>
                    </select>
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="city">المدينة</label>
                    <select name="city" class="form-control js-example-basic-single" id="city">
    
                      <optgroup>
                        @foreach ($cities as $city)
                          
                          <option value="{{$city->id}}">{{$city->name_ar}}</option>
    
                        @endforeach
                    </optgroup>
                    </select>
                  </div>
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="neighbor">الحي</label>
                    <select name="neighbor" class="form-control js-example-basic-single" id="neighbor">
    
                      <optgroup>
                        @foreach ($neighbors as $neighbor)
                            
                          <option value="{{$neighbor->id}}">{{$neighbor->name_ar}}</option>
    
                        @endforeach
                    </optgroup>
                    </select>
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="bank">البنك</label>
                    <select name="bank" class="form-control js-example-basic-single" id="bank">
    
                      <optgroup>
                        @foreach ($banks as $bank)
                          
                          <option value="{{$bank->id}}">{{$bank->name}}</option>
    
                        @endforeach
                    </optgroup>
                    </select>
    
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="bank_account">رقم الحساب</label>
                    <input type="text" class="form-control" name="bank_account" id="bank_account">
                  </div>
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="iban">IBAN</label>
                    <input type="text" class="form-control" name="iban" id="iban">
                  </div>
    
    
                </div>

                <hr>

                <div class="col-12 mb-20">

                    <h4 class="text-bold">إضافة قطع المصعد</h4>

                </div>

                
                <div class="col">
                    <div class="form-group m-t-15 m-checkbox-inline mb-0">
                @foreach ($parts as $part)
                   
                              <div class="checkbox checkbox-dark">
                                <input id="inline-{{$part->id}}" type="checkbox" name="elevator_parts[]" value="{{$part->id}}">
                                <label for="inline-{{$part->id}}">{{$part->name .' |  السعر الحالي :  ' .$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price']}}</label>
                              </div>
                           
                @endforeach
    
                  
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

@endsection