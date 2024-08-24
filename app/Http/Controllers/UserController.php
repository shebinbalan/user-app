<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\File;
use DB;
class UserController extends Controller
{
    public function index()
    {
     $users =User::all();
     return view('users.index',compact('users'));
    }
    function search(Request $request)
    {
     if ($request->ajax()) {
       $output = '';
       $query = $request->get('query');
       if ($query != '') {
           $data = DB::table('users')
               ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
               ->leftJoin('designations', 'users.designation_id', '=', 'designations.id')
               ->select('users.name as user_name', 'users.phone_number as user_phone', 'designations.name as designation_name','departments.name as department_name')
               ->where('users.name', 'like', '%' . $query . '%')
               ->orWhere('designations.name', 'like', '%' . $query . '%')
               ->orWhere('departments.name', 'like', '%' . $query . '%')
               ->orderBy('users.id', 'desc')
               ->get();
       } else {
           $data = DB::table('users')
               ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
               ->leftJoin('designations', 'users.designation_id', '=', 'designations.id')
               ->select('users.name as user_name', 'users.phone_number as user_phone', 'designations.name as designation_name','departments.name as department_name')
               ->orderBy('users.id', 'desc')
               ->get();
       }
       
       $total_row = $data->count();
       if ($total_row > 0) {
           $cards_per_row = 2; 
           $card_counter = 0;
       
           foreach ($data as $row) {
               if ($card_counter % $cards_per_row == 0) {
                   $output .= '<div class="row">';
               }
       
               $output .= '
                   <div class="col-md-6">
                       <div class="card">
                          
                           <div class="card">
                               <h4>&nbsp;&nbsp;' . $row->user_name . '</h4>
                               <h5>&nbsp;&nbsp; ' . $row->designation_name . '</h5>
                               <h6>&nbsp;&nbsp; ' . $row->department_name . '</h6>
                           </div>
                       </div>
                   </div>
               ';
       
               $card_counter++;
       
               if ($card_counter % $cards_per_row == 0) {
                   $output .= '</div>';
               }
           }
       
           
           if ($card_counter % $cards_per_row != 0) {
               $output .= '</div>';
           }
       } else {
           $output = '
               <tr>
                   <td align="center" colspan="4">No Data Found</td>
               </tr>
           ';
       }
       
       $response = [
           'table_data' => $output,
           'total_data' => $total_row
       ];
       return response()->json($response);
   }
    }  
 
 
    public function add()
    {    
     $department =Department::all();
     $designation =Designation::all();
     return view('users.add',compact('department','designation'));
    }
 
   
    public function insert(Request $request)
    {    
     $users = new User();
             $users->name = $request->input('name');
             $users->department_id = $request->input('department_id');          
             $users->designation_id = $request->input('designation_id');
             $users->phone_number = $request->input('phone_number');
             $users->save();
             return redirect('/users')->with('status','Users Added Successfully');
     
    }
}
