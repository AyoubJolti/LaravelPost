<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Postees extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(likes::class);
    }
   
    public function check($id_users)
    {
        $req = "select * from likes where user_id=$id_users and  postees_id=$this->id";
        $a = DB::select($req);
        if ($a != null) {
            return true;
        } else {
            return false;
        }
    }
}
