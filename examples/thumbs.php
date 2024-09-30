<?php
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/src/FFmpeg.php';
$start = 1;
$frames = 10;
$size = '100x100';

$file = '/var/www/html/ffmpeg/videos/shopee_ad.mp4';
$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->input( $file )->thumb($size, $start , $frames );
$FFmpeg->output( '/var/www/html/ffmpeg/videos/new.mp4' , 'mp4' );
$FFmpeg->ready();
