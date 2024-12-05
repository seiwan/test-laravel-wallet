<?php

declare(strict_types=1);

namespace App\Actions;

use App\Enums\WalletTransactionType;
use App\Exceptions\InsufficientBalance;
use App\Models\User;
use App\Models\WalletTransfer;
use Illuminate\Support\Facades\DB;

readonly class LowBalanceAlert
{
    public function __construct(protected PerformWalletTransaction $performWalletTransaction) {}

    /**
     * @return void
     */
    public function execute(User $user): void
    {
        $balance = $user->wallet->balance;

        if ($balance <= 10) {
        }
    }
}
