<?php
/**
 * include FFmpeg class
 */
include DIRNAME(DIRNAME(__FILE__)).'/src/FFmpeg.php';
/**
 * Create command
 */
$FFmpeg = new FFmpeg( exec('which ffmpeg') );
$FFmpeg->input( '/var/media/input.mp4' );
$FFmpeg->overwrite();

/**
 *  Custom Text options
 *
 *  Positions:
 *  - Top left: x=0:y=0 (with 10 pixel padding x=10:y=10)
 *  - Top center: x=(w-text_w)/2:y=0 (with 10 px padding x=(w-text_w)/2:y=10)
 *  - Top right: x=w-tw:y=0 (with 10 px padding: x=w-tw-10:y=10)
 *  - Centered: x=(w-text_w)/2:y=(h-text_h)/2
 *  - Bottom left: x=0:y=h-th (with 10 px padding: x=10:y=h-th-10)
 *  - Bottom center: x=(w-text_w)/2:y=h-th (with 10 px padding: x=(w-text_w)/2:y=h-th-10)
 *  - Bottom right: x=w-tw:y=h-th (with 10 px padding: x=w-tw-10:y=h-th-10)
 */

$pos_x = '(w-text_w)/2';
$pos_y = '(h-text_h)/2';

$settings = array(
    'font' => 'Arial',						
    'x' => $pos_x,
    'y' => $pos_y,
    'fontsize' => 24,
    'fontcolor' => 'white'
);
/**
 * This function by default can be run without the array settings ( text only )
 * 
 * Example:
 * $FFmpeg->drawtext( "Hello World!" );
 */
$FFmpeg->drawtext( "Hello World!", $settings );
$FFmpeg->output( '/var/media/output.mp4' , 'mp4' );
$FFmpeg->vcodec('h264')->audioCodec( 'copy' );
$FFmpeg->ready();
print($FFmpeg->command);