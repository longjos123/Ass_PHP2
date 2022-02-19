<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/utils.php';
require_once './commons/route.php'; // bắt buộc ở sau file autoload

// $url mong muốn của người gửi request
$url = isset($_GET['url']) ? $_GET['url'] : "/";
definedRoute($url);



// nơi định nghĩa ra các đường dẫn cho website
// switch ($url) {
//     case '/':
//         $ctr = new HomeController();
//         $ctr->index();
//         break;
//     case 'login':
//         $ctr = new LoginController();
//         $ctr->loginForm();
//         break;
//     case 'post-login':
//         $ctr = new LoginController();
//         $ctr->postLogin();
//         break;
//     case 'logout':
//         $ctr = new LoginController();
//         $ctr->logout();
//         break;
//     case 'dang-ky':
//         $ctr = new LoginController();
//         $ctr->registerForm();
//         break;
//     case 'tao-tai-khoan':
//         $ctr = new LoginController();
//         $ctr->createAccount();
//         break;
//     case 'dashboard':
//         $ctr = new DashboardController();
//         $ctr->index();
//         break;
//     case 'mon-hoc':
//         $ctr = new SubjectController();
//         $ctr->index();
//         break;
//     case 'mon-hoc/tao-moi':
//         $ctr = new SubjectController();
//         $ctr->addForm();
//         break;
//     case 'mon-hoc/luu-tao-moi':
//         $ctr = new SubjectController();
//         $ctr->saveAdd();
//         break;
//     case 'mon-hoc/cap-nhat':
//         $ctr = new SubjectController();
//         $ctr->editForm();
//         break;
//     case 'mon-hoc/luu-cap-nhat':
//         $ctr = new SubjectController();
//         $ctr->saveEdit();
//         break;
//     case 'mon-hoc/xoa':
//         $ctr = new SubjectController();
//         $ctr->remove();
//         break;
//     case 'mon-hoc/chi-tiet':
//         checkRole(STUDENT_ROLE);
//         $ctr = new HomeController();
//         $ctr->detailSubject();
//         break;
//     case 'quiz':
//         break;
//     case 'quiz/tao-moi':
//         break;
//     case 'quiz/luu-tao-moi':
//         break;
//     case 'quiz/cap-nhat':
//         break;
//     case 'quiz/luu-cap-nhat':
//         break;
//     case 'quiz/xoa':
//         break;
//     case 'quiz/lam-bai':
//         break;
//     default:
//         echo "Đường dẫn bạn đang truy cập chưa được cho phép";
//         break;
// }


?>