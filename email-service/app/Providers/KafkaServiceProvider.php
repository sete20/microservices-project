<?php

namespace App\Providers;

use App\Connector\KafkaConnector;
use Illuminate\Support\ServiceProvider;

class KafkaServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $manger = $this->app['queue'];
        $manger->addConnector('kafka', function () {
            return new KafkaConnector;
        });
    }
}
