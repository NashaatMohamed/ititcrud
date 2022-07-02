<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\models\User;

class phone extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'phones';

    protected $fillable = ['phone'];


    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
