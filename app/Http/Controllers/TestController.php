<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestGroup;

class TestController extends Controller
{
    public function index($parent_id = '0'){
        $test_groups = TestGroup::where('parent_id', $parent_id)->paginate(8);
        return view('test.index', ['test_groups'=>$test_groups]);
    }
}
