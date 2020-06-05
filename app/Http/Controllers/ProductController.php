<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('kategori')->orderBy('created_at', 'DESC')->paginate(10);
        return view('products.index',compact('product'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           
            'product_name' => 'required|string|max:100',
            'short_desc' => 'nullable|string|max:100',
            'long_desc' => 'nullable|string|max:500',
            'price' => 'required|integer',
            'unit' => 'required|integer',
            'category' => 'required|exists:category,id',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            'color' => 'required|string|max:100',
            'status' => 'required|string|max:100',
        ]);

        try {
            //default $photo = null
            $photo = null;
            //jika terdapat file (Foto / Gambar) yang dikirim
            if ($request->hasFile('photo')) {
                //maka menjalankan method saveFile()
                $photo = $this->saveFile($request->name, $request->file('photo'));
            }
            
            
            $product = Product::create([

                'category' => $request->category,
                'product_name' => $request->product_name,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'image' => $photo,
                'color' => $request->color,
                'price' => $request->price,
                'unit'  => $request->unit,
                'status' => $request->status
            ]);
            
            //jika berhasil direct ke produk.index
            return redirect(route('product.index'))
                ->with(['success' => '<strong>' . $product->product_name . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya kemudian tampilkan error
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    private function saveFile($name, $photo)
    {
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        
        $path = public_path('uploads/product');
        
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->save($path . '/' . $images);

        return $images;
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           
            'product_name' => 'required|string|max:100',
            'short_desc' => 'nullable|string|max:100',
            'long_desc' => 'nullable|string|max:500',
            'price' => 'required|integer',
            'unit' => 'required|integer',
            'category' => 'required|exists:category,id',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            'color' => 'required|string|max:100',
            'status' => 'required|string|max:100',
        ]);

        try {
            $product = Product::findOrfail($id);
            $photo   = $product->image;

            if($request->hasFile('photo')) {
                
                !empty($photo) ? File::delete(public_path('uploads/product/' . $photo)):null;
                
                $photo = $this->saveFile($request->product_name, $request->file('photo'));
            }

            $product->update([

                'category' => $request->category,
                'product_name' => $request->product_name,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'image' => $photo,
                'color' => $request->color,
                'price' => $request->price,
                'unit'  => $request->unit,
                'status' => $request->status
            ]);
            
            return redirect(route('produk.index'))
            ->with(['success' => '<strong>' . $product->product_name . '</strong> Diperbaharui']);
        } 
        catch (\Exception $e) {
                return redirect()->back()
                    ->with(['error' => $e->getMessage()]);
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //query select berdasarkan id
        $products = Product::findOrFail($id);
        //mengecek, jika field photo tidak null / kosong
        if (!empty($products->image)) {
            //file akan dihapus dari folder uploads/produk
            File::delete(public_path('uploads/product/' . $products->image));
        }
        //hapus data dari table
        $products->delete();
        return redirect()->back()->with(['success' => '<strong>' . $products->product_name . '</strong> Telah Dihapus!']);
        }
}
