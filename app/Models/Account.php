<?php

namespace App\Models;

use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements Wallet
{
    use HasFactory;
    use HasWallet;

    protected $fillable = [
        'name',
        'number',
        'created_by',
    ];
}
