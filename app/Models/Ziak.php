<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ziak extends Model
{
    public $timestamps = false;
    protected $table = 'ziaci';
    use HasFactory;
    protected $fillable = [
        'meno',
        'priezvisko',
        'stipendium'
    ];
}
