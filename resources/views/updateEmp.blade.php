@extends('head')
@section('content')
<div class="container mt-5">
    <div class="card card_1" >
        <div class="card-header">
           Employee Form
        </div>

        <div class="card-body" style="height:100%;background:#fff;">
            <form action="" enctype="multipart/form-data" class="cls_form">
                <input type="hidden" name='id' value="{{$detail->id}}">
                <div class="row form-group form_group2">
                    <div class="col-6">
                        <label for="">Employee Name</label>
                        <input class="form-control cls_emp_name" type="text" name="name" value="{{$detail->name}}">
                    </div>
                    <div class="col-6">
                    <label for="">Address</label>
                    <div class="input-group mb-3">
                        <textarea class="form-control cls_emp_address" name="address" rows="1" cols="1"  value="{{$detail->address}}">{{$detail->address}}
                        </textarea>
                    </div>
                    </div>
                </div>
                <div class="row form-group form_group2">
                    <div class="col-6">
                        <label for="">Email Address</label>
                        <input class="form-control cls_emp_email" type="email" name="email"  value="{{$detail->email}}" >
                    </div>
                    <div class="col-6">
                    <label for="">Phone</label>
                    <div class="input-group mb-3">
                    <input class="form-control cls_emp_phone" type="int" name="phone" maxlength="10" value="{{$detail->phone}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                </div>
                <div class="row form-group form_group2">
                    <div class="col-6">
                        <label for="">Date of Birth</label>
                        <input class="form-control cls_emp_dob" type="date" name="dob" value="{{$detail->dob}}" >
                    </div>
                    <div class="col-6">
                    <label for="">Employee Image</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input cls_emp_img" id="inputGroupFile02" name="image"  value="{{$detail->image}}">
                            <label class="custom-file-label cls_file_name" for="inputGroupFile02" data-text="Choose file">{{$detail->image}}</label>
                        </div>
                        </div>
                    </div>
                </div>
                <label for="" class="file_label text-center">*All fields are mandetory</label>
              
                <button type="button" class="btn btn-outline-success cls_form_update">UPDATE EMPLOYEE DETAILS</button>
               
            </form>
            
        </div>
    </div>
    </div>

@include('include.employee_scripts')
@endsection('content')