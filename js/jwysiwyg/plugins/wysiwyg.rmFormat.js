/**
 * rmFormat plugin
 * 
 * Depends on jWYSIWYG
 */
(function($) {
if (undefined === $.wysiwyg) {
	throw "wysiwyg.rmFormat.js depends on $.wysiwyg";
}

/*
 * Wysiwyg namespace: public properties and methods
 */
var rmFormat = {
	name: "rmFormat",
	version: "",
	defaults: {
		rules: {
			heading: true,
			table: true
		}
	},
	options: {},
	enabled: false,
	debug:	false,

	domRemove: function(node) {
		// replace h1-h6 with p
		if (this.defaults.rules.heading) {
			if (node.nodeName.toLowerCase().match(/^h[1-6]$/)) {
				$(node).replaceWith($('<p/>').html($(node).contents()));

				return true;
			}
		}

		// remove tables not smart enough )
		if (this.defaults.rules.table) {
			if (node.nodeName.toLowerCase().match(/^(table|t[dhr]|t(body|foot|head))$/)) {
				$(node).replaceWith($(node).contents());

				return true;
			}
		}

		return false;
	},

	domTraversing: function(el, start, end, canRemove, cnt) {
		if (null === canRemove) {
			canRemove = false;
		}

		while (el) {
if (this.debug) { console.log(cnt, "canRemove=", canRemove); }
			if (el.firstElementChild) {
if (this.debug) { console.log(cnt, "domTraversing", el.firstElementChild); }
				return this.domTraversing(el.firstElementChild, start, end, canRemove, cnt + 1);
			}
			else {
if (this.debug) { console.log(cnt, "routine", el); }
				var isDomRemoved = false;

				if (start === el) {
					canRemove = true;
				}

				if (canRemove) {
					var p;
					if (el.previousElementSibling) {
						p = el.previousElementSibling;
					}
					else {
						p = el.parentNode;
					}
if (this.debug) { console.log(cnt, el.nodeName, el.previousElementSibling, el.parentNode, p); }

					isDomRemoved = this.domRemove(el);
					if (this.domRemove(el)) {
if (this.debug) { console.log("p", p); }
						// step back to parent or previousElement to traverse again then element is removed
						el = p;
						//return DomTraversing(el.firstElementChild, start, end, canRemove, cnt + 1);
					}

					if (start !== end && end === el) {
						return true;
					}
				}

				if (false === isDomRemoved) {
					el = el.nextElementSibling;
				}
			}
		}

		return false;
	},

	run: function(Wysiwyg) {
		var r = Wysiwyg.getInternalRange();

		var start = r.startContainer;
		if (start.nodeType === 3) {
			start = start.parentNode;
		}

		var end = r.endContainer;
		if (end.nodeType === 3) {
			end = end.parentNode;
		}

if (this.debug) { 
console.log("start", start, start.nodeType, start.nodeName, start.parentNode);
console.log("end", end, end.nodeType, end.nodeName, end.parentNode);
}
		var node = r.commonAncestorContainer;
		if (node.nodeType === 3) {
			node = node.parentNode;
		}

if (this.debug) {
console.log("node", node, node.nodeType, node.nodeName.toLowerCase(), node.parentNode, node.firstElementChild);
console.log(start === end);
}

		var traversing = null;
		if (start === end) {
			traversing = this.domTraversing(node, start, end, true, 1);
		}
		else {
			traversing = this.domTraversing(node.firstElementChild, start, end, null, 1);
		}

if (this.debug) { console.log("DomTraversing=", traversing); }
	}
};

$.wysiwyg.plugin.register(rmFormat);

})(jQuery);