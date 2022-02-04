<?php

namespace Jmalko\Wistia;

use Statamic\Providers\AddonServiceProvider;
use Jmalko\Wistia\Fieldtypes\Wistia; 

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        Wistia::class,
    ];

    protected $scripts = [
        __DIR__.'/../dist/js/cp.js'
    ];

    public function bootAddon()
    {
        
    }
}
