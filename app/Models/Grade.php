<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    
    protected $table = 'grades';
    protected $primaryKey  = 'id';
    protected $fillable = ['Grade', 'student_id'];
    
    use HasFactory;
    
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
