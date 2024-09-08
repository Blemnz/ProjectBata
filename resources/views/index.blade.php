<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bataringan</title>
    <!-- style -->
    <link rel="stylesheet" href="src/css/main.css">
    <!-- icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="navbar">
        <div class="navbrand">
            <img src="asset/img/logo.png" alt="" width="90" height="60">
        </div>
        <div class="navlinks">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#product">Produk</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </div>
        <div class="extra">
            <i data-feather="menu" id="menu"></i>
            <a href="{{ url('/pesan') }}"><i data-feather="shopping-cart" id="cart"></i></a>
        </div>
        <div class="sidebar">
            <i data-feather="x" class="clsbtn"></i>
            <div class="side-link">
                <a href="#hero">Home</a>
                <a href="#product">Produk</a>
                <a href="#contact">Kontak</a>
                <a href="{{ url('/pesan') }}"><i data-feather="shopping-cart"></i></a>
            </div>
        </div>
    </header>
    <section class="hero" id="hero">
        <div class="text">
            <h1>{{ $judul->judul1 ?? ''}}</h1>
            <h1>{{ $judul->judul2 ?? ''}}</h1>
            <h1>{{ $judul->judul3 ?? ''}}</h1>
            <h1>{{ $judul->judul4 ?? ''}}</h1>
            <h1>{{ $judul->judul5 ?? ''}}</h1>
            <h1>{{ $judul->judul6 ?? ''}}</h1>
        </div>
    </section>
    <section class="product" id="product">
        <h1>PRODUK</h1>
        <div class="card-container">
            @foreach ($products as $product)
                <div class="card">
                    <img src="{{ asset('storage/'. $product->image) }}" alt="">
                    <div class="contents">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p>Rp.{{ number_format($product->price) }}</p>
                        <button class="btn order-prod" data-product="{{ $product }}" style="color:#fff">Pesan</button>
                        {{-- <button><a href="{{ url('/pesan') }}" product-data="{{ $product }}">Pesan</a></button> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="contact" id="contact">
        <h1>KONTAK<span>KAMI</span></h1>
        <div class="grid-container">
            <div class="map" id="map">
                
            </div>
            <div class="kontak">
                <h2>Kontak</h2>
                <h3>Email: {{ $kontak->kontakEmail ?? ''}}</h3>
                <h3>Nomor telpon : {{ $kontak->kontakNomor ??''}}</h3>
                <h3>Alamat : {{ $kontak->kontakAlamat ?? ''}}</h3>
                <div class="whatsapp">
                    <img src="asset/img/wa.png" alt="" width="20">
                    <a href="">Whatsapp</a>
                </div>
            </div>
        </div>
    </section>
    <section class="testimoni">
        <h1>TESTIMONI</h1>
        @foreach ($testimoni as $testi)
        <div class="grid-testi">
            <div class="card-testi">
                <img src="{{ asset('storage/'.$testi->image) }}" alt="">
                <div class="contents-testi">
                    <p>{{ $testi->keterangan }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    <footer id="footer">
        <div class="nav-footer">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Produk</a></li>
                <li><a href="">Kontak</a></li>
                <li><a href="">Testimoni</a></li>
            </ul>
        </div>
        <div class="credit">
            <p>Created By Zenamudin | &copy; 2024</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- icon -->
    <script>
        feather.replace();
        $(document).ready(function(){
            var baseUrl = window.location.href;
            $('.order-prod').on('click',function(){
                const data = $(this).data('product');
                localStorage.setItem('ordered-product',JSON.stringify(data));
                window.location.href = baseUrl + 'pesan';
            });
        })
    </script>
    <!-- dom -->
    <script src="src/js/dom.js"></script>
</body>

</html>