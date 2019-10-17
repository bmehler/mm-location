<?php

namespace MM\Location;

function HelloWorldShortcode() {
	return '<p>Hello World!</p>';
}

add_shortcode('helloworld', 'MM\Location\HelloWorldShortcode');