<?php
//Child Theme Functions File

if (!defined('AND_THEME_PATH')) {
  define('PCS_THEME_PATH', get_stylesheet_directory(__FILE__));
}

function buildTree(array &$elements, $parentId = 0){
	$branch = array();
	foreach ($elements as &$element) {
		if ($element->menu_item_parent == $parentId) {
			$children = buildTree($elements, $element->ID);
			if ($children)
				$element->wpse_children = $children;

			$branch[$element->ID] = $element;
			unset($element);
		}
	}
	return $branch;
}

set_post_thumbnail_size( 150, 150, true );

function change_post_types_slug( $args, $post_type ) {

/*item post type slug*/   
if ( 'publication' === $post_type ) {
   $args['rewrite']['slug'] = 'article';
}
if ( 'event' === $post_type ) {
    $args['rewrite']['slug'] = 'events';
}
if ( 'practice-area' === $post_type ) {
    $args['rewrite']['slug'] = 'practice-areas';
}
if ( 'industry-team' === $post_type ) {
    $args['rewrite']['slug'] = 'industry-teams';
}
if ( 'attorney' === $post_type ) {
    $args['rewrite']['slug'] = 'people';
}	

return $args;
}
add_filter( 'register_post_type_args', 'change_post_types_slug', 10, 2 );

function generate_vcard_data($name, $company, $job_title, $email, $business_no, $business_fax, $business_address, $notes) {
    $vcard = "BEGIN:VCARD\r\n";
    $vcard .= "VERSION:3.0\r\n";
    $vcard .= "FN:$name\r\n";
    $vcard .= "ORG:$company\r\n";
    $vcard .= "TITLE:$job_title\r\n";
    $vcard .= "EMAIL:$email\r\n";
    $vcard .= "URL;TYPE=WORK:https\://www.andersonkill.com\r\n";
    $vcard .= "TEL;TYPE=WORK:$business_no\r\n";
    $vcard .= "TEL;TYPE=WORK,FAX:$business_fax\r\n";
    $vcard .= "ADR;TYPE=WORK:;;$business_address\r\n";
    $vcard .= "NOTE:$notes\r\n";
    $vcard .= "END:VCARD\r\n";

    return $vcard;
}
function vcard_shortcode($atts) {
    $atts = shortcode_atts(array(
        'name' => '',
        'company' => '',
        'job_title' => '',
        'email' => '',
        'business_no' => '',
        'business_fax' => '',
        'business_address' => '',
        'notes' => '',
    ), $atts);

    $vcard_data = generate_vcard_data(
        $atts['name'],
        $atts['company'],
        $atts['job_title'],
        $atts['email'],
        $atts['business_no'],
        $atts['business_fax'],
        $atts['business_address'],
        $atts['notes']
    );

    $output = '<a href="data:text/vcard;charset=utf-8,' . rawurlencode($vcard_data) . '" download="' . $atts['name'] . '.vcf"><i class="fa fa-id-card-o" aria-hidden="true"></i> Save the Business Card</a>';

    return $output;
}
add_shortcode('vcard', 'vcard_shortcode');

function generate_ical_data($event_title, $start_date, $end_date, $location) {
    $ical_data = "BEGIN:VCALENDAR\r\n";
    $ical_data .= "VERSION:2.0\r\n";
    $ical_data .= "PRODID:-//Your Company//Your Website//EN\r\n";
    $ical_data .= "CALSCALE:GREGORIAN\r\n";
    $ical_data .= "BEGIN:VEVENT\r\n";
    $ical_data .= "UID:" . md5(uniqid(mt_rand(), true)) . "@yourwebsite.com\r\n";
    $ical_data .= "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";
    $ical_data .= "DTSTART:" . gmdate('Ymd\THis\Z', strtotime($start_date)) . "\r\n";
    $ical_data .= "DTEND:" . gmdate('Ymd\THis\Z', strtotime($end_date)) . "\r\n";
    $ical_data .= "LOCATION:" . $location . "\r\n";
    $ical_data .= "SUMMARY:" . $event_title . "\r\n";
    $ical_data .= "END:VEVENT\r\n";
    $ical_data .= "END:VCALENDAR\r\n";

    return $ical_data;
}
function ical_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title'       => 'Event Title',
        'start_date'  => '',
        'end_date'    => '',
        'location'    => '',
        'description' => '',
    ), $atts);

    $ical_data = generate_ical_data(
        $atts['title'],
        $atts['start_date'],
        $atts['end_date'],
        $atts['location']
    );

    $output = '<a href="data:text/calendar;charset=utf-8,' . rawurlencode($ical_data) . '" download="' . $atts['title'] . '.ics"><i class="fa fa-calendar" aria-hidden="true"></i> Add To  Calendar</a>';
    return $output;
}
add_shortcode('icalendar', 'ical_shortcode');


require_once PCS_THEME_PATH . '/classes/class.pcs-loader.php';
require_once PCS_THEME_PATH . '/classes/class.pcs-settings.php';



