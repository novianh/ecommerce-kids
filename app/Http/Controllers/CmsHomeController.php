<?php

namespace App\Http\Controllers;

use App\Models\CmsHome;
use Illuminate\Http\Request;

class CmsHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('dashboard.homePage');
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
            'title'=>'required',
        ],
        [ 'title.required' => 'Wajib Diisi']);

        return \redirect(\route('home.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CmsHome  $cmsHome
     * @return \Illuminate\Http\Response
     */
    public function show(CmsHome $cmsHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CmsHome  $cmsHome
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsHome $cmsHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CmsHome  $cmsHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsHome $cmsHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CmsHome  $cmsHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsHome $cmsHome)
    {
        //
    }
}
