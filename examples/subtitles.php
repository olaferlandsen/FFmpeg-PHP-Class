<?php
/**
*	include FFmpeg class
**/
include DIRNAME(DIRNAME(__FILE__)).'/src/FFmpeg.php';
/**
*	Create command
*/
$srt_file = "/var/media/subtitle.srt";

$settings = array(
    'Fontname'  => 'Arial',	
	'Fontsize'  => '16',
	'OutlineColour' => '&H80000000'
);

$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->input( '/var/media/input.mp4' );
$FFmpeg->overwrite();
/**
 * This function by default can be exec without the array settings ( 'SRT' file path only )
 * 
 * Example:
 * $FFmpeg->subtitles( $srt_file );
 */
$FFmpeg->subtitles( $srt_file, $settings );
$FFmpeg->output( '/var/media/output.mp4' , 'mp4' )->overwrite();
$FFmpeg->vcodec('h264')->audioCodec( 'copy' );
$FFmpeg->ready();
print($FFmpeg->command);
