<?php

namespace Modules\InsuranceQuote\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\InsuranceQuote\Database\Factories\InsuranceQuoteFactory;
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

    protected static function newFactory(): InsuranceQuoteFactory
    {
        return new InsuranceQuoteFactory();
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }

    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->whereAny([
                'contact_preference',
                'street_address',
                'ste_apt',
                'city',
                'state',
                'zipcode',
            ],
                'LIKE',
                "%$search%");

        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }

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
