<?php

namespace Highlight;

const PLUGIN_ID = 'highlight';
const PLUGIN_VERSION = 20150515;

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');


function init() {
	elgg_extend_view('js/elgg', 'js/jqueryhighlight');
	elgg_extend_view('js/elgg', 'js/highlight');
	elgg_extend_view('css/elgg', 'css/highlight');
}