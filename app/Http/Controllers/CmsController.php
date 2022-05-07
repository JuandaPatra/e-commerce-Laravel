<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CmsController extends Controller
{
    public function index()
    {
        # code...
        $stuff = Stuff::all();
        return view('admin.item', compact('stuff'));
    }

    public function addProduct()
    {
        return view('store');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required'],
            'stock' => ['required'],
            'description' => ['required', 'max:255'],
            'images' => ['mimes:jpeg,jpg,png,gif|required|max:10000'],
        ]);
        // return $request->images;

        
        $newProduct = new Stuff();
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->stock = $request->stock;
        $newProduct->description = $request->description;
        if($request->file('images')){
            $file = $request->file('images');

            $nama_file =str_replace(" ", "",time().$file->getClientOriginalName()) ;
            $file->move('images',$nama_file);
            $newProduct->images = $nama_file;
            
        }
        
        $newProduct->save();

        
        return redirect('/admin')->with('addProduct' , 'data product terbaru telah ditambah');
    }

    public function delete($id)
    {
        # code...
        // return $id;
        $stuff = Stuff::find($id);
        $res = $stuff->name;
        $stuff->delete();
        return redirect('/admin')->with('delSucces', 'Item '.$res.' berhasil di hapus');
    }

    public function edit($id)
    {
        $stuff = Stuff::find($id);
        // return $stuff;

        return view('admin.edit',compact('stuff'));
    }

    public function update(Request $request, $id)
    {
        // return $id;
        // return $request;
        $stuff = Stuff::find($id);
        $stuff->name = $request->name;
        $stuff->price = $request->price;
        $stuff->stock = $request->stock;
        $stuff->description = $request->description;
        if($request->file('images'))
        {
            $path = public_path().'/images/'.$stuff->images;
            unlink($path);

            $file = $request->file('images');

            $nama_file =str_replace(" ", "",time().$file->getClientOriginalName()) ;
            $file->move('images',$nama_file);
            $stuff->images = $nama_file;
        }
        $stuff->update();
        return redirect('/admin')->with('editSucces', 'Item berhasil di ubah');
    }
}
