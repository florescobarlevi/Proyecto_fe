<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaccion extends Model
{
    use SoftDeletes; 

    protected $table = 'transacciones';

    protected $primaryKey = 'id';

    protected $connection = 'mysql';

    protected $fillable = [
        'fecha_ingreso',
        'fecha_egreso',
        'persona_id'
        
    ];
}