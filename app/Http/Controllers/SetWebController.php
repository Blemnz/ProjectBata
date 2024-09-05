<?php

namespace App\Http\Controllers;

use App\Models\SetWeb;
use Illuminate\Http\Request;

class SetWebController extends Controller
{
    public function setJudul() {

        $data = SetWeb::all();
        return view('admin.settingJudul', [
            'tittle' => 'Setting Judul',
            'data' => $data
        ]);
    }

    public function upJudul(Request $request) {
        $data = $request->validate([
            'judul1' => 'required',
            'judul2' => 'required',
            'judul3' => 'required',
            'judul4' => 'required',
            'judul5' => 'required',
            'judul6' => 'required',
        ]);

        SetWeb::where('id', '1')->update($data);

        return redirect()->back()->with('success', 'Berhasil Mengubah data');
    }

    public function setMap() {

        $data = SetWeb::all();
        return view('admin.settingMap', [
            'tittle' => 'Setting Map',
            'data' => $data
        ]);
    }

    public function upMap(Request $request) {
        $data = $request->validate([
            'map' => 'required',
        ]);

        SetWeb::where('id', '1')->update($data);

        return redirect()->back()->with('success', 'Berhasil Mengubah data');
    }

    public function setKontak() {

        $data = SetWeb::all();
        return view('admin.settingKontak', [
            'tittle' => 'Setting Kontak',
            'data' => $data
        ]);
    }

    public function upKontak(Request $request) {
        $data = $request->validate([
            'kontakEmail' => 'required|email:dns',
            'kontakNomor' => 'required|numeric',
            'kontakAlamat' => 'required'
        ]);

        SetWeb::where('id', '1')->update($data);

        return redirect()->back()->with('success', 'Berhasil Mengubah data');
    }
}
