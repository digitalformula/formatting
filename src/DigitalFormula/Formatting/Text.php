<?php
/**
 *
 * Contains the Text class
 *
 * @author Chris Rasmussen, digitalformula.net
 * @category Development
 * @license MIT
 *
 */

namespace DigitalFormula\Formatting;

/**
 *
 * The Text class
 * 
 * @package DigitalFormula\Formatting
 *
 */
class Text
{

	/**
	 * @param $size
	 * @param string $unit
	 * @return string
	 */
	public static function humanReadableFileSize( $size, $unit = "" )
	{
		if ( ( !$unit && $size >= 1 << 30 ) || $unit == 'GB' ) {
			return number_format( $size / ( 1 << 30 ), 2 ) . 'GB';
		}
		if ( ( !$unit && $size >= 1 << 20 ) || $unit == 'MB' ) {
			return number_format( $size / ( 1 << 20 ), 2 ) . 'MB';
		}
		if ( ( !$unit && $size >= 1 << 10 ) || $unit == 'KB' ) {
			return number_format( $size / ( 1 << 10 ), 2 ) . 'KB';
		}
		return number_format( $size ) . ' bytes';
	}

	/**
	 * @param $string
	 * @param null $max
	 * @return string
	 */
	public static function shorten( $string, $max = NULL )
	{
		if( strlen( $string ) > $max )
		{
			return( substr( $string, 0, $max ) . ' ...' );
		}
		else
		{
			return( $string );
		}
	}

	/**
	 * @param $text
	 * @return bool|mixed|string
	 */
	public static function slugify( $text )
	{
		/* replace non letter or digits by - */
		$text = preg_replace( '~[^\\pL\d]+~u', '-', $text );
		/* trim */
		$text = trim( $text, '-' );
		/* transliterate */
		$text = iconv( 'utf-8', 'us-ascii//TRANSLIT', $text );
		/* lowercase */
		$text = strtolower( $text );
		/* remove unwanted characters */
		$text = preg_replace( '~[^-\w]+~', '', $text );
		if ( empty( $text ) ) {
			return 'n-a';
		}
		return $text;
	}

}