<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
  'pi_name' => 'Emogrifier',
  'pi_version' => '1.0',
  'pi_author' => 'Nathan Pitman',
  'pi_author_url' => 'http://www.ihasco.co.uk',
  'pi_description' => 'Emogrifies HTML and CSS',
  'pi_usage' => Emogrifier::usage()
  );

/**
 * Emogrifier Class
 *
 * @package         ExpressionEngine
 * @category        Plugin
 * @author          Nathan Pitman
 * @copyright       Copyright (c) 2016, iHasco Ltd
 * @link            http://www.ihasco.co.uk
 */

require_once('libraries/Emogrifier.php');

class Emogrifier {

    function Emogrifier() {

        $this->EE =& get_instance();

        $html = $this->EE->TMPL->tagdata;

        if ($html != "") {

            // Initiate Emogrifier Library
            $emogrifier = new \Pelago\Emogrifier();

            $emogrifier->setHtml($html);

            // Get the CSS
            if ($css = file_get_contents($this->EE->TMPL->fetch_param('css'))) {
                $emogrifier->setCss($css);
            }

            // Emogrify the HTML and CSS
            $this->return_data = $emogrifier->emogrify();

        } else {
            $this->return_data = "Error: You must provide HTML content between the opening and closing tags.";
            return;
        }
    }

    public static function usage()
    {
    ob_start();
    ?>
This plug-in is designed to help you encode and decode a string of text so that it can be safely passed from one page to another in the URL (for example).

BASIC USAGE:

{exp:emogrifier css="assets/css/email.css"}My HTML email template{/exp:emogrifier}

PARAMETERS:

css = 'assets/css/email.css' (optional)
 - The css file that you want to emogrify

RELEASE NOTES:

1.0 - Initial Release.

For updates and support check the developers website: http://github.com/ihasco/Emogrifier
    <?php
    $buffer = ob_get_contents();

    ob_end_clean();

    return $buffer;
    }
    // END

}

/* End of file pi.emogrifier.php */
/* Location: ./system/expressionengine/third_party/emogrifier/pi.emogrifier.php */
