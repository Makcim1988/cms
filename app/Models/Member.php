<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';

    public function article()
	{
	    //return $this->belongsTo(Article::class);
	}
}
