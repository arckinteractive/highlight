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
				// set highlights as an array split by spaces
				highlight = decodeURIComponent((hash[1]+'').replace(/\+/g, '%20'));
				highlight = highlight.split(" ");
			}

			if (hash[0] == 'highlight-color') {
				color = decodeURIComponent((hash[1]+'').replace(/\+/g, '%20'));
			}

			if (hash[0] == 'q' || hash[0] == 'term' || hash[0] == 'query' || hash[0] == 'keyword') {
				query = hash[1];
			}
		}


		if (highlight) {
			// clean up highlight if the query had operators such as *
			var operators = ['*'];
			for (var i = 0; i < operators.length; i++) {
				// does this end with an operator?
				for (var j=0; j < highlight.length; j++) {
					if (highlight[j].indexOf(operators[i], highlight[j].length - operators[i].length) === highlight[j].length - operators[i].length) {
						// strip it out
						highlight[j] = highlight[j].slice(0, -operators[i].length);
					}	
				}
			}

			// highlight matching strings
			for (var k=0; k < highlight.length; k++) {
				$('body').highlight(highlight[k], true);
			}

			if (color) {
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