<?php
/**
 * Copyright (C) 2014-2016 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

class Ai1wm_Status {

	public static function error( $message, $title = null ) {
		self::log( array( 'type' => 'error', 'message' => $message, 'title' => $title ) );
	}

	public static function info( $message, $title = null ) {
		self::log( array( 'type' => 'info', 'message' => $message, 'title' => $title ) );
	}

	public static function download( $message, $title = null ) {
		self::log( array( 'type' => 'download', 'message' => $message, 'title' => $title ) );
	}

	public static function confirm( $message, $title = null ) {
		self::log( array( 'type' => 'confirm', 'message' => $message, 'title' => $title ) );
	}

	public static function done( $message, $title = null ) {
		self::log( array( 'type' => 'done', 'message' => $message, 'title' => $title ) );
	}

	public static function progress( $percent, $title = null ) {
		self::log( array( 'type' => 'progress', 'percent' => $percent, 'title' => $title ) );
	}

	public static function log( $data = array() ) {
		if ( $handle = fopen( ai1wm_status_path(), 'w' ) ) {
			fwrite( $handle, json_encode( $data ) );
			fclose( $handle );
		}
	}
}
