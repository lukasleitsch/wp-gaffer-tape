<?php

use Leitsch\GafferTape\PluginServiceProvider;

require __DIR__ . '/vendor/autoload.php';

/*
Plugin Name:	Gaffer Tape
Description:	With Gaffer Tape you can fix everything also WordPress.
Version:		1.0.0
Author:			Lukas Leitsch
Author URI:		https://leitsch.org
License:		GPL2
License URI:	https://www.gnu.org/licenses/gpl-2.0.html

Gaffer Tape is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Gaffer Tape is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Embed Privacy. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// exit if ABSPATH is not defined
defined( 'ABSPATH' ) || exit;

PluginServiceProvider::instance()->init();
