<?php


namespace App\Services;


interface CepInterface
{
    public function getAddressByCep(string $cep);
}