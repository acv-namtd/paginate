<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use DB;
use View;
use Session;
class UserController extends Controller
{
    public function list()
    {
        $arr = UserModel::where("is_deleted",0)
                    ->orderby("id","desc")
                    ->paginate(5);
    	return view("user.list",['arr' => $arr]);
    }
    public function getInsert()
    {
    	return view("user.insert");
    }
    public function postInsert(Request $request)
    {
        $name    = $request->name;
        $email   = $request->email;
        $address = $request->address;
    	UserModel::insert(
    		[
                "name"    => $name, 
                "email"   => $email, 
                "address" => $address
    		]
    	);
    	return redirect()->route('list')->with("success","Insert user success");
    }
    public function getEdit(Request $request)
    {
    	$id = $request->id; 
    	$obj = DB::table("tbl_user")->where("id",$id)->get();
    	$data = json_encode($obj[0],true);
    	return $data;
    }
    public function postEdit(Request $request)
    {
    	$id = $request->id;
    	if($request->active=='yes'){
    		$active = 1;
    	}
    	else{
    		$active = 0;
    	}
    	UserModel::where("id",$id)
    	->update([
			"name" 		=> $request->name,
			"email" 	=> $request->email, 
			"address" 	=> $request->address,
			"is_active"	=> $active
		]);
		return redirect()->route("list")->with("success","Edit user success");
    }
    public function delete(Request $request)
    {
    	$id = $request->id;
    	UserModel::where("id",$id)->update(["is_deleted" => 1]);
    	return redirect()->route("list")->with("success","Delete user success");
    }
    public function delete_all(Request $request)
    {
    	$arr = $request->arr;
    	foreach($arr as $obj){
    		UserModel::where("id",$obj)->update(["is_deleted" => 1]);
    	}
    }
    public function data(Request $request)
    {
        $key = "";
        if(isset($request->key)){
            $key = $request->key;
            $arr = UserModel::select("id","name","email","address","is_active")->where([["name","like","%".$key."%"],["is_deleted",0]])
                ->orWhere([["email","like",'%'.$key."%"],["is_deleted",0]])
                ->orderby("id","desc")->paginate(5);
            return response()->json([
                'data' => $arr,
                'key'   => $key
            ]);
        }
        else{
            $arr = UserModel::select("id","name","email","address","is_active")->where("is_deleted",0)
                    ->orderby("id","desc")
                    ->paginate(5);
            $data = json_encode($arr);
            return response()->json([
                'data' => $arr,
                'key'   => $key
            ]);
        }
    }
    public function paginate(Request $request)
    {
        $key = "";
        if(isset($request->key)){
            $key = $request->key;
            $arr = UserModel::select("id")->where([["name","like","%".$key."%"],["is_deleted",0]])
                ->orWhere([["email","like",'%'.$key."%"],["is_deleted",0]])
                ->orderby("id","desc")->paginate(5);
            return view("user.paginate",["arr" => $arr,"key" => $key]);
        }
        else{
            $arr = UserModel::select("id")->where("is_deleted",0)
                    ->orderby("id","desc")
                    ->paginate(5);
            $data = json_encode($arr);
            return view("user.paginate",["arr" => $arr,"key" => $key]);
        }
    }
}
