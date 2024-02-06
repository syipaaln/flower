<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'Username', 'Password', 'Email', 'NamaLengkap', 'Alamat'
    ];
}
