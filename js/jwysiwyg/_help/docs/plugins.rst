=======
Plugins
=======

Name your plugin as wysiwyg.\ **plugin_name**\ .js and place it under *plugins*
directory.

Sample
------

::

    (function($) {

        // Check that jWYSIWYG was loaded
        if (undefined === $.wysiwyg) {
            throw "wysiwyg.plugin_name.js depends on $.wysiwyg";
        }

        // plugin
        var PluginName = {
            name: "PluginName",

            // plugin defaults
            defaults: {},

            somePluginMethod: function(text) {
                // do something
            },

            methodThatWorksWithJqueryObjects: function(object, arg1, arg2) {
                // standard operations
                if ("object" !== typeof(object) || !object.context) {
                    object = this;
                }

                if (!object.each) {
                    console.error("Something goes wrong, check object");
                }

                return object.each(function() {
                    var Wysiwyg = $(this).data("wysiwyg");

                    if (!Wysiwyg) {
                        return this;
                    }

                    // Plugin code
                    // do something
                });
            }
        };

        // Register your plugin
        $.wysiwyg.plugin.register(PluginName);

    })(jQuery);

There are two methods to run your plugin::

    $("textarea").wysiwyg("PluginName.somePluginMethod", "some text")
    $("textarea").wysiwyg("PluginName.methodThatWorksWithJqueryObjects", "arg1", "arg2")

or ::

    $.wysiwyg.PluginName.somePluginMethod("some text")
    $.wysiwyg.PluginName.methodThatWorksWithJqueryObjects($("textarea"), "arg1", "arg2")

See also `_help/examples/12-writing-plugins.html
<https://github.com/akzhan/jwysiwyg/blob/master/_help/examples/12-writing-plugins.html>`_