<?php

namespace App\Resolvers;

use App\Platforms;
use Exception;

class PaymentPlatformResolver{

    protected $paymentPlatforms;

    public function __construct(){
        $this->paymentPlatforms = Platforms::all();
    }

    public function resolveService($paymentPlatformId)
    {
        $name = strtolower($this->paymentPlatforms->firstWhere('id',$paymentPlatformId)->name);

        $service = config("services.{$name}.class");

        if($service){
            return resolve($service);
        }

        throw new Exception('The selected payment platform is not in the configuration');
    }
}