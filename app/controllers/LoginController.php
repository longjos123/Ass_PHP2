<?php
namespace App\Controllers;

use App\Models\User;

class LoginController{
    
    public function registerForm(){
        include_once './app/views/auth/register-form.php';
    }

    public function createAccount(){
        $data = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        $model = new User();
        $model->insert($data);
        header('location: ' . BASE_URL . 'login');
    }

    public function loginForm(){
        include_once './app/views/auth/login-form.php';
    }

    public function postLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            header("location: " .BASE_URL . 'login?msg=Hãy nhập email/mật khẩu');
            die;
        }

        $user = User::where('email', $email)->first();
        if(!empty($user) && password_verify($password, $user->password)){
            $_SESSION['auth'] = [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'avatar' => $user->avatar,
                'role_id' => $user->role_id,
                'role_name' => $user->getRoleName()
            ];
            if($user->role_id == 1){
                header('location: ' . BASE_URL . 'admin/dashboard');
            }else{
                header('location: ' . BASE_URL);
            }
            die;
        }

        header("location: " .BASE_URL . 'login?msg=Email/mật khẩu không đúng');
        die;
    }

    public function logout(){
        unset($_SESSION['auth']);
        header("location: " .BASE_URL);
        die;
    }
}
?>