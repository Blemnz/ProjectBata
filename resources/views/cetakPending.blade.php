<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
        <p style="position:absolute; top:25%; left:15%; font-size:7rem; padding:10px 20px; color:rgba(255,144,0,0.31); transform:rotate(20deg); font-weight:bold;">PENDING</p>

        <h1 style="text-align: center; margin:0,5rem 0;">3 Cahaya Utama</h1>
        <hr>
        <h5>Order id : {{ $order->id }}</h5>
        <h5>Nama : {{ $order->nama }}</h5>
        <h5>Alamat : {{ $order->alamat }}</h5>
        <h5>Nomor Telpon : {{ $order->nomor }}</h5>
        <h5>Tanggal Order : {{ $order->created_at }}</h5>
        <hr style="margin-bottom: 1rem;">
        <table style="width: 90%;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>                
            </thead>
            <tbody>
                @foreach ($order->order_items as $item)
                    <tr>
                        @foreach ($item->products as $product)
                            <td style="text-align: center">{{ $product->name }}</td>
                        @endforeach
                        <td style="text-align: center">{{ $item->qty }}</td>
                        <td style="text-align: center">Rp.{{ number_format($item->total) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr style="margin-top: 1rem; margin-bottom:1rem;">
        <div style="display: flex; justify-content:end;">
            <h5>Total : Rp.{{ number_format($order->total) }}</h5>
        </div>


</body>
</html>