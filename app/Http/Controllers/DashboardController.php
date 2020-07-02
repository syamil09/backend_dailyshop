<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
    	$income = Transaction::whereTransactionsStatus('SUCCESS')->sum('transactions_total');
    	$sales  = Transaction::count();
    	$items  = Transaction::orderBy('id','DESC')->take(5)->get();
    	$pie	= [
    		'pending' => Transaction::whereTransactionsStatus('PENDING')->count(),
    		'failed' => Transaction::whereTransactionsStatus('FAILED')->count(),
    		'success' => Transaction::whereTransactionsStatus('SUCCESS')->count(),
    	];

    	return view('pages.dashboard', compact('income', 'sales', 'items', 'pie'));
    }
}
