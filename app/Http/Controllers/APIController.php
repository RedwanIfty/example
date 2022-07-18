<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
class APIController extends Controller
{
    function get($type){
        $data=News::where('type',$type)->get();
        return response()->json($data);
    }
    function postdate($postdate){
        $data=News::where('postdate',$postdate)->get();
        return response()->json($data);
    }
    function getTypeAndDate($type,$postdate){
        $data=News::where('type',$type)->
        where('postdate',$postdate)->get();
        return response()->json($data);
    }
    function create(Request $req){
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
        $data=new News();
        $data->title=$req->title;
        $data->description=$req->description;
        $data->postdate=$req->postdate;
        $data->type=$req->type;
        $data->createdby=$req->createdby;
        $data->save();
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
}
