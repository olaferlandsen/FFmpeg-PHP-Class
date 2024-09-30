<?php
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/src/FFmpeg.php';
/**
*	Create command
*/
$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->input( '/var/www/html/frontend/videos/nike_ad.mp4' );
$FFmpeg->overwrite();
/**
*	Custom Text options
**/
$arrOpts = array(
    'text' => 'Hello World',
    'font' => 'Courier',
    'fontcolor' => 'white',
    'fontsize' => 32
);
/**
*	Create command
*/
$FFmpeg->drawtext( $arrOpts );
$FFmpeg->output( '/var/www/html/frontend/videos/addtext.mp4' , 'mp4' );
$FFmpeg->audioCodec();
$FFmpeg->ready();

echo "<pre>";
print_r($FFmpeg->out);
print_r($FFmpeg->var);
echo "<p>";
echo $FFmpeg->command;
echo "</pre>";