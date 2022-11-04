<?php 
namespace App\Http\service;
use Artisan;

class CacheClear {
    public function clear()
    {
        return Artisan::call('cache:clear');
    }
}