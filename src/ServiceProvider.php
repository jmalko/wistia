<?php

namespace Jmalko\Wistia;

use Statamic\Providers\AddonServiceProvider;
use Jmalko\Wistia\Fieldtypes\Wistia; 
use Jmalko\Wistia\Modifiers\Details; 

class ServiceProvider extends AddonServiceProvider
{


    protected $fieldtypes = [
        Wistia::class,
    ];

    protected $modifiers = [
        Details::class,
    ];

    protected $scripts = [
        __DIR__.'/../dist/js/cp.js'
    ];

    protected $stylesheets = [
        __DIR__.'/../dist/css/cp.css'
    ];

    public function bootAddon()
    {
        
    }
}
