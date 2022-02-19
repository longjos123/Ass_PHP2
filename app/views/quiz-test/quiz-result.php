<?php include_once './app/views/home/_partials/header.php' ?>

<main class="container">
    <h3>Kết quả Quiz <?= $id ?></h3>
    <h5>Tổng: <?= $count ?>/<?= count($student_answer) ?></h5>
    <h5>Điểm: <?= ($count / count($student_answer)) * 10 ?></h5>
    <br>
    <a href="<?= BASE_URL. 'quiz?id='.$id ?>" class="btn btn-primary">Làm lại</a>

</main>

<?php include_once './app/views/home/_partials/footer.php' ?>