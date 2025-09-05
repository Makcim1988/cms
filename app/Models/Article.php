<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Member;
use App\Models\Image;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

	protected $fillable = ['title', 'summary', 'content', 'created', 'image_id', 'member_id', 'category_id', 'published'];

	public $timestamps = false;

    public function category()
	{
        return $this->belongsTo(Category::class, 'category_id');
		//return $this->hasMany(Category::class);
	}

    public function image()
	{
        return $this->belongsTo(Image::class, 'image_id');
		//return $this->hasMany(Image::class);
	}

    public function member()
	{
        return $this->belongsTo(Member::class, 'member_id');
		//return $this->hasMany(Image::class);
	}
}
