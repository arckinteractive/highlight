<?php

$color = elgg_get_plugin_setting('highlight_color', 'highlight') ? elgg_get_plugin_setting('highlight_color', 'highlight') : 'yellow';

?>

.highlight {
	background-color: <?php echo $color; ?>;
}