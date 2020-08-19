<?php

/**
 * @package WP Encryption
 *
 * @author     Go Web Smarty
 * @copyright  Copyright (C) 2019-2020, Go Web Smarty
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link       https://gowebsmarty.com
 * @since      Class available since Release 4.7.0
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
require_once WPLE_DIR . 'classes/le-trait.php';
/**
 * Sub-directory http challenge
 *
 * @since 4.7.0
 */
class WPLE_Subdir_Challenge_Helper
{
    public static function show_challenges( $opts )
    {
        if ( !isset( $opts['challenge_files'] ) && !isset( $opts['dns_challenges'] ) ) {
            return 'Could not retrieve domain verification challenges. Please go back and try again.';
        }
        $output = '<h2>Please verify your domain ownership by completing one of the below challenges:</h2>';
        $output .= WPLE_Trait::wple_progress_bar();
        $output .= '<div class="subdir-challenges-block">    
    <div class="subdir-http-challenge manualchallenge">' . SELF::HTTP_challenges_block( $opts['challenge_files'] ) . '</div>
    <div class="subdir-dns-challenge manualchallenge">' . SELF::DNS_challenges_block( $opts['dns_challenges'] ) . '</div>
    </div>
    <div id="wple-error-popper">    
      <div class="wple-flex">
        <img src="' . WPLE_URL . 'admin/assets/loader.png" class="wple-loader"/>
        <div class="wple-error">Error</div>
      </div>
    </div>';
        $havecPanel = ( FALSE !== get_option( 'wple_have_cpanel' ) ? get_option( 'wple_have_cpanel' ) : 0 );
        
        if ( !$havecPanel ) {
            $output .= '<div class="wple-error-firewall">
        <div>
          <img src="' . WPLE_URL . 'admin/assets/firewall-shield-firewall.png"/>
        </div>
        <div class="wple-upgrade-features">
          <span><b>Automatic</b><br>Domain Verification</span>
          <span><b>Automatic</b><br>SSL Installation</span>
          <span><b>Automatic</b><br>SSL Renewal</span>
          <span><b>Most</b><br>Secure Firewall</span>
          <span><b>Performance</b><br>Boost with CDN</span>
          <a href="https://wpencryption.com/#firewall" target="_blank">Learn More <span class="dashicons dashicons-external"></span></a>
        </div>
      </div>';
        } else {
            $output .= '<div class="wple-error-firewall">
        <div>
          <img src="' . WPLE_URL . 'admin/assets/firewall-shield-pro.png"/>
        </div>
        <div class="wple-upgrade-features">
          <span><b>Automatic</b><br>Domain Verification</span>
          <span><b>Automatic</b><br>SSL Installation</span>
          <span><b>Automatic</b><br>SSL Renewal</span>
          <span><b>Wildcard</b><br>SSL Support</span>
          <span><b>Multisite</b><br>Network Support</span>
          <a href="' . admin_url( '/admin.php?page=wp_encryption-pricing' ) . '">UPGRADE</a>
        </div>
      </div>';
        }
        
        return $output;
    }
    
    public static function HTTP_challenges_block( $challenges )
    {
        if ( empty($challenges) ) {
            return;
        }
        $list = '<h3>HTTP Challenges</h3>
    <span class="manual-verify-vid">
    <a href="https://youtu.be/GVnEQU9XWG0" target="_blank" class="videolink"><span class="dashicons dashicons-video-alt"></span> Video Tutorial</a>
    </span>
    <p><b>Step 1:</b> Download HTTP challenge files below</p>';
        $nc = wp_create_nonce( 'subdir_ch' );
        $filesExpected = '';
        $bareDomain = str_ireplace( array( 'https://', 'http://' ), array( '', '' ), site_url() );
        if ( FALSE !== ($slashpos = stripos( $bareDomain, '/' )) ) {
            $bareDomain = substr( $bareDomain, 0, $slashpos );
        }
        for ( $i = 0 ;  $i < count( $challenges ) ;  $i++ ) {
            $j = $i + 1;
            $list .= '<a href="?page=wp_encryption&subdir_chfile=' . $j . '&nc=' . $nc . '"><span class="dashicons dashicons-download"></span>&nbsp;Download File ' . $j . '</a><br />';
            $filesExpected .= '<div class="wple-http-manual-verify verify-' . esc_attr( $i ) . '"><a href="http://' . trailingslashit( esc_html( $bareDomain ) ) . '.well-known/acme-challenge/' . esc_html( $challenges[$i]['file'] ) . '" target="_blank">' . $j . '. Verification File&nbsp;<span class="dashicons dashicons-external"></span></a></div>';
        }
        $list .= '
    <p><b>Step 2:</b> Open FTP or File Manager on your hosting panel</p>
    <p><b>Step 3:</b> Navigate to your <b>domain</b> / <b>sub-domain</b> folder. Create <b>.well-known</b> folder and create <b>acme-challenge</b> folder inside .well-known folder if not already created.</p>
    <p><b>Step 4:</b> Upload the above downloaded challenge files into acme-challenge folder</p>

    <div class="wple-http-accessible">
    <p>Uploaded files should be publicly viewable at:</p>
    ' . $filesExpected . '
    </div>
    
    ' . wp_nonce_field(
            'verifyhttprecords',
            'checkhttp',
            false,
            false
        ) . '
    <button id="verify-subhttp" class="subdir_verify"><span class="dashicons dashicons-update"></span>&nbsp;Verify HTTP Challenges</button>

