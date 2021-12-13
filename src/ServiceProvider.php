<?php

namespace YasinKose\ApiResponder;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind('api-responder', function () {
            return new ApiResponder();
        });
    }
}
