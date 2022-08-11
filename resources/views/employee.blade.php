@extends('head')
@section('content')
<div class="container mt-5">
    <div class="card card_1" >
        <div class="card-header">
           Employee Form
           <a  href="{{route('emp_list')}}" style="margin-left: 676px;">List</a>
        </div>
       
        <div class="card-body" style="height:100%;background:#fff;">
            <form action="" enctype="multipart/form-data" class="cls_form">
                <div class="row form-group form_group2">
                    <div class="col-6">
                        <label for="">Employee Name</label>
                        <input class="form-control cls_emp_name" type="text" name="name" >
                    </div>
                    <div class="col-6">
                    <label for="">Address</label>
                    <div class="input-group mb-3">
                        <textarea class="form-control cls_emp_address" name="address" rows="1" cols="1" >
                        </textarea>
                    </div>
                    </div>
                </div>
                <div class="row form-group form_group2">
                    <div class="col-6">
                        <label for="">Email Address</label>
                        <input class="form-control cls_emp_email" type="email" name="email" >
                    </div>
                    <div class="col-6">
                    <label for="">Phone</label>
                    <div class="input-group mb-3">
                    <input class="form-control cls_emp_phone" type="int" maxlength="10" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                        </div>
                    </div>
                </div>
                <div class="row form-group form_group2">
                    <div class="col-6">
                        <label for="">Date of Birth</label>
                        <input class="form-control cls_emp_dob" type="date" name="dob" >
                    </div>
                    <div class="col-6">
                    <label for="">Employee Image</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input cls_emp_img" id="inputGroupFile02" name="image">
                            <label class="custom-file-label cls_file_name" for="inputGroupFile02" data-text="Choose file">Choose file</label>
                        </div>
                        </div>
                    </div>
                </div>
                <label for="" class="file_label text-center">*All fields are mandetory</label>
               
                <button type="button" class="btn btn-outline-success cls_form_submit">SUBMIT EMPLOYEE DETAILS</button>
               
              
            </form>
            
        </div>
    </div>
    </div>

@include('include.employee_scripts')
@endsection('content')