<?php

namespace Modules\User\DataTransferObjects;

class UserAccountData
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password )
    {

    }
}
