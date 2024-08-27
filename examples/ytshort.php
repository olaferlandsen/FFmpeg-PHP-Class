<?php
set_time_limit(7200);
ignore_user_abort(true);
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/ffmpeg/src/FFmpeg.php';

$arrInputs = array(
    '0' => '/var/www/html/ffmpeg/videos/nike_ad.mp4',
    '1' => '/var/www/html/ffmpeg/images/live_logo.png'
);

$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->inputs( $arrInputs );
$FFmpeg->overwrite();
$FFmpeg->position('00:00:00')->duration('30');
$FFmpeg->ytshort( 'landscape', 'true' );
$FFmpeg->output( '/var/www/html/ffmpeg/videos/new.mp4' , 'mp4' );
$FFmpeg->audioCodec();
$FFmpeg->ready();

echo "<pre>";
print_r($FFmpeg->out);
print_r($FFmpeg->var);
echo "</pre>";