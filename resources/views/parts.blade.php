@extends('layouts.app')

@section('title', ' الأجزاء')
    
@section('content')
    
<div class="col-12 mb-5">

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".new">إضافة جزء</button>

</div>



<div class="col-sm-12 col-lg-12 col-xl-12">
    <div class="table-responsive">
      <table class="table">
        <thead class="bg-primary">
          <tr>
            <th scope="col">الأسم</th>
            

            <th scope="col">النوع</th>
            <th scope="col">الوصف</th>
            <th scope="col">الصورة</th>
            <th scope="col">سعر الشراء</th>
            <th scope="col">سعر البيع</th>
            <th scope="col">تغيير السعر</th>



          </tr>
        </thead>
        <tbody>
         
        @foreach ($parts as $part)
            
        <tr>         

          <td>{{$part->name}}</td>
          <td>{{$part->type}}</td>
          <td>{{$part->desc}}</td>
          <td> 
              <img width="90" height="90" src="{{asset('storage/parts/'.$part->image)}}" alt="part image"> 
          </td>

          <td>{{$part->partPrices->sortByDesc('id')->first->purchase_price['purchase_price']}}</td>
          <td>{{$part->partPrices->sortByDesc('id')->first->purchase_price['sell_price']}}</td>


          <td>

            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target=".new-price-{{$part->id}}">تغيير السعر</button>

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
              <h4 class="modal-title" id="new">إضافة جزء</h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
          <form action="{{route('addPart')}}" method="post" enctype="multipart/form-data">
    
            <div class="modal-body">
    
                @csrf
                <div class="row">
    
    
                  <div class="col-sm-4 mb-20">
                    <label for="name">الأسم </label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="image">الصورة</label>
                    <input type="file" class="form-control" name="image" id="image">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="type">النوع</label>
    
                    <select name="type" class="form-control" id="type">
    
                        <option value="نوع 1">نوع 1</option>
                        <option value="نوع 2">نوع 2</option>
                        <option value="نوع 3">نوع 3</option>
    
                    </select>
                  </div>
    
                  <div class="col-sm-12 mb-20">
                    <label for="desc">الوصف</label>
                    <input type="text" class="form-control" name="desc" id="desc">
                  </div>
    
                  <div class="col-sm-4 mb-20">
                    <label for="purchase_price">سعر الشراء</label>
                    <input type="number" class="form-control" min="0" step=".1" name="purchase_price" id="purchase_price">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="sell_price">سعر البيع</label>
                    <input type="number" class="form-control" min="0" step=".1" name="sell_price" id="sell_price">
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

@foreach ($parts as $part)


<div class="col-12">


    <div class="modal fade new-price-{{$part->id}}" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="new">تغير السعر</h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
          <form action="{{route('addPartPrice')}}" method="post" >
    
            <div class="modal-body">
    
                @csrf
                <div class="row">
    
    
                  <input type="hidden" name="id" value="{{$part->id}}" id="">
    
                  <div class="col-sm-4 mb-20">
                    <label for="purchase_price">سعر الشراء</label>
                    <input type="number" class="form-control" min="0" step=".1" name="purchase_price" id="purchase_price">
                  </div>

                  <div class="col-sm-4 mb-20">
                    <label for="sell_price">سعر البيع</label>
                    <input type="number" class="form-control" min="0" step=".1" name="sell_price" id="sell_price">
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
    
@endforeach


@endsection