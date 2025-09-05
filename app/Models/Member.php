<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Member extends /*Model*/ Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $table = 'member';

    protected $fillable = ['forename', 'surname', 'email', 'password', 'joined', 'picture', 'role'];

    protected $hidden = [
        'remember_token',
    ];

    public $timestamps = false;

    public function article()
	{
	    //return $this->belongsTo(Article::class);
	}
}
