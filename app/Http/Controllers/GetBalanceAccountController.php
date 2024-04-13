<?php

namespace App\Http\Controllers;

use App\Models\Account;

readonly class GetBalanceAccountController
{
    public function __construct(private Account $account)
    {
    }

    public function __invoke(string $number): Account
    {
        /** @var Account $account */
        $account = $this->account->newQuery()->where('number', $number)->firstOrFail();
        $account->wallet;
        $account->walletTransactions;

        return $account;
    }
}
