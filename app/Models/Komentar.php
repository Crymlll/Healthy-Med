<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';

<<<<<<< Updated upstream
    protected $fillable = ['artikel_id','user_id','komentar'];

=======
    protected $fillable = ['article_id','user_id','komentar'];
    
    protected $guarded=['id'];
>>>>>>> Stashed changes

    public function users(){
        $this->belongsTo(User::class, 'user_id');
    }

    public function articles(){
        $this->belongsTo(Article::class, 'article_id');
    }
}
