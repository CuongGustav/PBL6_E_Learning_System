<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class ControllerTests extends Controller
{
    function showTest(){
        $tests = Test::all();
        return view('admin.testPage', compact('tests'));
    }

    function addTest(){
        $lastTest = Test::orderBy('id', 'desc')->first();
        $lastTestId = $lastTest ? $lastTest->id : 0;
        $count = $lastTestId + 1;
        Test::create([
            'NameTest' => 'Test ' . $count,
        ]);
        $tests = Test::all();
        return view('admin.testPage', compact('tests'));
    }

    function showTestUser(){
        $tests = Test::all();
        return view('testPage', compact('tests'));
    }
}
