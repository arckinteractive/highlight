<?php

namespace Highlight;

$color = elgg_get_plugin_setting('highlight_color', PLUGIN_ID);

if (!$color) {
	$color = 'yellow';
}
?>

.highlight {
	background-color: <?php echo $color; ?>;
}