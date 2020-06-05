<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Promotion;
use File;
use Image;


class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::orderBy('created_at','DESC')->paginate(10);
        return view('promo.index', compact('promotion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promo.create');
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
           
            'promo_title' => 'required|string|max:100',
            'promo_desc' => 'nullable|string|max:100',
            'date_range' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            
        ]);

        try {
            //default $photo = null
            $photo = null;
            //jika terdapat file (Foto / Gambar) yang dikirim
            if ($request->hasFile('photo')) {
                //maka menjalankan method saveFile()
                $photo = $this->saveFile($request->promo_title, $request->file('photo'));
            }
            
            $dateS = $request->date_start;
            $dateE = $request->date_end;


            

            $start_date  = date("Y-m-d", strtotime($dateS));
           
            $end_date  = date("Y-m-d", strtotime($dateE));
            

            $promo = Promotion::create([

                'promo_title' => $request->promo_title,
                'promo_desc' => $request->promo_desc,
                'image' => $photo,
                'promo_start_date' => $start_date,
                'promo_end_date' =>$end_date,
            ]);
            
            //jika berhasil direct ke produk.index
            return redirect(route('promo.index'))
                ->with(['success' => '<strong>' . $promo->promo_title . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya kemudian tampilkan error
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }



    private function saveFile($name, $photo)
    {
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        
        $path = public_path('uploads/promo');
        
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->save($path . '/' . $images);

        return $images;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $promo = Promotion::findOrFail($id);
        return view('promo.edit', compact('promo'));
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
           
            'promo_title' => 'required|string|max:100',
            'promo_desc' => 'nullable|string|max:100',
            'date_range' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            
        ]);

        try {
            $promo = Promotion::findOrFail($id);
            $photo = $promo->image;
            //jika terdapat file (Foto / Gambar) yang dikirim
            if ($request->hasFile('photo')) {
                
                  
                !empty($photo) ? File::delete(public_path('uploads/promo/' . $photo)):null;

                $photo = $this->saveFile($request->promo_title, $request->file('photo'));
            }
            
            $dateS = $request->date_start;
            $dateE = $request->date_end;


            

            $start_date  = date("Y-m-d", strtotime($dateS));
           
            $end_date  = date("Y-m-d", strtotime($dateE));
            

            $promo->update([

                'promo_title' => $request->promo_title,
                'promo_desc' => $request->promo_desc,
                'image' => $photo,
                'promo_start_date' => $start_date,
                'promo_end_date' =>$end_date,
            ]);
            
            //jika berhasil direct ke produk.index
            return redirect(route('promo.index'))
                ->with(['success' => '<strong>' . $promo->promo_title . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya kemudian tampilkan error
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
        $promos = Promotion::findOrFail($id);
        
        if (!empty($promos->image)) {
            
            File::delete(public_path('uploads/promo/' . $promos->image));
        }

        $promos->delete();
        return redirect()->back()->with(['success' => '<strong>' . $promos->promo_title . '</strong> Telah Dihapus!']);
    }    
}

