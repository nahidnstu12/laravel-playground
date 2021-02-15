<?php

namespace App\Http\Controllers\MultiAuth;

use App\Dress;
use App\Product;
Use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function show(){
        return view('multiauth.admindashboard');
    }
    public function userlist_show(){
        return view('multiauth.admin_userlist');
    }

    public function getDresses(){
        $data = [];
        $data['dresses'] = Dress::with('brand')->whereStatus(1)->latest()->limit(10)->get();
        $data['brand_list'] = Brand::whereStatus(1)->latest()->get();
        // $data['dress_list'] = null;
        // dd($data);
        return view('multiauth.admindashboard')->with($data);
    }
    public function addDress(Request $request){
        $data = [];
        $data['brand_list'] = Brand::whereStatus(1)->latest()->get();
        $rules = [
            'dress_name' => 'required|unique:dresses',
            'quantity' => 'required',
            'price' => 'required',
            'brand_id'=> 'required'
        ];
        $validated = $this->validate($request,$rules);
        $dress = new Dress();
        $dress->dress_name = $request->dress_name;
        $dress->quantity = $request->quantity;
        $dress->prices = $request->price;
        $dress->status = 1;
        $dress->brand_id = $request->brand_id;
        $dress->user_id = auth()->user()->id;
        $dress->save();
        // dd($request->all());
        // dd($dress);
        // Dress::create($validated);
        $data['status'] = "Successfully added";
        $data['dresses'] = Dress::with('brand')->whereStatus(1)->latest()->limit(10)->get();
        return view('multiauth.admindashboard')->with($data);
    }
    public function searchDress(Request $req){
        $data = [];
        $data['brand_list'] = Brand::whereStatus(1)->latest()->get();
        // $data['dresses'] = null;
        $search = $req->search;
        if($search){
            $data['dresses'] = Dress::with('brand')->where('dress_name', 'LIKE', '%' . $search . '%')->latest()->get();
            // dd($data);
            return view('multiauth.admindashboard')->with($data);
        }
        
        // dd($data);
        
    }
    public function deleteDress(Dress $dress){
        // dd($dress);
        $data = [];
        $data['brand_list'] = Brand::whereStatus(1)->latest()->get();
        $dress->delete();
        $data['status'] = "Successfully deleted";
        $data['dresses'] = Dress::with('brand')->whereStatus(1)->latest()->limit(10)->get();
        return redirect()->route('admin.dress')->with($data);
    }
    public function getProducts(){
        $data = [];
        
        $data['products'] = Product::with('category')->get();
        // dd($data);
        return view('multiauth.adminproductboard')->with($data);
    }

}
