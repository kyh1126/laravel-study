<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

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

    public function getNameAttribute(string $value): string
    {
        // MB_CASE_TITLE 모드로 이름을 변환한다
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function setNameAttribute(string $value): void
    {
        // MB_CASE_UPPER 모드로 name 칼럼값을 변환한다
        $this->attributes['name'] = mb_convert_case($value, MB_CASE_UPPER, "UTF-8");
    }

    public function books()
    {
        return $this->hasMany('\App\Models\Book');
    }
}
