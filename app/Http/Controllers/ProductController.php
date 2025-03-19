<?php
// filepath: /c:/Users/ashut/be-opdracht-5/app/Http/Controllers/ProductController.php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $startdatum = $request->input('startdatum');
        $einddatum = $request->input('einddatum');

        if ($startdatum && $einddatum) {
            Log::info('Calling spGetAllProductByDate with parameters:', ['startdatum' => $startdatum, 'einddatum' => $einddatum]);
            $data = DB::select('CALL spGetAllProductByDate(?, ?)', [$startdatum, $einddatum]);
        } else {
            Log::info('Calling spGetAllProduct');
            $data = DB::select('CALL spGetAllProduct()');
        }

        return view('Product.index', compact('data'));
    }
}