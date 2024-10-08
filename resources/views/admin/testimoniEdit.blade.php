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

    <form action="{{ url('dashboard/testimoni/'.$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('massage.massageError')
        <div class="mb-3">
          <label for="exampleInputProduct" class="form-label">Text</label>
          <input type="text" name="keterangan" class="form-control" id="exampleInputProduct" required value="{{ $data->keterangan }}">  
        </div>
          @if ($data->image)
              <div class="col-md-4">
                <img src="{{ asset('storage/'. $data->image) }}" style="max-width: 10rem; " alt="">
              </div>
          @endif
          <div class="mb-3">
            <label for="exampleInputPhoto" class="form-label">Photo</label>
            <input type="file" name="image" class="form-control" id="exampleInputPhoto">
          </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </main>
@endsection
