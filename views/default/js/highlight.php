//<script>

	$(document).ready(function() {
		// get any terms

		var vars = [], hash, highlight, color, query;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for (var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars[hash[0]] = hash[1];

			if (hash[0] == 'highlight') {
				highlight = hash[1];
			}

			if (hash[0] == 'highlight-color') {
				color = hash[1];
			}

			if (hash[0] == 'q' || hash[0] == 'term' || hash[0] == 'query' || hash[0] == 'keyword') {
				query = hash[1];
			}
		}


		if (highlight) {
			// clean up highlight if the query had operators such as *
			var operators = ['%2A'];
			for (var i = 0; i < operators.length; i++) {
				// does this end with an operator?
				if (highlight.indexOf(operators[i], highlight.length - operators[i].length) === highlight.length - operators[i].length) {
					// strip it out
					highlight = highlight.slice(0, -operators[i].length);
				}
			}

			// highlight matching strings
			$('body').highlight(highlight, true);

			if (color) {
				// convert url encoded hash
				if (color.lastIndexOf('%23', 0) === 0) {
					color = color.replace('%23', '#');
				}

				// default color was overridden by query param
				$('.highlight').css('backgroundColor', color);
			}
		}

		if ($('ul.search-list').length && query) {
			$('ul.search-list a').each(function(index, item) {
				var href = $(item).attr('href');

				//http://stackoverflow.com/questions/5999118/add-or-update-query-string-parameter
				var updateQueryStringParameter = function(uri, key, value) {
					var re = new RegExp("([?|&])" + key + "=.*?(&|#|$)", "i");
					if (uri.match(re)) {
						return uri.replace(re, '$1' + key + "=" + value + '$2');
					} else {
						var hash = '';
						var separator = uri.indexOf('?') !== -1 ? "&" : "?";
						if (uri.indexOf('#') !== -1) {
							hash = uri.replace(/.*#/, '#');
							uri = uri.replace(/#.*/, '');
						}
						return uri + separator + key + "=" + value + hash;
					}
				};

				if (href.lastIndexOf(elgg.get_site_url(), 0) === 0) {
					// this is an internal link, append the search string to it
					$(item).attr('href', updateQueryStringParameter(href, 'highlight', query));
				}
			});
		}
	});