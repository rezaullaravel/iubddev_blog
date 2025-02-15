<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Blog extends Model
{
    use Commentable;
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
