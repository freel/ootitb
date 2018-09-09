<?php

namespace App\Http\Controllers\Admin;

use App\TestGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.test_groups.index', [
        'test_groups' => TestGroup::paginate(10)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.test_groups.create', [
        'test_group'  => [],
        'test_groups' => TestGroup::with('children')->where('parent_id', '0')->get(),
        'delimiter'   => ''
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
      TestGroup::create($request->all());
      return redirect()->route('admin.test_group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestGroup  $testGroup
     * @return \Illuminate\Http\Response
     */
    public function show(TestGroup $testGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestGroup  $testGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(TestGroup $testGroup)
    {
      return view('admin.test_groups.edit', [
        'test_group'  => $testGroup,
        'test_groups' => TestGroup::with('children')->where('parent_id', '0')->get(),
        'delimiter'           => ''
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestGroup  $testGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestGroup $testGroup)
    {
      $testGroup->update();
      return redirect()->route('admin.test_group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestGroup  $testGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestGroup $testGroup)
    {
        //
    }
}
