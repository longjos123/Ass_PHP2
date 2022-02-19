<?php include_once './app/views/home/_partials/header.php'; ?>
    <main class="container-fluid">
        <h3>Môn học: <?= $subject-> name?></h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên quiz</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Thời gian làm bài</th>
                    <th>Điểm</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($quizs as $q):?>
                    <tr>
                        <td scope="row"><?= $q->name ?></td>
                        <td><?= $q->start_time ?></td>
                        <td><?= $q->end_time ?></td>
                        <td><?= $q->duration_minutes ?> phút</td>
                        <td>
                            <a href="<?= BASE_URL. 'quiz?id='.$q->id ?>" class="btn btn-sm btn-primary" id="start">Bắt đầu làm bài</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </main>
<!--<script>-->
<!--    document.getElementById('start').onclick = function (){-->
<!--        var user = --><?php //$_SESSION['auth'] ?>
//        console.log(user);
//        if(!user){
//            alert('Vui lòng đăng nhập trước khi làm quiz!!!');
//        }
//    }
//</script>
<?php include_once './app/views/home/_partials/footer.php'; ?>

