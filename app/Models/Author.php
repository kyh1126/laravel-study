<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 't_author';
    protected $primaryKey = 'author_id';
    public $timestamps = false;

    // name 칼럼은 수정할 수 있도록 한다
    protected $fillable = [
        'name',
    ];

    // id, created_at, updated_at은 임의로 수정할 수 없도록 한다
//    protected $guarded = [
//        'id',
//        'created_at',
//        'updated_at',
//    ];
}
