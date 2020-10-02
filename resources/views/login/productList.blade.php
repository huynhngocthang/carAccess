@extends('dasboard.dasboard')

@section('title','danh sách sản phẩm')
    
@section('content')
@push('product.css')
    <link rel="stylesheet" href="{{ asset('carCSS/product.css') }}">
@endpush


    <div class="d-flex ">
        <div class="p2 ml-auto mb-3">
            <label>Mẫu xe </label>
            <select name="carmodel" id="carmodel">
                <option value="">-</option>
                @foreach ($carmodels as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <table class="table table-bordered table-striped "  id="table_product">
        <thead>
        <tr>
            <th scope="col">Tên phụ tùng</th>
            <th scope="col">chi tiết</th>
            <th scope="col">giá </th>
            <th scope="col">hãng</th>
            <th>Sửa xóa</th>s
        </tr>
        </thead>
    </table>
    <div class="d-flex">
        <div class="p2">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createTable" >Thêm sản phẩm</button>
        </div>
    </div>

{{-- // createTable --}}
    <div class="modal fade" id="createTable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <br>
                        <input class="form-control" type="text" name="name" id="name">
                        <span id="ername"></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Chi tiết sản phẩm</label>
                        <br>
                        <input class="form-control" type="text" id="description" name="description">
                        <span id="erdes"></span>
                    </div>
                    <div class="form-group">
                        <label for="price">giá sản phẩm</label>
                        <br>
                        <input  class="form-control" type="number" name="price" id="price"/>
                        <span id="erprice"></span>
                    </div>
                    <div class="form-group ">
                        <label for="price">Hãng</label>
                        <br>
                        <select name="brand_Product" id="brand_product">
                            <option value="">-</option>
                            @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span id="erbrand"></span>
                    <br>
                    <button  onclick="createProduct()" type="button" class="btn btn-primary">Thêm</button>
                </form>

                
            </div>
          </div>
        </div>
      </div>
      {{-- createTable --}}

      {{-- EditTable --}}
      <div class="modal fade editTable" id="editTable" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-content">
                <div class="button">
                    <button type="button ml-auto" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
              <div class="modal-header">
                <h4 class="modal-title mr-50%" id="myModalLabel">Chỉnh sửa</h4>
              </div>
              <div class="modal-body">
                <form>
                     @csrf
                  <div class="form-group">
                    <label for="name">Tên sản phẩm</label>      
                    <div class="input-group">           
                      <input id="editName" type="text" class="form-control"  name="editName"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Chi tiết sản phẩm</label>      
                    <div class="input-group">                               
                     <textarea name="editDescription" id="editDescription" cols="50" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Giá</label>      
                    <div class="input-group">                               
                      <input id="editPrice" type="number" class="form-control" name="price"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Hãng</label>      
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <select class="form-control" id="editBrand" name="editBrand" class="selectpicker">
                        <option>-</option>
                       @foreach ($brands as $item)
                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                       @endforeach
                      </select>
                    </div>
                  </div>
                  <input type="hidden" name="hidden_id" id="hidden_id"/>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="updateTable()" class="btn btn-primary">update</button>
              </div>        
            </div>
          </div>
        </div>
      </div>
      {{-- EditTable --}}

      {{-- removeTable --}}
      <div class="modal fade" id="removeTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
            </div>
            <div class="modal-body">
              <h4 style="margin: 0 ;"> Bạn có chắc muốn xóa không ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-red" data-dismiss="modal">cancel</button>
              <button type="button" id="removeProduct" class="btn btn-danger">ok</button>
              <input type="hidden" id="remove_id">
            </div>
          </div>
        </div>
      </div>

   
    @push('product_js')

        <script src="{{ asset('carJS/product.js') }}"></script>
    @endpush

@endsection