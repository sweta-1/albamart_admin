<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Vender;
use Session;
use App\Model\Setting;
use Throwable;
use DataTables;
use DB;
class VenderController extends Controller
{
    
function vender(){
    $vender = DB::table('venders')->get();
    //echo $vender;
     return view('admin/vender/add_form',['vender'=>$vender]);
}
   public function vender_add(Request $ld ){

   ///  echo "Hi..."; die;

    $rules = [
        'name'  => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
         'city' =>  'required',
         'country'=> 'required',
         'state'=> 'required',
         'pin_code'=> 'required',
      ];

      
       $this->validate($ld, $rules);
       // echo $val;
        $tabel = new Vender();
        $tabel->name = $ld->name;
        $tabel->email = $ld->email;
        $tabel->phone = $ld->phone;
        $tabel->address = $ld->address;
        $tabel->city = $ld->city;
        $tabel->country = $ld->country;
        $tabel->state = $ld->state;
        $tabel->pin_code = $ld->pin_code;
        //print_r( $tabel); 
         /// echo $tabel;
      
      if ($tabel->save()) {
       
        //Session::flash('form-status', "Your form successfully submitted");
        return view('admin/vender/add_form',['vender' => $tabel]);
      }
   }

   public  function delete($id)
  {
     DB::delete('delete from career_forms where id = ?', [$id]);
     Session::flash('delete', " Deleted Successfully !");

     return view('admin/vender/add_form',['vender' => $tabel]);
  }

  public function editvender($id){
    $data=Vender::find($id);
    return json_encode($data);
 }

  public function updatevender(Request $request){


    $data=Vender::find($request->get("id"));
    $data->name=$request->get("name");
    $data->email=$request->get("email");
    $data->phone=$request->get("phone");
    $data->address=$request->get("address");
    $data->city=$request->get("city");
    $data->country=$request->get("country");
    $data->state=$request->get("state");
    $data->pin_code=$request->get("pin_code");
    $data->save();
    Session::flash('message',__('messages_error_success.user_update_success')); 
    Session::flash('alert-class', 'alert-success');
  }



  public function vendordatatable(){
    // $user =Vender::get();
     $user = DB::table('venders')->get();
     // print_r($user); die;
    return DataTables::of($user)
       ->editColumn('id', function ($user) {
           return $user->id;
       })
       ->editColumn('name', function ($user) {
           return $user->name;
       })
       ->editColumn('email', function ($user) {
           return $user->email;
       })
       ->editColumn('phone', function ($user) {
           return $user->phone;
       })
       ->editColumn('address', function ($user) {
        return $user->address;
    })
    ->editColumn('city', function ($user) {
        return $user->city;
    })
    ->editColumn('country', function ($user) {
        return $user->country;
    }) 
    ->editColumn('state', function ($user) {
        return $user->state;
    }) 
    ->editColumn('pin_code', function ($user) {
        return $user->pin_code;
    })           
       ->make(true);
}

}
