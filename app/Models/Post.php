<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body'
    ];

    /*
    * Get the user that owns the Post
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
//    public function user(): BelongsTo
//    {
//        return $this->hasOne(User::class);
//    }
}
