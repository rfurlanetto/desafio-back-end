<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
class CepService{

    private $viaCepUrl;

    public function __construct()
    {
        $this->viaCepUrl = "viacep.com.br/ws/altercep/json/";
    }

    public function getCep($cep)
    {
        $this->viaCepUrl = str_replace('altercep', $cep, $this->viaCepUrl);
        $response = Http::get($this->viaCepUrl);
        return json_decode($response->body());
    }


}