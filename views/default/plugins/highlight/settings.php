<?php

$entity = elgg_extract('entity', $vars);

echo elgg_view_field([
	'#type' => 'fieldset',
	'legend' => elgg_echo('highlight:color'),
	'fields' => [
		[
			'#type' => 'text',
			'#label' => elgg_echo('highlight:color:help'),
			'name' => 'params[highlight_color]',
			'value' => $entity->highlight_color ? $entity->highlight_color : 'yellow',
		],
	],
]);
