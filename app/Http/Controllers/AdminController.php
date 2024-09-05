<?php

namespace App\Http\Controllers;

use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\SetWeb;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function landing() {
        $product = Product::all();
        $judul = SetWeb::Where('id', '1')->select('judul1','judul2','judul3','judul4','judul5','judul6',)->get()->first();
        $kontak = SetWeb::Where('id', '1')->select('kontakEmail','kontakNomor', 'kontakAlamat')->get()->first();
        $testimoni = Testimoni::all();
        return view('index', [
            'products' => $product,
            'judul' => $judul,
            'kontak' => $kontak,
            'testimoni' => $testimoni
        ]);
    }

    public function order() {
        $product = Product::all();
        return view('order', [
            'products' => $product
        ]);
    }

    public function index() {
        return view('admin.dashboard', [
            'tittle' => 'Dashboard',
        ]);
    }

    public function products() {

        $data = Product::all();

        return view('admin.products',[
            'tittle' => 'Products',
            'products' => $data
        ]);
    }

    public function tambahProduct() {
        return view('admin.create', [
            'tittle' => 'Create Product'
        ]);
    }
    public function editProduct($id) {
        $data = Product::where('uid', $id)->first();
        return view('admin.edit', [
            'tittle' => 'Edit Product',
            'data' => $data
        ]);
    }

    public function coba() {
        $itemOrder = Order::where('nama','faisal')->get();
        $orders = $itemOrder->order_items;
        dd($orders);
    }
}
