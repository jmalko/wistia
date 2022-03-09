<?php

namespace Jmalko\Wistia\Fieldtypes;

class Wistia extends \Statamic\Fields\Fieldtype 
{
    public function preload() 
    {
        return [
            'wistiaApi' => config('wistia.api_key'),
            'wistiaProjectId' => config('wistia.project_id'),
        ];
    }

    public function configFieldItems(): array
    {
        return [
            'embed_mode' => [
                'display' => 'Mode',
                'instructions' => 'Choose which mode you want to use',
                'type' => 'select',
                'default' => 'regular',
                'options' => [
                    'regular' => __('Regular Embed'),
                    'popup' => __('Popup Embed'),
                ],
                'width' => 50
            ],
            'show_duration' => [
                'display' => 'Display duration',
                'instructions' => 'Show how long the video is.',
                'type' => 'toggle',
                'default' => false,
                'width' => 50
            ],
            'track_watch' => [
                'display' => 'Track video watch completion',
                'instructions' => 'Mark videos as watched when they reach 90% watch.',
                'type' => 'toggle',
                'default' => false,
                'width' => 50
            ],
            'track_finish' => [
                'display' => 'Track video finish',
                'instructions' => 'Mark videos as watched when they reach the end.',
                'type' => 'toggle',
                'default' => false,
                'width' => 50
            ],
        ];
    }

    public function augment($value) {
        ray($this->config('embed_mode'));
        // ray(get_class_methods($this));
        $wistia_id = basename($value);
        return view('wistia::embed', compact(['wistia_id']));
    }
}
