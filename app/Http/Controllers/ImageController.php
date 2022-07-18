<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvitation;
use PDF;


class ImageController extends Controller
{
    function show(){
        // $image=Image::all();
        // return $image;
        return view('image.upload');
    }
    function showSubmit(Request $request){
        $this->validate($request,[
            "name"=>"required|unique:image_info,name",
            "p_image"=>"required|mimes:jpg,png,jpeg|max:2048"
        ]);
        $name= time().'_'.$request->file('p_image')->getClientOriginalName();
        $request->file('p_image')->storeAs('uploads',$name,'public');
        $image=new Image();
        $image->name=$request->name;
        $image->p_image=$name;

        $image->save();

        session()->flash('msg','Image uploaded');
        return redirect()->route('show.dashboard');
    }
    function dashboard(){
        $image=Image::all();
        return view('image.dashboard')->with('image',$image);
    }
    function mail(){
        // Mail::to(['ifty8555@gmail.com'])->send(new SendInvitation("Registration Confirmation","1","IFTY"));
        return view('mails.reg');
    }
    function mailSubmit(Request $req){
        $this->validate($req,[
            "email"=>"required|email"
        ]);
        Mail::to([$req->email])->send(new SendInvitation("Registration Confirmation","1","Dear you have successfully registered"));

    }
    function download($p_image){
     //   $image=Image::where('id',$id)->get(['p_image']);
       // $filePath = public_path($image);
        return response()->download('storage/uploads/'.$p_image);
    }
    function downloadPdf(){
        $image=Image::all();
      //  return $image;
        $pdf=PDF::loadView('image.convertPdf',compact('image'));
       // return $pdf;
        return $pdf->download('image.pdf');
    }
}
