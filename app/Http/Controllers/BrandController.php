<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Helper\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);
        $brand = new Brand();
        $brand->title = $request->title;
        if ($request->file('image', false)) {
            $brand->image = FileUpload::upload('brand', $request->image);
        }
        $brand->save();

        if ($request->images) {
            foreach ($request->images as $file) {
                $file_path = FileUpload::upload('brand', $file);
                $brand->media()->create(['url' => $file_path]);
            }
        }

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.update', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $brand->title = $request->title;
            if ($request->file('image')) {
                if ($brand->image) {
                    FileUpload::delete($brand->image);
                }
                $brand->image = FileUpload::upload('brand', $request->image);
            }
            $brand->save();
            if ($request->images) {
                if ($brand->media) {
                    foreach ($brand->media as $file) {
                        FileUpload::delete($file);
                    }
                    $brand->media()->delete();
                }

                foreach ($request->images as $file) {
                    $file_path = FileUpload::upload('brand', $file);
                    $brand->media()->create(['url' => $file_path]);
                }
            }

            DB::commit();
            return redirect()->route('admin.brands.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
