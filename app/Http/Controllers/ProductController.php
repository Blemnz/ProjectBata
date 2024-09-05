<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Session::flash('product', $request->product);
        Session::flash('description', $request->description);
        Session::flash('price', $request->price);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpg,png'
        ]); 

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->Store('images');
        }
        try{
            DB::beginTransaction();
                // $product = new Product();
                // $product->name = $request->name;
                // $product->description = $request->description;
                // $product->price = $request->price;
                // $product->image = $request->file('image')->Store('images');
                // $product->save();
            $product = Product::create($data);
            DB::commit();
            return redirect('/dashboard/products')->with('success','Berhasil Menambahkan Product');
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return redirect()->back()->withErrors('Gagal Membuat Product');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpg,png'
        ]);

        if ($request->hasfile('image')) {
            $data_image = product::where('id',$id)->first();
            Storage::delete($data_image->image);

            $data['image'] = $request->file('image')->store('images');

        } else {
            $data_image = product::where('id',$id)->first();
            $data['image'] = $data_image->image;
        }

        try{
            DB::beginTransaction();
                // $product = new Product();
                // $product->name = $request->name;
                // $product->description = $request->description;
                // $product->price = $request->price;
                // $product->image = $request->file('image')->Store('images');
                // $product->save();
            $product = Product::where('id', $id)->update($data);
            DB::commit();
            return redirect('/dashboard/products')->with('success','Berhasil Mengubah Product');
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return redirect()->back()->withErrors('Gagal Mengubah Product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, int $id)
    {
        $data_image = product::where('id',$id)->first();
        Storage::delete($data_image->image);
        product::where('id', $id)->delete();

        return redirect()->to('dashboard/products')->with('success','Data berhasil dihapus');
    }

}
