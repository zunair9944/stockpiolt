<?php

use App\Models\SettingModel;

if (!function_exists('getTestomonials')) {
    function getTestomonials()
    {
        $testimonials[] = 'I am testimonials';
        $testimonials[] = 'I am 2nd testimonials';
        return $testimonials;
    }
}

function makeTitle($title, $len=30){
    if (strlen($title) > $len)
    {
        return substr($title, 0, $len)."...";
    }
    else
    {
        return $title;
    }
}

function bm_estimated_reading_time($post) {

    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );
    $seconds = floor( $words % 120 / ( 120 / 60 ) );

    if ( 1 <= $minutes ) {
        $estimated_time = $minutes . ' minute' . ($minutes == 1 ? '' : 's') . ', ' . $seconds . ' second' . ($seconds == 1 ? '' : 's');
    } else {
        $estimated_time = $seconds . ' second' . ($seconds == 1 ? '' : 's');
    }

    return $estimated_time;

}

if (!function_exists('getAppSettings')) {
    function getAppSettings($select=null)
    {
        if($select){
            return SettingModel::select($select)->where('id', 1)->first();
        }else{
            return SettingModel::select('*')->where('id', 1)->first();
        }
    }
}