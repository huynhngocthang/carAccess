@extends('dasboard.dasboard')
@section('title','danh sách xe oto')

@section('content')
<div class="container">    
    <br />
    <br />
  <div class="table-responsive">
   <table id="carTable" class="table table-bordered table-striped">
    <thead>
     <tr>
            <th width="20%">#</th>
               <th width="20%">tên xe</th>
               <th width="30%">Mẫu xe</th>
               <th width="30 %">Sửa xóa</th>
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
            <input type="text" name="car_name" id="car_name" class="form-control" />
           </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4" >Mẫu xe</label>
            <div class="col-md-8">
                <select class="form-control" name="model_car" id="model_car">
                    <option value="">-</option>
                    @foreach ($cardmodels as $item)
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



    @push('car_js')
    <script src="{{ asset('carJS/car.js') }}"></script>
    @endpush
@endsection
