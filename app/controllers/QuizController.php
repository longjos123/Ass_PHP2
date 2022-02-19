<?php
namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use App\Models\Subject;

class QuizController
{
    public function showQuiz(){
        $id = $_GET['id'];

        $quiz = Quiz::where(['id', '=', $id])->first();
        $questions = Question::where(['quiz_id', '=', $id])->get();
        $questions_answers = [];
        foreach ($questions as $question){
            $questions_answers[$question->id] = [
                'question' => $question->name,
                'question_img' => $question->img,
                'answer' => Answer::where(['question_id', '=', $question->id])->get()
            ];

        }

        include_once './app/views/quiz-test/start-quiz.php';
    }

    public function checkResultQuiz(){
        $id = $_GET['id'];
        $questions = Question::where(['quiz_id', '=', $id])->get();
        $answer_true = [];
        $student_answer = [];
        $count = 0;
        $stdQuizDetail = [];

        for($i = 1; $i <= count($questions); $i++){
            $student_answer[$i] = isset($_POST['answer'.$i]) ? $_POST['answer'.$i] : 0;
            if($student_answer[$i] == 1){
                $count++;
            }
        }

        $student_quiz = [
            'student_id' => $_SESSION['auth']['id'],
            'quiz_id' => $id,
            'start_time' => '',
            'end_time' => '',
            'score' => ($count / count($student_answer)) * 10
        ];

        $stQ = new StudentQuiz();
        $stQ->insert($student_quiz);
//        $student_quiz_detail = new StudentQuizDetail();
//        $student_quiz_detail->insert($student_answer);

        include_once './app/views/quiz-test/quiz-result.php';
    }
}
?>