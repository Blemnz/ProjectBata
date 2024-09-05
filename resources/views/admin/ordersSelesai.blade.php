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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i data-feather="image"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body d-flex justify-content-center">
                            <img src="{{ asset('storage/'.$order->bukti) }}" alt="" width="250">
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="{{ url('order/cetakSelesai/'.$order->id) }}" class="btn btn-primary"><i data-feather="printer"></i></a>
                </td>
            </tr>
            <tr>
              <td colspan="4">
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col">Products</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total</th>
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

