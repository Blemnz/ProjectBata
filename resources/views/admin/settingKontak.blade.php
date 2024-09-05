

@extends('admin.partials.layout')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button"
        class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi">
          <use xlink:href="#calendar3" />
        </svg>
        This week
      </button>
    </div>
  </div>

  <form action="{{ url('dashboard/setting/kontak') }}" method="POST" >
    @csrf
    @method('PUT')
    @include('massage.massageError')
    <div class="mb-3">
      <label for="kontakEmail" class="form-label">Email</label>
      <input type="email" name="kontakEmail" class="form-control" id="kontakEmail" required value="{{ $data[0]->kontakEmail }}">  
    </div>
    <div class="mb-3">
      <label for="kontakNomor" class="form-label">Nomor Telpon</label>
      <input type="number" name="kontakNomor" class="form-control" id="kontakNomor" required value="{{ $data[0]->kontakNomor }}">
    </div>
    <div class="mb-3">
      <label for="kontakAlamat" class="form-label">Alamat</label>
      <input type="text" name="kontakAlamat" class="form-control" id="kontakAlamat" required value="{{ $data[0]->kontakAlamat }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
  
  </div>
</main>
@endsection