<?php

namespace App\Http\Controllers;

use File;
use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class PhotoContoller extends Controller
{
    public function index(){
        return view('admin.photo.index', [
            'photos' => Photo::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request){
        $rules = [
            'judul' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Gambar wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

       // Image
    //    $fileName = time() . '.' . $request->image->extension();
    //    $request->file('image')->storeAs('public/artikel', $fileName);
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()). '.'.$request->file('image')->getClientOriginalExtension();

            $img = $manager->read($request->file('image'));
            $img = $img->resize(510,510);

            $img->toJpeg(80)->save(base_path('public/storage/photo/'.$name_gen));
            $save_url = 'storage/photo/' . $name_gen;
            
        }

        Photo::create([
            'judul' => $request->judul,
            'image' => $save_url,
        ]);

        return redirect(route('photo'))->with('success', 'data berhasil di simpan');
    }

    public function update(Request $request, $id){

        $photo = Photo::find($id);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'judul' => 'required',
            'image' => $fileCheck,
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Gambar wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            
            if (\File::exists($photo->image)) {
                \File::delete($request->old_image);
            }
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()). '.'.$request->file('image')->getClientOriginalExtension();
    
                $img = $manager->read($request->file('image'));
                $img = $img->resize(510,510);
    
                $img->toJpeg(80)->save(base_path('public/storage/photo/'.$name_gen));
                $save_url = 'storage/photo/' . $name_gen;
            
        }

        if ($request->hasFile('image')) {
            $checkFileName = $save_url;
        } else {
            $checkFileName = $request->old_image;
        }

        $photo->update([
            'judul' => $request->judul,
            'image' => $checkFileName,
        ]);

        return redirect(route('photo'))->with('success', 'data berhasil di update');

    }

    public function destroy($id){
        $photo = Photo::find($id);
        if (\File::exists($photo->image)) {
            \File::delete($photo->image);
        }

        $photo->delete();

        return redirect(route('photo'))->with('success', 'data berhasil di hapus');
    }
}
