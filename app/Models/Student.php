<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';
    protected $primaryKey  = 'id';
    protected $fillable = ['name', 'email', 'age', 'subject', 'user_id'];
    
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
