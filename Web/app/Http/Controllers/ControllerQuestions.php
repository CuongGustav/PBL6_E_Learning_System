<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ControllerQuestions extends Controller
{
    function showQuestion($id_test){
        $questions = Question::where('id_test', $id_test)->get();
        return view('admin.detailQuestion', compact('questions', 'id_test'));
    }

    function addPage($id_test){
        return view('admin.addQuestion', compact('id_test'));
    }

    function submitAdd(Request $request, $id_test){
        $input = $request->all();
        $input['id_test'] = $id_test;
        Question::create($input);
        return redirect()->route('detailQuestion', ['id_test' => $id_test])->with('status', 'Đã thêm thành công.');
    }

    function editPage($id_question){
        $question = Question::find($id_question);
        return view('admin.editQuestion', compact('question'));
    }

    function submitEdit(Request $request, $id_question){
        $input = $request->all();
        $question = Question::find($id_question);
        if($question){
            $question->update($input);
        };
        return redirect()->route('detailQuestion', ['id_test' => $question->id_test])->with('status', 'Đã cập nhật thành công.'); 
    }

    function submitDelete($id_question, $id_test){
        Question::find($id_question)->delete();
        return redirect()->route('detailQuestion', ['id_test' => $id_test])->with('status', 'Đã xóa thành công.');
    }

    function showQuestionUser($id_test){
        $questions = Question::where('id_test', $id_test)->get();
        return view('questionOfTestPage', compact('questions', 'id_test'));
    }
}
