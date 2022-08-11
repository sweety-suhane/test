<script>

    $(document).ready(function(){
        empListDetail(1);
    });
$(".cls_file").on("change", function(){
    var files = $("input[name=image]").prop("files")
        var filename = $.map(files, function(val) { return val.name; });
    $(".cls_file_name").html(filename);
});

$('.cls_form_submit').on('click', function(){ 
    var name=$("input[ name=name]").val();
    var address=$(".cls_emp_address").val();
    var email=$("input[ name=email]").val();
    var phone=$("input[ name=phone]").val();
    var dob=$("input[ name=dob]").val();
    var image=$(".cls_emp_img").val();
    var csrf_token =document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    var file_data = $("input[name=image]").prop('files')[0];

    var form_data = new FormData();
    form_data.append('name',name );
    form_data.append('address',address );
    form_data.append('email',email );
    form_data.append('phone',phone );
    form_data.append('dob',dob );
    form_data.append('image', (file_data==undefined)?'':file_data);
    form_data.append('_token',csrf_token);

    if(name == 0){
        alertify.error('Please enter employee name');
        return false;
    }
    if(address == ''){
        alertify.error('Please enter address');
        return false;
    }
    if(phone == ''){
        alertify.error('Please enter email');
        return false;
    }
    if(dob == ''){
        alertify.error('Please select date of birth');
        return false;
    }
    if(image == ''){
        alertify.error('Please choose image');
        return false;
    }
    $.ajax({
        url:'{{route('save_emp_details')}}',
        type:'post',
        contentType: false,
        processData: false,
        data: form_data,
        success: function(response){
            if(response.status== 200){
                alertify.success(response.message); 
                window.location.href = "/employeelist";
                var detail= response.detail;
                if(isset(detail)){
                    employeelist(detail);
                }
                $('.cls_form')[0].reset();
                $(".cls_file_name").html('choose file');
               
            }else{
                alertify.error(response.message); 
            }
        }
    })
});


$('.cls_form_update').on('click', function(){ 
    var id="{{ isset($_GET['id'])?$_GET['id']:'' }}"
    var name=$(".cls_emp_name").val();
    var address=$(".cls_emp_address").val();
    var email=$(".cls_emp_email").val();
    var phone=$(".cls_emp_phone").val();
    var dob=$(".cls_emp_dob").val();
  
    var csrf_token =document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    var file_data = $("input[name=image]").prop('files')[0];
   
    var form_data = new FormData();
    form_data.append('id',id);
    form_data.append('name',name );
    form_data.append('address',address );
    form_data.append('email',email );
    form_data.append('phone',phone );
    form_data.append('dob',dob );
    form_data.append('image', (file_data==undefined)?'':file_data);
    form_data.append('_token',csrf_token);

    if(name == 0){
        alertify.error('Please enter employee name');
        return false;
    }
    if(address == ''){
        alertify.error('Please enter address');
        return false;
    }
    if(phone == ''){
        alertify.error('Please enter email');
        return false;
    }
    if(dob == ''){
        alertify.error('Please select date of birth');
        return false;
    }
    if(image == ''){
        alertify.error('Please choose image');
        return false;
    }
    $.ajax({
        url:'{{route('edit_emp')}}',
        type:'post',
        contentType: false,
        processData: false,
        data: form_data,
        success: function(response){
            if(response.status== 200){
                alertify.success(response.message); 
                window.location.href = "/employeelist";
                var detail= response.detail;
                if(isset(detail)){
                    employeelist(detail);
                }
                $('.cls_form')[0].reset();
                $(".cls_file_name").html('choose file');
               
            }else{
                alertify.error(response.message); 
            }
        }
    })
});

function employeelist(detail){
    console.log(detail);
    var html='';
   
    $.each(detail,function(key,val){  
    html +=' <tr>'+
            '    <td scope="row">'+val.id+'</td>'+
            '    <td>'+val.name+'</td>'+
            '    <td>'+val.address+'</td>'+
            '    <td>'+val.email+'</td>'+
            '    <td>'+val.phone+'</td>'+
            '    <td>'+val.dob+'</td>'+
            '    <td>'+val.image+'</td>'+
            '    <td> <a class="btn btn-warning cls_edit_emp" data-id="'+val.id+'">Edit</a>'+
                    '<form action="" >'+
                   ' <a class="btn btn-danger cls_dlt_emp" data-id="'+val.id+'">Delete</a>'+
                    '</form></td>'+
            '    </tr>';   
    });
    $('.cls_table_list').html(html);
}



$('body').on('click', '.cls_edit_emp', function(){
        var emp_id = $(this).attr('data-id');
        window.location.href = "/updateEmp?id="+emp_id; 
    });
$('body').on('click', '.cls_dlt_emp', function(){
    
        var id = $(this).attr('data-id');
       
    $.ajax({
        url:'{{route('dlt_emp')}}',
        type:'post',
        data:{'id':id,
            "_token": $('meta[name="csrf-token"]').attr('content')},
        success: function(response){
            if(response.status== 200){
                alertify.success(response.message); 
                var detail= response.detail;
                    employeelist(detail);
            }else{
                alertify.error(response.message); 
            }
        }
    });
});

function empListDetail(page_no){
    $.ajax({
        url:'/employeedetail',
        type:'post',
        data:{'page':page_no,
            "_token": $('meta[name="csrf-token"]').attr('content')
           },
        success: function(response){
            if(response.status== 200){ 
                var current_page=response.detail.current_page;
                var last_page=response.detail.last_page;
                var detail= response.detail.data;

                $('.cls_table_list').html(detail);
                if(current_page == 1) {
                    console.log('detail');
                    $('.cls_table_list').html(detail);
                } else {
                  
                    $('.cls_table_list').append(detail);
                }
                var html='';
                for(i=1;i<=last_page;i++){
                html +=
                        '<li class="page-item"><a class="page-link cls_page_no" data-page='+i+'>'+i+'</a></li>';     
                }
                $('.cls_page').html(html);
              
               
                    employeelist(detail);
            }else{
                alertify.error(response.message); 
            }
        }
    });

    $('.cls_page').click(function(){
        var page=$('.cls_page_no').attr('data-page');
        var page_no=parseInt(page)+1;
        empListDetail(page_no);  
    })
    
}
</script>