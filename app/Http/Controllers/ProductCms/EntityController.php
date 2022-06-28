<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\Product;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $entity = Product::find($id);
        if (!$entity) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.entity', [
            'entity' => $entity
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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'required',
            'size' => 'required',
        ]);

        $input = $request->all();

        Entity::create($input);

        return redirect()->route('product.show', $request->product_id)
            ->with('success_message', 'Add new entity successfully');
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
        $entity = Entity::find($id);
        if ($entity == \null) {
            return redirect()->route('entity.index', $entity->id_product)
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.entity.edit', [
            'entity' => $entity,
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
            'id' => 'required',
            'product_id' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        $entity = Entity::find($id);
        $input = $request->all();
        $entity->update($input);

        return redirect()->route('product.show', $entity->product_id)
            ->with('success_message', 'Update entity successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = Entity::find($id);
        $entity->delete();

        return redirect()->back()
            ->with('success_message', 'Delete entity successully');
    }
}