    <div class="http-notvalid">' . esc_html__( 'Could not verify HTTP challenges. Please check whether HTTP challenge files uploaded to acme-challenge folder is publicly accessible.', 'wp-letsencrypt-ssl' ) . '</div>';
        if ( FALSE != ($httpvalid = get_option( 'wple_http_valid' )) && $httpvalid ) {
            $list .= '<div class="wple-no-http">HTTP verification not possible on your site as your hosting server blocks bot access. Please proceed with DNS verification.</div>';
        }
        return $list;
    }
    
    public static function DNS_challenges_block( $challenges )
    {
        $list = '<h3>DNS Challenges</h3>
    <span class="manual-verify-vid">
    <a href="https://youtu.be/BBQL69PDDrk" target="_blank" class="videolink"><span class="dashicons dashicons-video-alt"></span> Video Tutorial</a>
    </span>
    <p><b>Step 1:</b> Go to your domain DNS manager. Add below TXT records using add TXT record option.</p>';
        $dmn = str_ireplace( array( 'https://', 'http://', 'www.' ), '', site_url() );
        for ( $i = 0 ;  $i < count( $challenges ) ;  $i++ ) {
            
            if ( FALSE !== ($slashpos = stripos( $dmn, '/' )) ) {
                $pdomain = substr( $dmn, 0, $slashpos );
            } else {
                $pdomain = $dmn;
            }
            
            $parts = explode( '.', $dmn );
            $subdomain = '';
            $domain_code = explode( '||', $challenges[$i] );
            $acmedomain = str_ireplace( $pdomain, '', $domain_code[0] );
            if ( count( $parts ) > 2 && strlen( $parts[0] ) >= 3 ) {
                $subdomain = $parts[0] . '.';
            }
            
            if ( count( $parts ) > 3 ) {
                //double nested subdomain
                $subdomain = '';
                $acmedomain = $domain_code[0];
            }
            
            $acme = '_acme-challenge.' . esc_html( $acmedomain ) . $subdomain;
            if ( count( $parts ) <= 3 ) {
                $acme = substr( $acme, 0, -1 );
            }
            $list .= '<div class="subdns-item">
      Name: <b>' . $acme . '</b><br>
      TTL: <b>60</b> or <b>Lowest</b> possible value<br>
      Value: <b>' . esc_html( $domain_code[1] ) . '</b>
      </div>';
        }
        $list .= '
    <p><b>Step 2:</b> Please wait 5-10 Minutes for newly added DNS to propagate and then verify DNS using below button.</p>

    ' . wp_nonce_field(
            'verifydnsrecords',
            'checkdns',
            false,
            false
        ) . '
    <button id="verify-subdns" class="subdir_verify"><span class="dashicons dashicons-update"></span>&nbsp;Verify DNS Challenges</button>

    <div class="dns-notvalid">' . esc_html__( 'Could not verify DNS records. Please check whether you have added above DNS records perfectly or try again after 5 minutes if you added DNS records just now.', 'wp-letsencrypt-ssl' ) . '</div>';
        return $list;
    }
    
    public static function download_challenge_files()
    {
        
        if ( isset( $_GET['subdir_chfile'] ) ) {
            if ( !wp_verify_nonce( $_GET['nc'], 'subdir_ch' ) ) {
                die( 'Unauthorized request. Please try again.' );
            }
            $opts = get_option( 'wple_opts' );
            
            if ( isset( $opts['challenge_files'] ) && !empty($opts['challenge_files']) ) {
                $req = intval( $_GET['subdir_chfile'] ) - 1;
                $ch = $opts['challenge_files'][$req];
                if ( !isset( $ch ) ) {
                    wp_die( 'Requested challenge file not exists. Please go back and try again.' );
                }
                SELF::compose_challenge_files( $ch['file'], $ch['value'] );
            } else {
                wp_die( 'HTTP challenge files not ready. Please go back and try again.' );
            }
        
        }
    
    }
    
    private static function compose_challenge_files( $name, $content )
    {
        $file = sanitize_file_name( $name );
        file_put_contents( $file, sanitize_text_field( $content ) );
        header( 'Content-Description: File Transfer' );
        header( 'Content-Type: text/plain' );
        header( 'Content-Length: ' . filesize( $file ) );
        header( 'Content-Disposition: attachment; filename=' . basename( $file ) );
        readfile( $file );
        exit;
    }

}