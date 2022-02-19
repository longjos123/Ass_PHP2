<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = 'users';

    public function getRoleName(){
        $role = Role::where('id', '=', $this->role_id)->first();
        return $role->name;
    }
}
?>