<?php
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/src/FFmpeg.php';
/**
*	Create command
*/
$srt_file = "/var/media/subtitle.srt";
$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->input( '/var/media/input.mp4' );
$FFmpeg->overwrite();
$FFmpeg->subtitles( $srt_file, "Arial", 16, "&H80000000", 4 );
$FFmpeg->output( '/var/media/output.mp4' , 'mp4' )->overwrite();
$FFmpeg->vcodec('h264')->audioCodec( 'copy' );
$FFmpeg->ready();
print($FFmpeg->command);
