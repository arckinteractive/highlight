# Highlight

A simple highlighting plugin based on the jquery plugin found at http://www.frightanic.com/projects/lenient-jquery-highlight-plugin-javascript/

## Instructions

1. Unzip to the mod directory

1. Activate the plugin through the admin plugins page

1. Set custom highlight color in plugin settings (flush caches if necessary)


## Description

This plugin highlights matching words on any page based on the 'highlight' query parameter.

eg.

```http://example.com?highlight=test```

would highlight the word 'test' everywhere it occurs on the page.

The color of the highlight can be overridden in the query parameter also

eg.

```http://example.com?highlight=test&highlight-color=%23000000```

would highlight the word 'test' with black instead (note the %23 is the urlencoded #)


Additionally, this plugin automatically appends search terms from the default Elgg search
results to internal links.  This means if you search for the word 'test' and get a blog post result,
if you click on that result and view the blog post, the word 'test' would be highlighted automatically.