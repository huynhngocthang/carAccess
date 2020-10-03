$(document).ready(function () {
    show() ;
}) ;

function show() { 
    $('#table_product').DataTable({ 
        processing: true ,
        serverSide: true,
        destroy : true ,
        ajax: 'admin/tableproduct',
        columns: [
            {data: 'name'},
            {data: 'description'},
            {data: 'price' },
            {data: 'brand'},
            {data: 'action'},
        ]
    }) ;
}

function createProduct() {
    $.ajax({
        method: 'get',
        url: 'admin/createProduct' ,
        dataType: 'json',
        data: {
            name : $('#name').val(),
            description : $('#description').val(),
            price : $('#price').val(),
            brand : $('#brand_product').val(),
        },
        success: function() {
            show() 
            $('#name').val('') ;
            $('#description').val('');
            $('#price').val('');
            $('#brand_product').val('');
            alertify.alert('thêm thành công');

            $('#createTable').modal('hide') ;
        },
        error: function(data) {
            $('#ername').empty() ;
            $('#erbrand').empty() ;
            $('#erdes').empty() ;
            $('#erprice').empty() ;
            var error = data.responseJSON.errors ;
            $.each(error , function(i , v) {
                if(i == 'name') {
                    $('#ername').append(v[0]) ;
                }else if(i == 'description') {
                    $('#erdes').append(v[0]) ;
                }else if(i == 'price') {
                    $('#erprice').append(v[0]) ;
                }else if(i == 'brand') {
                    $('#erbrand').append(v[0]) ;
                }
            })
        }
        
    })
}

$(document).on('click','.edit', function() {
    var id = $(this).attr('id') ;
    $.ajax({ 
        url:'admin/product/edit/'+id,
        dataType: 'json',
        success: function(data) {
             $('#editName').val(data.name) ;
             $('#editDescription').val(data.description) ;
             $('#editPrice').val(data.price) ;
             $('#editBrand').val(data.brand_id) ;
             $('#hidden_id').val(data.id) ;
        }
    }) ;
}) ;

function updateTable() {
    $.ajax({
        url:'admin/product/update' ,
        dataType: 'json',
        data : {
            hidden_id : $('#hidden_id').val() ,
            editName : $('#editName').val(),
            editDescription : $('#editDescription').val(),
            editPrice : $('#editPrice').val(),
            editBrand : $('#editBrand').val(),
        },
        success : function() {
            show();
            $('#editTable').modal('hide') ;
            alertify.success('Sửa sản phẩm thành công !!!') ;
        }
    })
}

$(document).on('click','.remove', function () {
    var product_id = $(this).attr('id') ;
    $('#remove_id').val(product_id) ;
}) ;

$('#removeProduct').click(function() {
  var  $id =  $('#remove_id').val() ;
    $.ajax({
        url: 'admin/product/remove/'+$id,
        dataType: 'json',
        success: function() {
            show() ;
            $('#removeTable').modal('hide') ;
            alertify.success('Xoá thành công') ;
        }
    });
});
 

