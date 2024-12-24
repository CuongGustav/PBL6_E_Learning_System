<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerQuestions;
use App\Http\Controllers\ControllerTests;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('header');
})->name('header');

Route::get('/homePage', function () {
    return view('homePage');
})->name('homePage');

Route::get('/translatePage', function () {
    return view('translatePage');
})->name('translatePage');

Route::get('/dictionaryPage', function () {
    return view('dictionaryPage');
})->name('dictionaryPage');

Route::get('user/topicPage/{username}', [TopicsController::class, 'topicsToPage'])->name('topicPage');

Route::get('user/topicPage/vocabulary/{username}/{id_topic}', [TopicsController::class, 'vocaToTopicPage'])->name('detailtopicPage');

//login
Route::get('user/login', function () {
    return view('loginPage');
})->name('loginPage');
Route::get('user/signup', function () {
    return view('signupPage');
})->name('signupPage');
Route::post('user/login', [AccountController::class, 'login']);

//signup
Route::post('user/signin', function(){
    return redirect()->route('signupPage');
});
Route::post('user/signup', function(){
    return redirect()->route('loginPage');
});
Route::post('user/register', [AccountController::class, 'register']);

//admin
Route::get('admin/homepage/{username}', [AccountController::class, 'adminPage'])->name('adminHomePage');
Route::get('admin/topic/add', function(){
    return view('admin.addTopicPage');
})->name('addTopicPage');

Route::get('admin/listtopic', [TopicsController::class, 'showTopicsAdmin'])->name('listTopic');
Route::post('admin/topic/delete', [TopicsController::class, 'deleteTopic']);
Route::post('admin/topic/edit', [TopicsController::class, 'getTopicToEdit']);
Route::post('admin/topic/edit/submit', [TopicsController::class, 'editTopic']);
Route::post('admin/topicadd', function(){
    return redirect()->route('addTopicPage');
});
Route::post('admin/topic/add/submit', [TopicsController::class, 'addTopic']);

//admin detail topic
Route::get('admin/topic/detail/{id}', [VocabularyController::class, 'showDetailVocaOfTopic'])->name('listVocaOfTopic');
Route::get('admin/topic/vocaaddd',[VocabularyController::class, 'addVocaTopicPage'])->name('addVocaTopicPage');
Route::post('admin/topic/vocabulary/add/submit', [VocabularyController::class, 'addVocaTopic']);
Route::post('admin/topic/vocaadd', function(){
    return redirect()->route('addVocaTopicPage');
});
Route::get('admin/topic/vocabulary/delete', [VocabularyController::class, 'deleteVoca']);
Route::get('admin/topic/vocabulary/edit/{id}', [VocabularyController::class, 'getVocaToEdit']);
Route::post('admin/topic/vocabulary/edit/submit', [VocabularyController::class, 'editVoca']);

Route::get('user/info/{username}',[AccountController::class, 'infoPage'])->name('infoPage');
Route::post('user/info/update',[AccountController::class, 'updateUser']);
Route::post('user/info/updatepassword',[AccountController::class, 'changePassword']);
Route::get('user/homepage/{username}', [AccountController::class, 'userPage'])->name('userHomePage');

Route::get('user/topic/review/{username}/{id_topic}', [VocabularyController::class, 'reviewVoca'])->name('reviewVocaPage');
Route::get('user/topic/review/back/{id_topic}',[VocabularyController::class, 'backReview']);
Route::post('user/topic/review/submit/{username}', [VocabularyController::class, 'submitReview']);
Route::get('vocabulary/{username}/{id_voca}/toggle-favourite', [VocabularyController::class, 'addFavourite'])->name('toggleFavourite');
Route::get('user/favourite/{username}', [VocabularyController::class, 'listVocaFavourite'])->name('favouritePage');
Route::get('user/favourite/delete/{username}/{id_voca}', [VocabularyController::class, 'deleFavourite']);



Route::get('post', [Controller::class, 'getHTTP']);
Route::get('post/index', [Controller::class, 'getFindHTTP']);
Route::get('post/delete', [Controller::class, 'deleteHTTP']);

Route::get('dataserver', [Controller::class, 'getHTTP']);


Route::get('/start-flask', function () {
/// Lệnh chạy Flask mà không hiển thị terminal
$command = 'start /B python -u c:\\xampp\\htdocs\\PBL6\\python\\app.py';

// Thực thi lệnh mà không mở terminal
$process = popen($command, 'r');
pclose($process);

// Trả về phản hồi hoặc điều hướng
return redirect('http://127.0.0.1:5000/');

})->name('imageText');

Route::get('/admin/testpage', [ControllerTests::class, 'showTest'])->name('listTest');
Route::get('/admin/testpage/addtest', [ControllerTests::class, 'addTest'])->name('addTest');
Route::get('/admin/testpage/detailtest/{id_test}', [ControllerQuestions::class, 'showQuestion'])->name('detailQuestion');
Route::get('/admin/testpage/detailtest/addpage/{id_test}', [ControllerQuestions::class, 'addPage'])->name('addQuestionPage');
Route::post('admin/testpage/detailtest/addquestion/submit/{id_test}', [ControllerQuestions::class, 'submitAdd']);
Route::get('/admin/testpage/detailtest/editpage/{id_question}', [ControllerQuestions::class, 'editPage'])->name('editQuestionPage');
Route::post('admin/testpage/detailtest/editquestion/submit/{id_question}', [ControllerQuestions::class, 'submitEdit']);
Route::get('/admin/testpage/detailtest/deletequestion/submit/{id_question}/{id_test}', [ControllerQuestions::class, 'submitDelete'])->name('submitDeleteQuestion');
Route::get('user/testpage', [ControllerTests::class, 'showTestUser'])->name('listTestUser');
Route::get('user/testpage/detailtest/{id_test}', [ControllerQuestions::class, 'showQuestionUser'])->name('detailQuestionUser');
