<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Image extends Model
{
    use HasFactory;

    protected $table = 'image';

    protected $fillable = ['file', 'alt'];

    public $timestamps = false;

    public function article()
	{
	    //return $this->belongsTo(Article::class);
	}
}
