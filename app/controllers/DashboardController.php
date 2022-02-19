<?php
namespace App\Controllers;

use App\Models\Subject;

class DashboardController{
    public function index(){
        $subjects = Subject::all();

        return view('admin.subject', ['subjects' => $subjects]);
    }
}
?>