<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['ism', 'fam', 'yosh', 'jins', 'profession_id'];

    protected $guarded = ['id'];

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'student_tags','student_id','tag_id');
    }
}

