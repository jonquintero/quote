<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InsuranceQuoteWithTypeQuote extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =  ['insurance_quote_id', 'type_quote_id'];


    public function insuranceQuote(): BelongsTo
    {
        return $this->belongsTo(InsuranceQuote::class, 'insurance_quote_id', 'id');
    }

    public function typeQuote(): BelongsTo
    {
        return $this->belongsTo(TypeQuote::class, 'type_quote_id', 'id');
    }
}
