<?php 

namespace App\Services;

interface NewsInterface {
    public function getDataFromSource();
    public function newsFormatter($data);
}