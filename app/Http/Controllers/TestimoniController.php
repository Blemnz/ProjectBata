<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Testimoni::all();
        return view('admin.testimoni',[
            'tittle' => 'Testimoni',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimoniCreate',[
            'tittle' => 'Create Testimoni'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('text', $request->text);

        $data = $request->validate([
            'keterangan' => 'required',
            'image' => 'required|mimes:jpg,png'
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->Store('images');
        }

        Testimoni::create($data);

        return redirect()->to('dashboard/testimoni
        ')->with('success','Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimoni $testimoni, int $id)
    {
        $data = Testimoni::where('id', $id)->first();
        return view('admin.testimoniEdit', [
            'tittle' => 'Edit Testimoni',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'keterangan' => 'required',
            'image' => 'required|mimes:jpg,png'
        ]);

        if ($request->hasfile('image')) {
            $data_image = Testimoni::where('id',$id)->first();
            Storage::delete($data_image->image);

            $data['image'] = $request->file('image')->store('images');

        } else {
            $data_image = Testimoni::where('id',$id)->first();
            $data['image'] = $data_image->image;
        }

        Testimoni::where('id',$id)->update($data);
        return redirect()->to('dashboard/testimoni
        ')->with('success','Berhasil Mengedit data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni, int $id)
    {
        $data_image = Testimoni::where('id',$id)->first();
        Storage::delete($data_image->image);
        Testimoni::where('id', $id)->delete();

        return redirect()->to('dashboard/testimoni')->with('success','Data berhasil dihapus');
    }
}
