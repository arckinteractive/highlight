<?php

function highlight_init() {
	//CSS
	elgg_extend_view('css/elgg', 'css/highlight');
	//JS
	elgg_extend_view('js/elgg', 'js/jqueryhighlight');
	elgg_extend_view('js/elgg', 'js/highlight');
}

return function() {
	elgg_register_event_handler('init', 'system', 'highlight_init');
};