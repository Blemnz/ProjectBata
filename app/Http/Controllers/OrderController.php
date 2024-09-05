<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\OrderNotif;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('status', 'pending')->orderby('created_at', 'desc' )->paginate(3);
        return view('admin.ordersPending', [
            'tittle' => 'Orders Pending',
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::where('status', 'selesai')->orderby('created_at', 'desc' )->paginate(3);
        return view('admin.ordersSelesai', [
            'tittle' => 'Orders Selesai',
            'orders' => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'nama' => 'required',
            'alamat' => 'required',
            'nomor' => 'required|numeric',
            'order' => 'required'
        ]);
        $orderItems = [];
        $orders = json_decode($request->order);
        $total = 0;
        try{
            DB::beginTransaction();
            $order = new Order;
            $order->nama = $request->nama;
            $order->alamat = $request->alamat;
            $order->email = $request->email;
            $order->nomor = $request->nomor;
            foreach ($orders as $orderItem) {
                // menghitung total harga
                $price = Product::where('id', $orderItem->id)->first();
                $itemTotal = $price->price * $orderItem->qty;
                $total += $itemTotal; 
                // save data orderItem
                $item = new ItemOrder();
                $item->qty = $orderItem->qty;       
                $item->order_id = $order->id;
                $item->product_id = $orderItem->id;
                $item->total = $orderItem->total;
                array_push($orderItems,$item);
            }
            $order->status = 'pending';
            $order->total = $total;
            $order->save();
            $order->order_items()->saveMany($orderItems);
            DB::commit();
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'nomor' => $request->nomor,
                'email' => $request->email,
            ];
            // SendMail::dispatch(new SendMail($data));
            return redirect()->to('/terkirim');
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return redirect()->back()->withErrors('Gagal Mengubah Product');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orders = Order::where('status', 'cencel')->orderby('created_at', 'desc' )->paginate(3);
        return view('admin.ordersCencel', [
            'tittle' => 'Orders Cencel',
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, string $id)
    {
        $data = Order::where('id', $id)->first();
        return view('admin.orderValidate',[
            'tittle' => 'Validasi Order',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,png'
        ]);

        if ($request->file('image')) {
            $data['bukti'] = $request->file('image')->Store('images');
        }
        try{
            DB::beginTransaction();
                // $product = new Product();
                // $product->name = $request->name;
                // $product->description = $request->description;
                // $product->price = $request->price;
                // $product->image = $request->file('image')->Store('images');
                // $product->save();
                $data['status'] = 'selesai';
                Order::where('id', $id)->update($data);
            DB::commit();
            return redirect('/dashboard/orders/pending')->with('success','Berhasil Validasi');
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return redirect()->back()->withErrors('Gagal Mengubah Product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, string $id)
    {
        $data_image = Order::where('id',$id)->first();
        Order::where('id', $id)->delete();

        return redirect()->to('dashboard/orders/cencel')->with('success','Order berhasil dihapus');
    }

    public function sender() {
        $data = [
            'nama' => 'faisal',
            'alamat' => 'dimanaaja',
            'nomor' => '123213',
            'email' => 'email@mail.com',
        ];
        SendMail::dispatch(new SendMail($data));
    }

    public function cencel(Request $request, string $id) {  
        try{
            DB::beginTransaction();
                // $product = new Product();
                // $product->name = $request->name;
                // $product->description = $request->description;
                // $product->price = $request->price;
                // $product->image = $request->file('image')->Store('images');
                // $product->save();
                $data['status'] = 'cencel';
                Order::where('id', $id)->update($data);
            DB::commit();
            return redirect('/dashboard/orders/pending')->with('success','Order cencel');
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return redirect()->back()->withErrors('Gagal Mengubah Product');
        }
    }

    public function printSelesai(string $id) {
        $data = Order::where('id', $id)->first();
        $pdf = Pdf::loadView('cetakSelesai', ['order' => $data]);
        return $pdf->stream('Order ID :'.$data->id);
    }
    public function printPending(string $id) {
        $data = Order::where('id', $id)->first();
        $pdf = Pdf::loadView('cetakPending', ['order' => $data]);
        return $pdf->stream('Order ID :'.$data->id);
    }
    public function printCencel(string $id) {
        $data = Order::where('id', $id)->first();
        $pdf = Pdf::loadView('cetakCencel', ['order' => $data]);
        return $pdf->stream('Order ID :'.$data->id);
    }
}
