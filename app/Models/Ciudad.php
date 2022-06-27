<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Nombre de la tabla asociada con el modelo.
     * 
     * @var string
     */
    protected $table = 'ciudades';
}
