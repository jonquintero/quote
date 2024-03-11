<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;

class InsuranceQuote extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'user_id', 'contact_preference', 'street_address', 'ste_apt',
        'city', 'state', 'zipcode'
    ];

    protected $hidden = [
        // Lista de atributos ocultos
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function typeQuote(): HasMany
    {
        return $this->hasMany(TypeQuote::class);
    }

    public function insuranceQuoteWithTypeQuotes(): HasMany
    {
        return $this->hasMany(InsuranceQuoteWithTypeQuote::class, 'insurance_quote_id', 'id');
    }
}
