<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table ='customer';

    protected $fillable = [
        'name',
        'email',
        'image',
        'sdt',
        'address',
        'date_of_birth',
        'gender'

    ];
}
