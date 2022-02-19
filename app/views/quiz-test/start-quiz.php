<?php include_once './app/views/home/_partials/header.php'; ?>
    <main class="container">
        <p style="text-align: center;margin-top: 10px; font-size: 25px; font-weight: bold" id="time"></p>
        <div class="form-question">
            <h4 style="margin-left: 15px">Quiz <?= $id ?></h4>
            <div class="row">
                <div class="col-6">
                    <form method="post" id="form" action="<?= BASE_URL ?>quiz/checkQuiz?id=<?= $id ?>" id="form">
                        <button style="margin: 0px 0px 20px 15px; width: 633px" id="button-finish" type="submit" class="btn btn-secondary">Hoàn thành kiểm tra</button>

                        <?php foreach ($questions_answers as $key => $questions_answer): ?>
                            <div class="row" style="margin-left: 15px; border: 1.5px solid #E0E0E0; border-radius: 5px; padding-top: 5px">
                                <div class="question">
                                    <strong>
                                        <span>Câu <?= $key ?>:</span>
                                        <span><?= $questions_answer['question'] ?></span>
                                    </strong><hr>
                                    <?php if($questions_answer['question_img']): ?>
                                        <img style="width: 470px;" src="<?php echo BASE_URL. $questions_answer['question_img']?>">
                                    <?php endif; ?>
                                </div>
                                <div class="answer">
                                    <?php foreach ($questions_answer['answer'] as $answer): ?>
                                        <input name="answer<?= $key ?>" type="radio" style="margin-left: 10px" value="<?= $answer->is_correct ?>">  <?= $answer->content ?><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <br>
                        <?php endforeach; ?>
                        <button style="margin: 0px 0px 0px 15px; width: 633px;" id="button-finish" type="submit" class="btn btn-secondary">Hoàn thành kiểm tra</button>
                    </form>
                </div>
                <div class="col-5" style="border: 1.5px solid #E0E0E0; border-radius: 5px; margin-left: 55px; padding-top: 5px">
                    <strong>
                        <span>Kết quả</span><hr>
                    </strong>
                </div>
            </div>
        </div>
    </main>

<script>

    // Set the date we're counting down to
    var now = new Date()
    var endtime = new Date(now);
    // endtime.setMinutes(now.getMinutes() + <?= 10 ?>);
    endtime.setSeconds(now.getSeconds() + <?= $quiz->duration_minutes * 60 ?>);
    var countDownDate = endtime.getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("time").innerHTML ="Thời gian còn lại: " + minutes + "phút " + seconds + "giây ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "EXPIRED";
            document.getElementById('button-finish').submit();
        }
    }, 1000);
    document.getElementById('button-finish').onclick = function (){
        alert('Xác nhận hoàn thành kiểm tra!!!');
    }

</script>
<?php include_once './app/views/home/_partials/footer.php'; ?>
