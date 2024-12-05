<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController
{
    public function __invoke(Request $request)
    {
        // This checking should be done into a service
        $existingWallet = (bool) $request->user()->wallet;
        $existingTransactions = $existingWallet ? (bool) $request->user()->wallet->has('transactions') : false;
        $transactions = $existingTransactions ? $request->user()->wallet->transactions()->with('transfer')->orderByDesc('id')->get() : [];
        $balance = (bool) $request->user()->wallet ? $request->user()->wallet->balance : 0;

        return view('dashboard', compact('transactions', 'balance'));
    }
}
