@extends('head')
@section('content')

<div class="container-fluid" style="margin-top: 47px;">
    <div class="card card_2">
        <div class="card-header px-5">
        <i class="fa-solid fa-table"></i> Employee Table
        </div>
        <div class="card-body" style="height:100%;background:#fff;">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Employee Id</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Employee Image</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="cls_table_list">
                
            
           
           
            </tbody>
        </table>
        <nav aria-label="..." class="cls_pagination">
        <ul class="pagination pagination-lg cls_page">
            
        </ul>
        </nav>
        
        </div>
    </div>
</div>
@include('include.employee_scripts')
@endsection('content')