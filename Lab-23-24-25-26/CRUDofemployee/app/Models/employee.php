<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch',
        'email',
        'password',
    ];

    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }
}
