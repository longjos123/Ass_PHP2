<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

class HomeController{
    public function index(){
        $subjects = Subject::all();
        include_once "./app/views/home/index.php";
    }

    public function detailSubject(){
        $sid = $_GET['id'];
        $subject = Subject::where(['id', '=', $sid])->first();
        $quizs = Quiz::where(['subject_id', '=', $sid])->get();

        if(empty($subject)){
            header('location: ' . BASE_URL);
            die;
        }
        include_once "./app/views/home/quiz-list.php";
    }
}
?>