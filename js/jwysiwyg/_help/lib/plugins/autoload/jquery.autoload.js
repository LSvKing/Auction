/**
 * Autoload
 */
(function($) {
// Autoload namespace: private properties and methods
var Autoload = {
	/**
	 * Include necessary CSS file
	 */
	css: function(file, options) {
		var collection = $("link[rel=stylesheet]");
		var path = options.basePath + options.cssPath + file;

		for (var i in collection) {
			if (path === collection[i].href) {
				// is loaded
				return true;
			}
		}

		var element = $("<link/>");
		element.attr({
			"href":		path,
			"media":	"all",
			"rel":		"stylesheet",
			"type":		"text/css"
		});
		$("head").append(element);
		return true;
	},

	/**
	 * Search path to js file
	 */
	findPath: function(baseFile) {
		baseFile = baseFile.replace(/\./g, "\\.");
		var collection = $("script");
		var reg = eval("/^(.*)" + baseFile + "$/");
		var path = null;

		for (var i in collection) {
			if (null === path) {
				var p = reg.exec(collection[i].src);
				if (null !== p) {
					return p[1];
				}
			}
		}
		return path;
	},

	/**
	 * Include necessary JavaScript file
	 */
	js: function(file, options) {
		var collection = $("script");
		var path = options.basePath + options.jsPath + file;

		for (var i in collection) {
			if (path === collection[i].src) {
				// is loaded
				return true;
			}
		}

		// When local used in Firefox got [Exception... "Access to restricted URI denied" code: "1012"]
		$.ajax({
			url: path,
			dataType: "script",
			success: function(data, textStatus, XMLHttpRequest) {
				if (options.successCallback) {
					options.successCallback();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest, textStatus, errorThrown);
			}
		});
		return true;
	}
};

/*
 * Autoload namespace: public properties and methods
 */
$.autoload = {
	css: function(names, options) {
		var basePath = Autoload.findPath(options.baseFile);
		var cssPath = (undefined === options.cssPath) ? "css/" : options.cssPath;
		options = {"basePath": basePath, "cssPath": cssPath};

		if ("string" === typeof names) {
			names = [names];
		}

		for (var i = 0; i < names.length; i++) {
			Autoload.css(names[i], options);
		}
	},

	js: function(names, options) {
		options.basePath = Autoload.findPath(options.baseFile);
		options.jsPath = (undefined === options.jsPath) ? "plugins/" : options.jsPath;

		if ("string" === typeof names) {
			names = [names];
		}

		for (var i = 0; i < names.length; i++) {
			Autoload.js(names[i], options);
		}
	}
};

//$.wysiwyg.autoload.init();

})(jQuery);