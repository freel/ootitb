<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_management.professions.index', [
          'professions' => Profession::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_management.professions.create', [
          'profession' => []
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
        Profession::create($request->all());
        return redirect()->route('admin.user_management.profession.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
      return view('admin.user_management.professions.edit', [
        'profession' => $profession,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        $profession->update($request->all());
        return redirect()->route('admin.user_management.profession.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        //
    }
}
