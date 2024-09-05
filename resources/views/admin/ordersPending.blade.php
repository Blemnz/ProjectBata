@extends('admin.partials.layout')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $tittle }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
          <svg class="bi"><use xlink:href="#calendar3"/></svg>
          This week
        </button>
      </div>
    </div>

    @include('massage.massageError')
    <div class="table-responsive">
      <table class="table table-striped  table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Order_id</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor Telpon</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->nama }}</td>
                <td>{{ $order->alamat }}</td>
                <td>{{ $order->nomor }}</td>
                <td>{{ $order->email }}</td>
                <td>
                    <a href="{{ url('/dashboard/orders/'.$order->id.'/validate') }}" class="btn btn-primary"> <i data-feather="check"></i></a>
                    <a href="{{ url('/order/cetakPending/'.$order->id) }}" class="btn btn-primary"> <i data-feather="printer"></i></a>
                    <form class="d-inline" onsubmit="return confirm('Yakin akan cencel order?')"  action="{{ url('dashboard/orders/cencel/'.$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger"><i data-feather="x-square"></i></button>
                    </form>
                </td>
            </tr>
            <tr>
              <td colspan="4">
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col">Products</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total Item</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($order->order_items as $item)
                          <tr>
                            @foreach ($item->products as $product)
                                <td>{{ $product->name }}</td>
                            @endforeach
                            <td>{{ $item->qty }}</td>
                            <td>Rp.{{ number_format($item->total) }}</td>
                          </tr>
                        @endforeach
                        <tr>
                          <th scope="col">Total :</th>
                          <td>Rp.{{ number_format($order->total) }}</td>
                        </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{ $orders->links() }}
    </div>
  </main>
@endsection

