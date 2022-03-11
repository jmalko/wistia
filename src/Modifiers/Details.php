<?php

namespace Jmalko\Wistia\Modifiers;

use Statamic\Modifiers\Modifier;

class Details extends Modifier
{
    /**
     * Modify a value.
     *
     * @param mixed  $value    The value to be modified
     * @param array  $params   Any parameters used in the modifier
     * @param array  $context  Contextual values
     * @return mixed
     */
    public function index($value, $params, $context)
    {
        $wistia_id = $value->getData()['wistia_id'];

        foreach($params as $p) {
            switch ($p) {
            case 'duration':
                return view('wistia::details.duration', compact(['wistia_id']));
            case 'complete':
                return view('wistia::details.completion', compact(['wistia_id']));
            case 'finished':
                return view('wistia::details.finished', compact(['wistia_id']));
            default:
                return;
            }
        }

    }
}

