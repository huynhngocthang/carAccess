
function show() {
    $('#productTable').DataTable({
        processing: true,
        serverSide: true,
        destroy : true,
        ajax: '/admin/product/list',
        columns  : [
            {data : 'name'},
            {data: 'description'},
            {data: 'price'},
            {data: 'brand'},
            {data:'action'},
        ],
    }) ;  
}



$(function() {
    $(".chzn-select").chosen({width:"100%"});
});

$(document).ready(function() {
    show() ;

    $('#create_record').click(function() {
        $('.modal-title').text('Add New Record') ;
        $('#action_button').val('Add') ;
        $('#action').val('Add') ;
        $('#form_result').html('') ;

        $('#formModal').modal('show') ;
    })

    $('#sample_form').on('submit', function(event) {
        event.preventDefault() ;
        var action_url = '' ;

        if($('#action').val() == 'Add') { 
            action_url = "/admin/product/create" ;
        }

        if($('#action').val() == 'Edit')
        {
        action_url = "/admin/product/update";
        }
        var carArray = [] ;

        $('select[name="car_id[]"] option:selected').each(function() {
            carArray.push($(this).val()) ;
        }) ,
    $.ajax({
        url: action_url,
        method: 'get',
        data: {
            name : $('#name').val() ,
            description: $('#description').val(),
            price : $('#price').val() ,
            brand : $('#brand').val(),
            hidden_id : $('#hidden_id').val(),
            carArray,
        },
        dataType: 'json',
        success:function(data) {
            if(data.errors) 
            {
                $('#form_result').html('') ;
                for(var count = 0; count < data.errors.length; count++)
                {
                    $('#form_result').append(data.errors[count]) ;
                }
            }
            if(data.success) {
                $('#car').val('').trigger("chosen:updated");
                $('#form_result').html('') ;
                $('#sample_form')[0].reset();
                show() ;
                $('#formModal').modal('hide') ;
                alertify.success(data.success) ;
            }
        }

    }) ;
   }) ;

   $(document).on('click', '.edit' , function () {
       var id = $(this).attr('id') ;
        $.ajax({
            url: '/admin/product/edit/'+id,
            dataType: 'json',
            success:function(data) {

                $('.modal-title').text('Edit Record');
                $('#action_button').val('Edit');
                $('#action').val('Edit');
                $('#formModal').modal('show');
                $('#name').val(data.result.name);
                $('#description').val(data.result.description);
                $('#price').val(data.result.price);
                $('#brand').val(data.result.brand_id);
                $('#hidden_id').val(data.result.id);
                var id = [];
                for(i=0 ; i<data.car.length; i++) {
                    id.push(data.car[i].id) ;
                }
                $('#car').val(id).trigger("chosen:updated");
            }
        })
   })
   var carID ;

   $(document).on('click','.delete', function() {
        carID = $(this).attr('id') ;
       $('#confirmModal').modal('show') ;
   })

   $('#ok_button').click(function() {
       $.ajax({
           url: '/admin/product/remove/'+carID,
           beforeSend: function(){
               $('#ok_button').html(`<button class="btn " type="button" disabled>
               <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
               Loading...
             </button>`) ;
           },
           success: function(data) {
               setTimeout(function() {
                $('#confirmModal').modal('hide');
                show() ;
                $('#ok_button').text('ok') ;
                alertify.success('Đã xóa') ;
               } ,2000) ;
           }
       })
   })

   $(document).on('click','.productCar', function() {
       var id = $(this).attr('id');
    $.ajax({
        url: '/admin/product/car/'+id,
        dataType: 'json',
        success: function(data) {
            $('#carTb tbody').html('') ;
            $('#accessary').html(data.productCar.name) ;
            var carList = [] ;
            for(i=0; i<data.productCar.cars.length;i++) { 
                carList.push(data.productCar.cars[i].name) ;
            }
            $('#productListModel').modal('show') ;
            $.each(carList, function(i, v){
                $('#carTb tbody').append(
                    ` <tr>
                        <td>${v}</td>
                    </tr>`
                );
            }) ;
        },
    }) ; 
})


})
  



