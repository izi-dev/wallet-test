<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Models\Account;

readonly class CreateAccountController
{
    public function __construct(private Account $account)
    {
    }

    public function __invoke(CreateAccountRequest $request): Account
    {
        /** @var Account $account */
        $account = $this->account->newQuery()->create([
            'name' => $request->get('name'),
            'number' => $this->generateNumberAccount(),
            'created_by' => $request->user()->id,
        ]);

        $account->deposit($request->get('balance'));

        return $account;
    }

    private function generateNumberAccount(): int
    {
        $min = 1000000000;
        $max = 9999999999;

        return random_int($min, $max);
    }
}
