<?php

/**
 * @package WP Encryption
 *
 * @author     Go Web Smarty
 * @copyright  Copyright (C) 2019-2020, Go Web Smarty
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link       https://gowebsmarty.com
 * @since      Class available since Release 4.3.0
 *
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */
class WPLE_Activator
{
    public static function activate( $networkwide )
    {
        if ( is_multisite() && $networkwide ) {
            wp_die( 'WP Encryption cannot be activated network wide. Please activate on your individual sites.' );
        }
        $opts = ( get_option( 'wple_opts' ) === FALSE ? array(
            'expiry' => '',
        ) : get_option( 'wple_opts' ) );
        //initial disable ssl forcing
        $opts['force_ssl'] = 0;
        update_option( 'wple_opts', $opts );
        SELF::wple_cpanel_identity();
        if ( isset( $opts['expiry'] ) && $opts['expiry'] != '' && !wp_next_scheduled( 'wple_ssl_reminder_notice' ) ) {
            wp_schedule_single_event( strtotime( '-10 day', strtotime( $opts['expiry'] ) ), 'wple_ssl_reminder_notice' );
        }
    }
    
    public static function wple_cpanel_identity()
    {
        $host = str_ireplace( array( 'https://', 'http://' ), array( '', '' ), site_url() );
        if ( FALSE != ($slashpos = stripos( $host, '/' )) ) {
            $host = substr( $host, 0, $slashpos );
        }
        $cp = ( is_ssl() ? 'https://' . $host . ':2083' : 'http://' . $host . ':2082' );
        $response = wp_remote_get( $cp, [
            'headers'   => [
            'Connection' => 'close',
        ],
            'sslverify' => false,
        ] );
        $cpanel = true;
        if ( is_wp_error( $response ) ) {
            $cpanel = false;
        }
        
        if ( $cpanel ) {
            update_option( 'wple_have_cpanel', 1 );
        } else {
            update_option( 'wple_have_cpanel', 0 );
        }
    
    }

}