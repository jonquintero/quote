<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceQuote extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        // Lista de atributos llenables
    ];

    protected $hidden = [
        // Lista de atributos ocultos
    ];

    // Relaciones y otros métodos del modelo
}
