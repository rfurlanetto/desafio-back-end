<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\CepService;

class CepController extends Controller
{

    private $cepService;

    public function __construct(CepService $cepService){
        $this->cepService = $cepService;
    }

    public function getCep($cep)
    {
        return response()->json($this->cepService->getCep($cep));
    }

}
