<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

class SubjectController
{
    public function index(){
        $subjects = Subject::all();

        return view('admin.home');
    }

    public function addForm(){
        include_once "./app/views/mon-hoc/add-form.php";
    }

    public function editForm(){
        $id = $_GET['id'];
        $model = Subject::where(['id', '=', $id])->first();
        if(!$model){
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        include_once "./app/views/mon-hoc/edit-form.php";
    }

    public function saveAdd(){
        $model = new Subject();
        $target_dir = "public/img/";
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        $data = [
            'name' => $_POST['name'],
            'logo' => 'img/'.basename($_FILES["fileUpload"]["name"])
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . '/admin/dashboard');
        die;
    }

    public function saveEdit(){
        $id = $_GET['id'];
        $model = Subject::where(['id', '=', $id])->first();
        if(!$model){
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        $data = [
            'name' => $_POST['name']
        ];

        $model->update($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function delete(){
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'admin/dashboard');
        die;
    }

    public function detailSubject(){
        $sid = $_GET['id'];
        $subject = Subject::where('id', $sid)->first();
        $quizs = Quiz::where('subject_id', $sid)->get();

        if(empty($subject)){
            header('location: ' . BASE_URL);
            die;
        }

        return view('admin.home');
    }
}
