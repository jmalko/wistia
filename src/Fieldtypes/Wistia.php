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
                'default' => 'inline',
                'options' => [
                    'inline' => __('Inline Embed'),
                    'popup' => __('Popup Embed'),
                ],
                'width' => 25
            ],
            'show_title' => [
                'display' => 'Display title',
                'instructions' => 'Show video title',
                'type' => 'toggle',
                'default' => false,
                'width' => 25
            ],
            'show_duration' => [
                'display' => 'Display duration',
                'instructions' => 'Show how long the video is.',
                'type' => 'toggle',
                'default' => false,
                'width' => 25
            ],
            'track_completion' => [
                'display' => 'Track video watch completion',
                'instructions' => 'Mark videos as complete when they reach 90% unique seconds watched.',
                'type' => 'toggle',
                'default' => false,
                'width' => 25
            ],
            'track_finish' => [
                'display' => 'Track video finish',
                'instructions' => 'Mark videos as watched when they reach the end.',
                'type' => 'toggle',
                'default' => false,
                'width' => 25
            ],
        ];
    }

    public function augment($value) {

        $embed_mode = $this->config('embed_mode');
        $show_duration = $this->config('show_duration');
        $show_title = $this->config('show_title');
        $track_completion = $this->config('track_completion');
        $track_finish = $this->config('track_finish');

        $wistia_id = basename($value['url']) ?: basename($value);
        $data = $value['wistia'] ? $value['wistia']['media'] : [] ;

        if (!$wistia_id) {
            return;
        }

        return view('wistia::embed', compact([
            'embed_mode',
            'show_duration',
            'show_title',
            'track_completion',
            'track_finish',
            'wistia_id',
            'data',
        ]));

    }
}
