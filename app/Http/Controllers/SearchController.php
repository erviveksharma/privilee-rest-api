<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JSONService;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $jsonService = new JSONService();
        $records = $jsonService->search($request->all());
        
        return response()->json([
            'success' => true,
            'records' => $records,
        ]);
    }
}
