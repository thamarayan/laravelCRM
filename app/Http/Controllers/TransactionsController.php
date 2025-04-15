<?php

namespace App\Http\Controllers;

use App\Models\PayOrdersModel;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = PayOrdersModel::get();

        $orderStatusMap = [
            200 => "Success",
            400 => "Failed",
            1000 => "Pending",
            2001 => "Refunded",
            2005 => "Fraud Warning",
            2007 => "Ethoca CB",
            2008 => "Chargeback",
            2009 => "High Risk",
            2025 => "Partial Refund",
        ];

        foreach ($transactions as $trx) {
            $trx->orderStatus = $orderStatusMap[$trx->orderStatus] ?? '';
        }

        return view('transactions.index', compact('transactions'));
    }
}
