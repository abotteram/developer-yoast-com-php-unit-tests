<?php
/**
Plugin name: Hello Rammstein
License: GPL3
 */

namespace Xyfi\Hello_Rammstein;

require 'vendor/autoload.php';

function xyfi_hr_init() {
	$initializer = new Hello_Rammstein();
	$initializer->register_hooks();
}

add_action( 'plugins_loaded', 'xyfi_hr_init' );
