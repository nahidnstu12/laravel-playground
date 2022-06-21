<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products.index")->with("products",$products);
    }
    public function create(Request $request)
    {
        // $rules = [
        //     "title"=>"required|min:3|max:20",
        //     "price"=>"required|number"
        // ]
        // $customMSG = [
        //     "title.required"=>"Title daw",
        //     "title.min"=>"use more chars",
        //     "price.number"=>"used number only"
        // ]
        // $this->validate($request, $rules, $customMSG);

        $product = Product::create($request->all());
        return Response::json($product);
    }
    public function single($id)
    {
        $product = Product::find($id);
        return Response::json($product);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category = $request->category;

        $product->save();
        return Response::json($product);
    }
    public function destroy(Request $request,$id)
    {
        $product = Product::destroy($id);
        return Response::json($product);
    }

    // using datatables (another approach)
    public function index2()
    {
        $products = Product::all();
        return view("products.data-table")->with("products",$products);
    }
    public function create2(Request $request)
    {
        $product = Product::create($request->all());
        return Response::json($product);
    }
    public function single2($id)
    {
        $product = Product::find($id);
        return Response::json($product);
    }
    public function update2(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category = $request->category;

        $product->save();
        return Response::json($product);
    }
    public function destroy2(Request $request,$id)
    {
        $product = Product::destroy($id);
        return Response::json($product);
    }
    public function courseCertificate()
    {
        $data = [
            'name' => 'Rahul Amin Hawladar',
            'certificate_text' => 'Course Certificate Assessment',
            'small_text' => 'Certificate To',
            'created_at' => '28th July,2021',
            'profile-pic' => 'certificate-demo-1.png',
            'text' => 'has successfully completed Fundamental Computer Course an online non-credit course authorized by SomeoneTraining Service'
        ];

        // return view('course-certificate', compact('data'));
        $html = view('course-certificate', compact('data'))->render();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laratutorials.pdf');
        // \Illuminate\Support\Facades\Storage::put('pdf/invoice.pdf', $pdf->output());
        // $certificatePath = \Illuminate\Support\Facades\Storage::path('pdf/invoice.pdf');
        //$pdf->stream();
        //auth()->user()->notify(new \App\Notifications\CertificationNotification($certificatePath));
        // return "Done";

    }
}