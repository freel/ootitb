<?php

namespace App\Http\Controllers\Admin;

use App\CertificationArea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificationAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.certification_areas.index', [
          'certification_areas' => CertificationArea::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * children() from App\CertificationArea.php
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certification_areas.create', [
          'certification_area'  => [],
          'certification_areas' => CertificationArea::with('children')->where('parent_id', '0')->get(),
          'delimiter'           => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CertificationArea::create($request->all());
        return redirect()->route('admin.certification_area.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CertificationArea  $certificationArea
     * @return \Illuminate\Http\Response
     */
    public function show(CertificationArea $certificationArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertificationArea  $certificationArea
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationArea $certificationArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CertificationArea  $certificationArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificationArea $certificationArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertificationArea  $certificationArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationArea $certificationArea)
    {
        //
    }
}
