<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithDrawAccountRequest;
use App\Models\Account;

readonly class WithDrawAccountController
{
    public function __construct(private Account $account)
    {
    }

    public function __invoke(WithDrawAccountRequest $request, string $number): Account
    {
        /** @var Account $account */
        $account = $this->account->newQuery()->where('number', $number)->firstOrFail();
        $account->withdraw($request->get('amount'));

        return $account;
    }
}
