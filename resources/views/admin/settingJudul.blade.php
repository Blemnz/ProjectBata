
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

  <form action="{{ url('dashboard/setting/judul') }}" method="POST" >
    @csrf
    @method('PUT')
    @include('massage.massageError')
    <div class="mb-3">
      <label for="judul1" class="form-label">Judul Baris 1</label>
      <input type="text" name="judul1" class="form-control" id="judul1" required value="{{ $data[0]->judul1 }}">  
    </div>
    <div class="mb-3">
      <label for="judul2" class="form-label">Judul Baris 2</label>
      <input type="text" name="judul2" class="form-control" id="judul2" required value="{{ $data[0]->judul2 }}">
    </div>
    <div class="mb-3">
        <label for="judul3" class="form-label">Judul Baris 3</label>
        <input type="text" name="judul3" class="form-control" id="judul3" required value="{{ $data[0]->judul3 }}">  
      </div>
      <div class="mb-3">
        <label for="judul4" class="form-label">Judul Baris 4</label>
        <input type="text" name="judul4" class="form-control" id="judul4" required value="{{ $data[0]->judul4 }}">
      </div>
      <div class="mb-3">
        <label for="judul5" class="form-label">Judul Baris 5</label>
        <input type="text" name="judul5" class="form-control" id="judul5" required value="{{ $data[0]->judul5 }}">  
      </div>
      <div class="mb-3">
        <label for="judul6" class="form-label">Judul Baris 6</label>
        <input type="text" name="judul6" class="form-control" id="judul6" required value="{{ $data[0]->judul6 }}">
      </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
  
  </div>
</main>
@endsection