<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestGroup;

class TestController extends Controller
{
    public function index(){
        $test_groups = TestGroup::where('parent_id', '0')->paginate(4);
        return view('test.index', ['test_groups'=>$test_groups]);
    }
}
