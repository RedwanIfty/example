<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    function book(){
        return view('book.show');
    }
    function bookSubmit(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "price"=>"required|numeric"
        ]);
        $book=new Book();
        $book->name=$req->name;
        $book->price=$req->price;
        $book->status="in process";
        $book->save();
        session()->flash('msg','successfull');
        return back();
    }
    function bookShow(){
        $book=Book::where('price','>',11)->get();
        session()->put('show','book price shown');
        return view('book.book')->with('book',$book);
    }
}
