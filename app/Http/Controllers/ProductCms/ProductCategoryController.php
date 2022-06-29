<?php

namespace App\Http\Controllers\ProductCMS;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('cms.products.category.index', [
            'category' => ProductCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // \dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif',
        ]);

        $input = $request->all();
        $image = $request->file('image');
        $nama_image = date('d-m-Y His') . "_" . $image->getClientOriginalName();
        $tujuan_upload = 'public/category';
        $image->storeAs($tujuan_upload, $nama_image);
        $input['image'] = "$nama_image";

        ProductCategory::create($input);

        return redirect()->route('category.index')
            ->with('success_message', 'Adding category successfully');
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
        $category = ProductCategory::find($id);
        if (!$category) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.category.edit', [
            'category' => $category
        ]);
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
        $request->validate([
            'name' => 'required',
        ]);

        $data = ProductCategory::find($id);

        if ($image = $request->file('image')) {
            unlink("storage/category/" . $data->image);

            $image = $request->file('image');
            $nama_image = date('Y-m-d His') . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/category';
            $image->storeAs($tujuan_upload, $nama_image);
            $data->update([
                'image' => $nama_image,
                'name' => $request->name,
            ]);
            $data->save();
        } else {
            $data->update([
                'name' => $request->name,
            ]);
            $data->save();
        }



        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        unlink("storage/category/" . $category->image);
        $category->delete();
        return redirect()->back()->with('status', 'Delete Successfully');
    }
}
