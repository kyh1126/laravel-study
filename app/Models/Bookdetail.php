<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    /**
     * 서적 상세 정보와 연결된 서적 레코드를 얻는다
     */
    public function book()
    {
        return $this->belongsTo('\App\Models\Book');
    }
}
