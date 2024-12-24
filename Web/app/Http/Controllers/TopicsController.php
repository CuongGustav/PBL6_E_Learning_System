<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use App\Models\Topics;
use App\Models\Vocabularys;
use App\Models\User;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    function showTopicsAdmin(){
        $topics = Topics::all();
        return view('admin.topicPage', compact('topics'));
    }

    function deleteTopic(Request $request){
        $id_topic = $request->input('delete_topic');
        Topics::find($id_topic)->delete();
        return redirect()->route('listTopic')->with('status', 'Đã xóa thành công');
    }

    function getTopicToEdit(Request $request){
        $id_topic = $request->input('edit_topic');
        $topic = Topics::find( $id_topic);
        return view('admin.editTopicPage', compact('topic'));        
    }

    function editTopic(Request $request){
        $input = $request->all();
        $id = $request->input('id_topic');
        if ($request->hasFile('image_topic')) {
            $file = $request->file('image_topic');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
            $thumbnail = 'public/img/' . $fileName;
            $input['image_topic'] = $thumbnail;
        }    
        $topic = Topics::find($id);
        if ($topic) {
            $topic->update($input); 
        }
        return redirect()->route('listTopic')->with('status', 'Đã sửa thành công');

    }

    function addTopic(Request $request){
        $request->validate([
            'name_topic' => 'required',
            'describe_topic' => 'required',
            'image_topic' => 'required',
            
        ],
        [
            'required' => ':attribute không được để trống',
        ],// thông báo của ràng buộc
        [
            'name_topic' => 'Tên',
            'describe_topic' => 'Nội dung',
            'image_topic' => 'Ảnh',
        ] //tên
    );

        $input = $request->all();
        if ($request->hasFile('image_topic')) {
            $file = $request->file('image_topic');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
            $thumbnail = 'public/img/' . $fileName;
            $input['image_topic'] = $thumbnail;
        }    
        Topics::create($input);
        return redirect()->route('listTopic')->with('status', 'Đã thêm thành công');
    }

    function topicsToPage($username){
        $topics = Topics::all();
        return view('topicPage', compact('topics', 'username'));
    }

    function vocaToTopicPage($username,$id_topic){
        $topic = Topics::find($id_topic);
        $nameTopic = $topic->name_topic;
        $id_user = User::where('name', $username)->first()->id;
        $vocabularys = Vocabularys::where('id_topic', $id_topic)->get();
        $updatedVocabularys = [];
        foreach ($vocabularys as $vocabulary) {
            $favourite = Favourites::where([
                ['id_user', $id_user],
                ['id_voca', $vocabulary->id]
            ])->first();
        
            $vocabulary->favourite = $favourite ? $favourite->favourite : 0;
            $updatedVocabularys[] = $vocabulary;
        } 
        $vocabularys = collect($updatedVocabularys);
        return view('detailTopicPage', ['id_topic' => $id_topic], compact('vocabularys', 'nameTopic', 'username'));
    }
}
