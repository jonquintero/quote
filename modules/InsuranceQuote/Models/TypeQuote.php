<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeQuote extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = ['name'];


    public function typeQuoteCoverage(): HasMany
    {
        return $this->hasMany(TypeQuoteCoverage::class);
    }
}
