<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'first_name' => 'Admin',
            'last_name' => 'Jon',
            'phone' => '123456789',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
