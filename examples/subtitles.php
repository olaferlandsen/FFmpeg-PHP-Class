<?php
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/uploadz/ffmpeg/FFmpeg.php';
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
    'Filename'  => '/var/media/subtitle.srt',
    'Fontname'  => 'Arial',    
    'Fontsize'  => '16',
    'Shadow'    => 0.75
);
/**
*	Create command
*/
$FFmpeg->subtitles( $arrOpts );
$FFmpeg->output( '/var/media/output.mp4' , 'mp4' );
$FFmpeg->vcodec('h264')->audioCodec( 'copy' );
$FFmpeg->ready();
print($FFmpeg->command);