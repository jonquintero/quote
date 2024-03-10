<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeQuote extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = ['name'];
}
