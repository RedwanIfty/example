<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddItems;

class AddItemsController extends Controller
{
    //
    function item(){
        return view('item.add');
    }
    function itemSubmit(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "quantity"=>"required|numeric"
        ]);
        $item=AddItems::find(1);
        return $item->quantiy;//=$item->quantiy+$req->quantity;
        $item->update();
        return back();
    }
}
