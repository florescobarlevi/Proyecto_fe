<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes; 

    protected $table = 'areas';

    protected $primaryKey = 'id';

    protected $connection = 'mysql';

    protected $fillable = [
        'nombre',        
    ];
}