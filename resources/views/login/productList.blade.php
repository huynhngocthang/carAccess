@extends('dasboard.dasboard')
@section('title','Product_List')

@section('content')
<style>
    .chosen-choices {
       padding: 0 100px ;
    }
    .productCar:hover{
        cursor: pointer;
    }
</style>
<div class="container">    
    <br />
    <br />
  <div class="table-responsive">
   <table id="productTable" class="table table-bordered table-striped">
    <thead>
     <tr>
               <th style="width:20%">Tên phụ tùng</th>
               <th>Chi tiết</th>
               <th>giá</th>
               <th>Hãng</th>
               <th style="width: 15%">Sửa xóa</th>
     </tr>
    </thead>
   </table>
   <div >
    <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
   </div>
  </div>
  <br />
  <br />
 </div>
</body>
</html>
{{-- Create and Updated --}}
<div id="formModal" class="modal fade" role="dialog">
<div class="modal-dialog">
 <div class="modal-content">
  <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Add New Record</h4>
       </div>
       <div class="modal-body">
        <span style="color: rgb(241, 75, 69)" id="form_result"></span>
        <form method="post" id="sample_form" class="form-horizontal">
         @csrf
         <div class="form-group">
           <label class="control-label col-md-4" >Name</label>
           <div class="col-md-8">
            <input type="text" name="name" id="name" class="form-control" />
           </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4" >Chi Tiết</label>
            <div class="col-md-8">
             <textarea name="description" id="description" cols="38" rows="2"></textarea>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4" >Giá</label>
            <div class="col-md-8">
             <input type="text" name="price" id="price" class="form-control" />
            </div>
           </div>
          <div class="form-group">
            <label class="control-label col-md-4" >hãng</label>
            <div class="col-md-8">
                <select class="form-control" name="brand" id="brand">
                    <option value="">-</option>
                    @foreach ($brands as $item)
                       <option value="{{ $item->id }}">{{ $item->name }}</option> 
                    @endforeach
                </select>
            </div>
           </div>
           <div class="ui-layout-north">
                <label class="control-label col-md-4" for="car">Loại xe</label>
             <div class="col-md-8">
                <select  class="chzn-select" multiple="true" name="car_id[]" id="car">
                    <option value="">-</option> 
                         @foreach ($cars as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option> 
                        @endforeach
                </select>
             </div>
        </div>
               <br />
               <div class="form-group" align="center">
                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
               </div>
        </form>
       </div>
    </div>
   </div>
</div>

{{-- RemoveTable --}}
<div id="confirmModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title">Xóa dữ liệu</h4>
           </div>
           <div class="modal-body">
               <h4 align="center" style="margin:0;">Bạn có muốn xóa dữ liệu này không ?</h4>
           </div>
           <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
           </div>
       </div>
   </div>
</div>
{{-- productList --}}
<div id="productListModel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <table class="table" id="carTb">
                    <thead>
                      <tr>
                        <th scope="col">Những xe dành cho phụ tùng : <span id="accessary"></span></th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
 </div>
    @push('product_js')
    <script  src="{{ asset('carJS/product.js') }}" ></script>
    @endpush
@endsection
