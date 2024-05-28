<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CloudinaryStorage;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $image = Image::all();
        return response()->json([
            "data" => $image
        ]);
    }

    public function create()
    {
        return view('upload_create');
    }

    public function store(Request $request)
    {
        $image  = $request->file('gambar');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        Image::create([
            "nama" => $request->nama,
            'gambar' => $result]);

            return response()->json([
            "message" => "data berhasil di tambah"
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Image $image)
    {
        return view('upload_update', compact('gambar'));
    }

    public function update(Request $request, Image $image)
    {
        $file   = $request->file('gambar');
        $result = CloudinaryStorage::replace($image->image, $file->getRealPath(), $file->getClientOriginalName());
        $image->update([
            "nama" => $request->nama,
            'gambar' => $result]);
        return response()->json([
            "message" => "Berhasil di update"
        ]);
    }

    public function destroy(Image $image)
    {
        CloudinaryStorage::delete($image->image);
        $image->delete();
        return response()->json([
            "message" => "data berhasil di hapus"
        ]);
    }
}
    