<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie
        ]);
    }
}
