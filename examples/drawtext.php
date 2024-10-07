<?php
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/src/FFmpeg.php';
/**
*	Create command
*/
$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->input( '/var/media/original.avi' );
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
$FFmpeg->output( '/var/media/output.mp4' , 'mp4' );
$FFmpeg->vcodec('h264')->audioCodec( 'copy' );
$FFmpeg->ready();
print($FFmpeg->command);