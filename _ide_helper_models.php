<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\InsuranceQuote\Models{
/**
 * Modules\InsuranceQuote\Models\InsuranceQuote
 *
 * @property string $id
 * @property string $user_id
 * @property string $contact_preference
 * @property string $street_address
 * @property string $ste_apt
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\InsuranceQuote\Models\TypeQuote> $typeQuote
 * @property-read int|null $type_quote_count
 * @property-read \Modules\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereContactPreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereSteApt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote whereZipcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuote withoutTrashed()
 */
	class InsuranceQuote extends \Eloquent {}
}

namespace Modules\InsuranceQuote\Models{
/**
 * Modules\InsuranceQuote\Models\InsuranceQuoteWithTypeQuote
 *
 * @property string $id
 * @property string $insurance_quote_id
 * @property string $type_quote_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\InsuranceQuote\Models\InsuranceQuote $insuranceQuote
 * @property-read \Modules\InsuranceQuote\Models\TypeQuote $typeQuote
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote whereInsuranceQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote whereTypeQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceQuoteWithTypeQuote whereUpdatedAt($value)
 */
	class InsuranceQuoteWithTypeQuote extends \Eloquent {}
}

namespace Modules\InsuranceQuote\Models{
/**
 * Modules\InsuranceQuote\Models\TypeQuote
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuote whereUpdatedAt($value)
 */
	class TypeQuote extends \Eloquent {}
}

namespace Modules\InsuranceQuote\Models{
/**
 * Modules\InsuranceQuote\Models\TypeQuoteCoverage
 *
 * @property string $id
 * @property string $type_quote_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\InsuranceQuote\Models\TypeQuote $typeQuote
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage whereTypeQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeQuoteCoverage whereUpdatedAt($value)
 */
	class TypeQuoteCoverage extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\User
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\InsuranceQuote\Models\InsuranceQuote> $insuranceQuote
 * @property-read int|null $insurance_quote_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(array $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User orderByName()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

