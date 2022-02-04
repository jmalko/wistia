<?php

namespace Jmalko\Wistia\Fieldtypes;

class Wistia extends \Statamic\Fields\Fieldtype 
{
    public function preload() 
    {
        return [
            'wistiaApi' => config('wistia.api_key'),
            'wistiaProjectId' => config('wisita.project_id'),
        ];
    }
}