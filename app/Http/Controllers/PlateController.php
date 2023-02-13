<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plate;

class PlateController extends Controller
{
    //
    public function addPlates(){
        request()->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:20',
            'image' => 'required|image',
        ]);
        $data = new plate;
        $data->name=request()->name;
        $data->price=request()->price;
        $data->description=request()->description;
        $imgName=request()->file('image')->getClientOriginalName();
        // $req->file('image')->storeAs('images',$imgName);
        // $data->image=$cos;
        // $imgName = time().'.'.request()->file('image')->getClientOriginalExtension();
        request()->file('image')->move(public_path('img'), $imgName);
        $data->image=$imgName;
        $data->save();
        return redirect('/dashboard');       
    }
    // public function addPlates(){
    //     plate::create(
    //     request()->all()
    //    );
    //     return redirect('/dashboard');       
    // }

    public function getPlates(){
        $data = plate::all();
        $plateCounter= count($data);
        if (request()->route()->getName() === 'dashboard') {
            return view('dashboard',['data'=>$data,'plateCounter'=>$plateCounter]);
        } else {
        $data = plate::Paginate(3);
        return view('home',['data'=>$data,'plateCounter'=>$plateCounter]);
    }
    }

    public function deletePlate($id){
        $data =plate::find($id);
        $data->delete();
        return redirect('/dashboard');       
    }

    public function editPlate($id){
        // $data=plate::all()->where('id',$id)->first();
        $data=plate::find($id);
        return view('update',['data'=>$data]);
    }

    public function updatePlate($id){
        $data=plate::find($id);
        $data->update(request()->all());
        return redirect('/dashboard');       
    }
   
}
