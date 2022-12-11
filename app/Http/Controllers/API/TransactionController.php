<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);

        if ($product)
            return ResponseFormatter::success($product, 'Berhasil');
        else
            return ResponseFormatter::error(null, 'Gagal', 404);
    }
}
