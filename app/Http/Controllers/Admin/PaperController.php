<?php

namespace App\Http\Controllers\Admin;

use App\Paper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //TODO выдача по группам
        return view('admin.papers.index', [
          'papers' => Paper::with('category:title')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.papers.create', [
          'paper' => [],
          'categeries' => Category::with('children')->where('parent_id', '0')->get(),
          'delimiter'   => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @
     */
    public function store(Request $request)
    {
        $category = Category::where('id', $request->category_id)->first();
        for ($paper_index = 1; $paper_index <= $request->paper_num; ++$paper_index){
          $paper = $category->papers()->create([
            'paper_index'   => $paper_index,
          ]);
        }
        return redirect()->route('admin.paper.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        return view('admin.papers.edit', [
          'paper' => $paper,
          'categories' => Category::with('children')->where('parent_id', '0')->get(),
          'delimiter'   => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
      $paper->update($request->all());
      return redirect()->route('admin.paper.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //
    }
}
