/**
 * Controls: Image plugin
 * 
 * Depends on jWYSIWYG
 */
(function($) {
if (undefined === $.wysiwyg) {
	throw "wysiwyg.image.js depends on $.wysiwyg";
}

if (!$.wysiwyg.controls) {
	$.wysiwyg.controls = {};
}

var domTraversingSameLevel = function(range, el, cnt) {
	this.debug = false;
	var foundElements = [];

	while (el) {
if (this.debug) { console.log(cnt, "routine", el); }
if (this.debug) { console.log(cnt, el.nodeName.toLowerCase(), el.previousElementSibling, el.parentNode); }

		if ("img" === el.nodeName.toLowerCase()) {
			// gecko
			if (range.isPointInRange) {
				if (range.isPointInRange(el, 1)) {
					foundElements.push(el);
				}
			}
			// opera
			else {
				foundElements.push(el);
			}

if (this.debug) { console.log("Elements found = ", foundElements); }
		}

		el = el.nextElementSibling;
	}

	return foundElements;
};

/*
 * Wysiwyg namespace: public properties and methods
 */
$.wysiwyg.controls.image = function(Wysiwyg) {
	var self = Wysiwyg;
	var elements, formImageHtml = '<form class="wysiwyg"><fieldset><legend>Insert Image</legend><label>Image URL: <input type="text" name="src" value=""/></label><label>Image Title: <input type="text" name="imgtitle" value=""/></label><label>Image Description: <input type="text" name="description" value=""/></label><input type="submit" class="button" value="Insert Image"/> <input type="reset" value="Cancel"/></fieldset></form>';
	var img = {
		alt: "",
		self: null,			// link to element node
		src: "http://",
		title: ""
	};

	var range = Wysiwyg.getInternalRange();

	if (range.startContainer && range.endContainer) {
		var start = range.startContainer;
		if (start.nodeType === 3) {
			start = start.parentNode;
		}

		var end = range.endContainer;
		if (end.nodeType === 3) {
			end = end.parentNode;
		}

		if (start === end) {
			var node = range.commonAncestorContainer;
			if (node.nodeType === 3) {
				node = node.parentNode;
			}

			var traversing = domTraversingSameLevel(range, node.firstElementChild, 1);

			if (1 === traversing.length) {
				img.self = traversing[0];
				// reduce range to img element work in Firefox 3.6, Opera 11
//				range.selectNode(img.self);

				var selection = Wysiwyg.getInternalSelection();
				selection.collapse(img.self, 0);
				if (img.self.nextSibling) {
					selection.extend(img.self.nextSibling, 0);
				}
				else {
					selection.extend(img.self, 0);
				}

				img.src = img.self.src;
				img.alt = img.self.alt;
				img.title = img.self.title;

				var i;
				for (i in img) {
					if (undefined === img[i]) {
						img[i] = "";
					}
				}
			}
		}
	}

	if ($.modal) {
		elements = $(formImageHtml);
		elements.find('input[name="src"]').val(img.src);
		elements.find('input[name="imgtitle"]').val(img.title);
		elements.find('input[name="description"]').val(img.alt);

		$.modal(elements, {
			onShow: function(dialog) {
				$("input:submit", dialog.data).click(function(e) {
					e.preventDefault();
					var szURL = $('input[name="src"]', dialog.data).val();
					var title = $('input[name="imgtitle"]', dialog.data).val();
					var description = $('input[name="description"]', dialog.data).val();
					if (img.self) {
						// to preserve all img attributes
						$(img.self).attr("src", szURL).attr("title", title).attr("description", description);
					}
					else {
						var image = "<img src='" + szURL + "' title='" + title + "' alt='" + description + "' />";
						self.insertHtml(image);
					}
					$.modal.close();
				});
				$("input:reset", dialog.data).click(function(e) {
					e.preventDefault();
					$.modal.close();
				});
			},
			maxWidth: self.defaults.formWidth,
			maxHeight: self.defaults.formHeight,
			overlayClose: true
		});
	}
	else if ($.fn.dialog) {
		elements = $(formImageHtml);
		elements.find("input[name=src]").val(img.src);
		elements.find("input[name=imgtitle]").val(img.title);
		elements.find("input[name=description]").val(img.alt);

		var dialog = elements.appendTo("body");
		dialog.dialog({
			modal: true,
			width: self.defaults.formWidth,
			height: self.defaults.formHeight,
				open: function(ev, ui) {
					$("input:submit", dialog).click(function(e) {
					e.preventDefault();
					var szURL = $('input[name="src"]', dialog).val();
					var title = $('input[name="imgtitle"]', dialog).val();
					var description = $('input[name="description"]', dialog).val();
					if (img.self) {
						// to preserve all img attributes
						$(img.self).attr("src", szURL).attr("title", title).attr("description", description);
					}
					else {
						var image = "<img src='" + szURL + "' title='" + title + "' alt='" + description + "' />";
						self.insertHtml(image);
					}
					$(dialog).dialog("close");
				});
				$("input:reset", dialog).click(function(e) {
					e.preventDefault();
					$(dialog).dialog("close");
				});
			},
			close: function(ev, ui){
				dialog.dialog("destroy");
			}
		});
	}
	else {
		if ($.browser.msie) {
			self.ui.focus();
			self.editorDoc.execCommand("insertImage", true, null);
		}
		else {
			var szURL = prompt("URL", img.src);
			if (szURL && szURL.length > 0) {
				if (img.self) {
					// to preserve all img attributes
					$(img.self).attr("src", szURL);
				}
				else {
					self.editorDoc.execCommand("insertImage", false, szURL);
				}
			}
		}
	}

	$(self.editorDoc).trigger("wysiwyg:refresh");
};

$.wysiwyg.insertImage = function(object, szURL, attributes) {
	if ("object" !== typeof(object) || !object.context) {
		object = this;
	}

	if (!object.each) {
		console.error("Something goes wrong, check object");
	}

	return object.each(function() {
		var self = $(this).data("wysiwyg");
		
		if (!self) {
			return this;
		}

		if (!szURL || szURL.length === 0) {
			return this;
		}
		
		if ($.browser.msie) {
			self.ui.focus();
		}
		
		if (attributes) {
			self.editorDoc.execCommand("insertImage", false, "#jwysiwyg#");
			var image = self.getElementByAttributeValue("img", "src", "#jwysiwyg#");
	
			if (image) {
				image.src = szURL;
	
				var attribute;
				for (attribute in attributes) {
					image.setAttribute(attribute, attributes[attribute]);
				}
			}
		}
		else {
			self.editorDoc.execCommand("insertImage", false, szURL);
		}
	
		$(self.editorDoc).trigger("wysiwyg:refresh");
	
		return this;
	});
};

})(jQuery);