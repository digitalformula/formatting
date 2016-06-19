<?php
/**
 *
 * Contains the Text class
 *
 * @author Chris Rasmussen, digitalformula.net
 * @category Development
 * @license MIT
 * @package DigitalFormula\Formatting
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

}