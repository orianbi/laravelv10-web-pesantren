<?php

namespace App\Http\Controllers;

use File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;


class BlogController extends Controller
{
    public function index(){
        return view('admin.blog.index',[
            'artikels' => Blog::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function store(Request $request){
        $rules = [
            'judul' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
            'desc' => 'required|min:20',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Gambar wajib diisi!',
            'desc.required' => 'Diskripsi wajib diisi!',
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

            $img->toJpeg(80)->save(base_path('public/storage/artikel/'.$name_gen));
            $save_url = 'storage/artikel/' . $name_gen;
            
        }

        # Artikel
        // $storage = "storage/content-artikel";
        // $dom = new \DOMDocument();

        # untuk menonaktifkan kesalahan libxml standar dan memungkinkan penanganan kesalahan pengguna.
        // libxml_use_internal_errors(true);
        // $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        # Menghapus buffer kesalahan libxml
        // libxml_clear_errors();

        # Baca di https://dosenit.com/php/fungsi-libxml-php
        // $images = $dom->getElementsByTagName('img');

        // foreach ($images as $img) {
        //     $src = $img->getAttribute('src');
        //     if (preg_match('/data:image/', $src)) {
        //         preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        //         $mimetype = $groups['mime'];
        //         $fileNameContent = uniqid();
        //         $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
        //         $filePath = ("$storage/$fileNameContentRand.$mimetype");
        //         $img = Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
        //         $new_src = asset($filePath);
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', $new_src);
        //         $img->setAttribute('class', 'img-responsive');
        //     }
        // }
        // Blog::create([
        //     'judul' => $request->judul,
        //     'slug' => Str::slug($request->judul, '-'),
        //     'image' => $fileName,
        //     'desc' => $dom->saveHTML(),
        // ]);

        Blog::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'image' => $save_url,
            'desc' => $request->desc,
        ]);

        return redirect(route('blog'))->with('success', 'data berhasil di simpan');
    }

    public function edit($id){
        $artikel = Blog::find($id);
        return view('admin.blog.edit',[
            'artikel' => $artikel
        ]);
    }

    public function update(Request $request, $id){

        $artikel = Blog::find($id);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'judul' => 'required',
            'image' => $fileCheck,
            'desc' => 'required|min:20',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Gambar wajib diisi!',
            'desc.required' => 'Diskripsi wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists($artikel->image)) {
                \File::delete($request->old_image);
            }
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()). '.'.$request->file('image')->getClientOriginalExtension();

            $img = $manager->read($request->file('image'));
            $img = $img->resize(510,510);

            $img->toJpeg(80)->save(base_path('public/storage/artikel/'.$name_gen));
            $save_url = 'storage/artikel/' . $name_gen;
        }

        if ($request->hasFile('image')) {
            $checkFileName = $save_url;
        } else {
            $checkFileName = $request->old_image;
        }

        // Artikel
        // $storage = "storage/content-artikel";
        // $dom = new \DOMDocument();
        // libxml_use_internal_errors(true);
        // $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        // libxml_clear_errors();

        // $images = $dom->getElementsByTagName('img');

        // foreach ($images as $img) {
        //     $src = $img->getAttribute('src');
        //     if (preg_match('/data:image/', $src)) {
        //         preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        //         $mimetype = $groups['mime'];
        //         $fileNameContent = uniqid();
        //         $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
        //         $filePath = ("$storage/$fileNameContentRand.$mimetype");
        //         $img = Image::make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filePath));
        //         $new_src = asset($filePath);
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', $new_src);
        //         $img->setAttribute('class', 'img-responsive');
        //     }
        // }

        $artikel->update([
            'judul' => $request->judul,
            'image' => $checkFileName,
            'desc' => $request->desc,
        ]);

        return redirect(route('blog'))->with('success', 'data berhasil di update');
    }

    public function destroy($id){

        $artikel = Blog::find($id);
        if (\File::exists($artikel->image)) {
            \File::delete($artikel->image);
        }

        $artikel->delete();

        return redirect(route('blog'))->with('success', 'data berhasil di hapus');
    }
}
