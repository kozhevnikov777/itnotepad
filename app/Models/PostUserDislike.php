<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserDislike extends Model
{
    use HasFactory;
    protected $table ='post_user_dislikes';
    protected $guarded = false;
}
