<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTopic extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',  'healthy', 'sports', 'politics', 'entertainment', 'technology', 'science'];

    public function article()
    {
        return $this->belongsTo(User::class);
    }
}