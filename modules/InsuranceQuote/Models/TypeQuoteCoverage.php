<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeQuoteCoverage extends Model
{
    use HasFactory,  HasUuids;


    protected $fillable = ['type_quote_id', 'name'];

    public function typeQuote(): BelongsTo
    {
        return $this->belongsTo(TypeQuote::class, 'type_quote_id', 'id');
    }
}
