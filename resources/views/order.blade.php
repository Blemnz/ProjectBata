<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: poppins, sans-serif;
            background-color: rgb(252, 248, 255);
        }
    </style>
</head>

<body>
    <div class="m-3 d-flex align-items-center">
        <img src="asset/img/logo.png" alt="" width="80px" class="mx-2">
        <h1>Form Untuk Pemesanan</h1>
    </div>
    <div class="container-fluid" x-data="products">
        <div class="card">
            <div class="card-body">
                <h2>Pesanan</h2>
                <div class="d-flex justify-content-center align-items-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        &plus; Tambah Produk
                    </button>
            
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content" x-data>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Produk</h1>
                                    <i data-feather="shopping-cart" class="modal-title fs-5 mx-2"></i>
                                    <p class="modal-title quantity d-none" style="font-size: 10px; background-color: red; color: white; padding: 3px 5px; border-radius: 25%; position: absolute; left: 160px; top: 5px;" ></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($products as $product)
                                        <div class="card m-3">
                                            <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="..." style="background-size: cover; background-position: center; width: 100%; height: 250px;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <p class="card-text">{{ $product->description }}</p>
                                                <p class="card-text" >Rp {{ number_format($product->price,0) }}</p>
                                                <button type="button" class="btn btn-primary add-item" data-product="{{$product}}">Tambah</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
                <div class="container-fluid notif d-none">
                    <p data-feather="shopping-cart"></p>
                    <p style="position: absolute; top:100px; left:50px; background-color:red;padding:5px 8px; font-size:10px; color:white; border-radius:5px;" class="quantity"></p>
                </div>
                <div class="cart-container">
                        
                </div>
                <div class="card-template d-none">
                    <div class="card-body d-flex align-items-center">
                        <img class="product-img" src="" alt="" style="width: 100px; height: 100px;">
                        <div class="container-fluid">
                            <h4 class="card-tittle product-name"></h4>
                            <div class="d-flex justify-content-start align-items-center">
                                <button class="btn btn-danger mx-1 remove" style="padding: 5px 8px" data-product="">&minus;</button>
                                <p class="cart-text item-qty"></p>
                                <button class="btn btn-primary mx-1 add" style="padding: 5px 8px" data-product="">&plus;</button>
                            </div>
                            <p class="mx-1" style="font-size: 1rem;">Total : <span class="total-price"></span></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center my-3 display d-none" >
                    <p>Total Harga = <span class="total-harga"></span></p>
                </div>
                <form method="POST" action="{{ url('/pesan/kirim') }}">
                    @csrf
                    @include('massage.massageError')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Kirim</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" name="nomor" id="nomor" required>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="order" id="order" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- icon -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="src/js/dataProduct.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>