<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use File;

class employeeController extends Controller
{
    public function employee(Request $request){
        $data=Employee::get();
        return view('employee',['detail'=>$data]);
    }
       
    public function editEmpDetail(Request $request){
        $id= $request->id;
        $data=Employee::where('id',$id)->first();
        return view('updateEmp',['detail'=>$data]);
       
    }
    public function employeelist(Request $request){
        return view('employeeList');
      
    }
    public function employeelistDetail(Request $request){
        $data=Employee::paginate(5);
        return response()->json([
            'status'=>200,
            'detail'=>$data,
            'message'=>'Detail fatched successfully'
        ]);
       
    }

    public function SaveEmpDetails(Request $request){
        $validation = Validator::make($request->all(), [
            'name'=> 'required',
            'address'=>'required',
            'email' =>'required', 'string', 'email:rfc,dns', 'max:255', 'unique:employees', 
            'phone' =>'required', 'string', 'min:10', 'unique:employees', 
            'dob' =>'required', 
            'image' =>'required', 
        ]);
        if( $validation->fails() )
        {
            $data = $validation->messages();
            $response['status'] = 201;
            $response['message'] = $data;
            return response()->json($response);
        }
        try{

            $name =$request->name;
            $address =$request->address;
            $email =$request->email;
            $phone=$request->phone;
            $dob=$request->dob;
            $data=new Employee;
            $data->name=$name;
            $data->address=$address;
            $data->email=$email;
            $data->phone=$phone;
            $data->dob=$dob;
            if($file = $request->hasFile('image')) {
                $file = $request->file('image') ;
                $fileName =time().'_'.$file->getClientOriginalName() ;
                $public_path=public_path();
                $my_path='Uploads/EmployeeImages';
                $destinationPath = $public_path.$my_path ;
                $file->move($destinationPath,$fileName);
                $data->image = $fileName ;
            }

            $data->save();
            $detail=Employee::get();
            

            $response['status'] = 200;
            $response['detail'] = $detail;
            $response['message'] = 'Employee details added successfully';
       
        }catch(\Exception $exception){
            $response['status'] = 201;
            $response['message'] = $exception->getMessage();
            return response()->json($response);
        }
        return response()->json($response);
    }

    function updateEmp(Request $request){
        $validation = Validator::make($request->all(), [
            'name'=> 'required',
            'address'=>'required',
            'email' =>'required', 
            'phone' =>'required', 
            'dob' =>'required', 
            'image' =>'required', 
        ]);
        if( $validation->fails() )
        {
            $data = $validation->messages();
            $response['status'] = 201;
            $response['message'] = $data;
            return response()->json($response);
        }
        try{
        $id = $request->id;
        $name =$request->name;
        $address =$request->address;
        $email =$request->email;
        $phone=$request->phone;
        $dob=$request->dob;

        $emp = Employee::find($id) ;
        if($emp){
        $emp->name=$name;
        $emp->address=$address;
        $emp->email=$email;
        $emp->phone=$phone;
        $emp->dob=$dob;

    if($file = $request->hasFile('image')) {
        $file = $request->file('image') ;
        $fileName =time().'_'.$file->getClientOriginalName() ;
        $public_path=public_path();
        $my_path='Uploads/EmployeeImages';
        $destinationPath = $public_path.$my_path ;
        $file->move($destinationPath,$fileName);
        $data->image = $fileName ;
    }
    $emp->save() ;
        }
     
    $response['status'] = 200;
    // $response['detail'] = $detail;
    $response['message'] = 'Employee details updated successfully';
    }catch(\Exception $exception){
        $response['status'] = 201;
        $response['message'] = $exception->getMessage();
        return response()->json($response);
    }

    return response()->json($response);
    }

    function deleteEmp(Request $request){
        $id= $request->id;
        Employee::where('id',$id)->delete();
        $detail=Employee::get();
        $response['status'] = 200;
        $response['detail'] = $detail;
        $response['message'] = 'Employee detail deleted successfully';
        return response()->json($response);
        
    }


}
