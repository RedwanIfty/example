<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Create;
use App\Models\Token;
use App\Models\Users;
use App\Models\Sell;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvitation;
use Datetime;
class APIController extends Controller
{
    function get($type){
        $data=News::where('type',$type)->get();
        $date=new Datetime();

        return response()->json([$data,$date]);
    }
    function getTypeAndDate($type,$postdate){
        $data=News::where('type',$type)->
        where('postdate',$postdate)->get();
        return response()->json($data);
    }
    function create(Request $req){
        $validator = Validator::make($req->all(),[
            "title"=>"required",
            "pro_pic"=>"required"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $data=new News();
        $data->title=$req->title;
        $data->pro_pic=$req->pro_pic;
        Mail::to(['redwanifty4389@gmail.com'])->send(new SendInvitation("Registration Confirmation","Dear $req->title have successfully registered"));

        $data->save();

        $news=News::where('title',$req->title)->get();
        
        return response()->json(
            [
                "msg"=>"Added Successfully",
                "data"=>$data        
            ]
        );
         
    }
    function update(Request $req,$id){
        $validator = Validator::make($req->all(),[
            "title"=>"required",
            "description"=>"required",
            "postdate"=>"required",
            "type"=>"required",
            "createdby"=>"required"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $data=News::where('id',$id)->first();
        $data->title=$req->title;
        $data->description=$req->description;
        $data->postdate=$req->postdate;
        $data->type=$req->type;
        $data->createdby=$req->createdby;
        $data->update();
        return response()->json(
            [
                "msg"=>"Updated Successfully",
                "data"=>$data      
                
            ]
        );
         
    }
    function delete($id){
        $data=News::where('id',$id)->delete();
        return response()->json(
            [
                "msg"=>"Delete Successfully"     
            ]
        );
         
    }
    function getAll(){
        $data=News::all();
        return response()->json($data);;
    }
    
    function postdate($postdate){
        $data=News::where('postdate',$postdate)->get();
        //return $data;
        return response()->json($data);
    }
    function file(Request $req){
        $validator = Validator::make($req->all(),[
            "name"=>"required",
            "address"=>"required",
            "file"=>"required",
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        if($req->hasfile('file')){
            $orgName = time().'_'.$req->file->getClientOriginalName();
            $req->file->storeAs('public/pro_pics',$orgName);
            $create=new Create();
            $create->name=$req->name;
            $create->address=$req->address;
            $create->pro_pic=$orgName;
            $create->save();
            return response()->json($create);
        }

        return response()->json(["msg"=>"No file"]);
    }
    function deleteFile($id){
        $create=Create::where("id",$id)->first();
        $create->delete();
        return response()->json(["msg"=>"Delete File Successfull"]);
    }
    function fileView(){
        $create=Create::all();
        return response()->json($create);
    }
    function login(Request $req){
        $validator = Validator::make($req->all(),[
            "uname"=>"required",
            "pass"=>"required",
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $user=Users::where('email',$req->uname)
                    ->where('pass',$req->pass)->first();
      //ss  return $user->Role;
        if($user){
            $key = Str::random(67);
            $token = new Token();
            $token->tkey = $key;
            $token->user_id = $user->id;
            $token->Role=$user->Role;
            $token->created_at = new Datetime();
            $token->save();
            return response()->json($token);
        }
        return response()->json(["msg"=>"Username password invalid"],404);
    }
    function logout(Request $req){
        $tk = $req->token;
        $token = Token::where('tkey',$tk)->first();
        $token->expired_at = new Datetime();
        $token->save();
        return response()->json(["msg"=>"Logged out"]);
    }
    function sell(){
        Student::where('name','ifty')->update(['name'=>'talha']);
        return response()->json(["msg"=>"update successfull"]);
        }

}