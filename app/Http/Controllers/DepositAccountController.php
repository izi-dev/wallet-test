<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositAccountRequest;
use App\Models\Account;

readonly class DepositAccountController
{
    public function __construct(private Account $account)
    {
    }

    public function __invoke(DepositAccountRequest $request, string $number): Account
    {
        /** @var Account $account */
        $account = $this->account->newQuery()->where('number', $number)->firstOrFail();
        $account->deposit($request->get('amount'));

        return $account;
    }
}
