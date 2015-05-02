=== WordPress Shortcode-Helper ===
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZU9TXHEWGX9EJ
Tags: shortcode, tinymce, button, helper, backend, javascript, popup
Requires at least: 3.9
Tested up to: 4.2
Stable tag: 1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Make your shortcodes easy to use for everyone. Doesn't matter how many or how complex they are.

== Description ==

WordPress Shortcode-Helper is a plugin that helps you to make your shortcodes easier for clients. Make them avialble through a dropdown-list in the WordPress-Editor.

Features include:

*	NEW: JSON-Generator (create valid JSON-Code within the backend)
*	Media-Field: Choose an image from the media-popup (option-type: media)
*	Unlimited shortcodes
*	Comes without annoying standard shortcodes
*	Choose your own description for every code
*	Multiple input-fields for attributes
*	Many settings to provide the best UI for your shortcodes

Comming soon:

*	Multilingual descriptions
*	More input-fields
*	Any ideas? 



First, you activate the plugin and create a json-file in the root of your template-folder or in the plugin-folder (standard directory is the root of your template-folder but you can change this in the settings of the plugin). This file contains the information about every shortcode with its attributes and descriptions. Then, the plugin creates a dropdown in your editor with the list of all available codes. That's it!

Requires WordPress 3.9 and TinyMCE 4(automatically used by Wordpress 3.9)

== Installation ==


1. Upload `Shortcode-Helper` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create the file 'shortcodes.json' in your template-folder
4. Copy the example-code to 'shortcodes.json' and edit it for your purpose

Always check your json-file for validation-errors! http://jsonlint.com/

Sample json-file:

`
[
    {
        "text": "Button",
        "value": "btn",
        "content": true,
        "description": true,
        "description_text": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
        "options": [
            {
                "type": "textbox",
                "name": "href",
                "label": "URL"
            },
            {
                "type": "select",
                "name": "blank",
                "label": "New Tab",
                "options": [
                    {
                        "text": "No",
                        "value": "no"
                    },
                    {
                        "text": "Yes",
                        "value": "yes"
                    },
                    {
                        "type": "media",
                        "name": "img",
                        "label": "Image"
                    }
                ]
            }
        ]
    },
    {
        "text": "1/2 Column",
        "value": "one_half",
        "content": true,
        "hideContentInput": true,
        "description": true,
        "description_text": "Creates a 1/2 column",
        "options": [
            {
                "type": "select",
                "name": "position",
                "label": "Position",
                "options": [
                    {
                        "text": "First",
                        "value": "first"
                    },
                    {
                        "text": "Last",
                        "value": "last"
                    }
                ]
            }
        ]
    },
    {
        "text": "1/3 Column",
        "value": "one_third",
        "content": true,
        "hideContentInput": true,
        "description": true,
        "description_text": "Creates a 1/3-Column",
        "options": [
            {
                "type": "select",
                "name": "position",
                "label": "Position",
                "options": [
                    {
                        "text": "First",
                        "value": "first"
                    },
                    {
                        "text": "Last",
                        "value": "last"
                    }
                ]
            }
        ]
    },
    {
        "text": "2/3 Column",
        "value": "two_third",
        "content": true,
        "hideContentInput": true,
        "description": true,
        "description_text": "Creates a 2/3-Column",
        "options": [
            {
                "type": "select",
                "name": "position",
                "label": "Position",
                "options": [
                    {
                        "text": "First",
                        "value": "first"
                    },
                    {
                        "text": "Last",
                        "value": "last"
                    }
                ]
            }
        ]
    },
    {
        "text": "Tabwrapper",
        "value": "tabwrapper",
        "description": true,
        "content": true,
        "hideContentInput": true,
        "description_text": "Creates a Wrapper for Tabs"
    },
    {
        "text": "Tab",
        "value": "tab",
        "content": true,
        "description": true,
        "hideContentInput": true,
        "description_text": "Creates a Tab",
        "options": [
            {
                "type": "select",
                "name": "active",
                "label": "Active",
                "options": [
                    {
                        "text": "Yes",
                        "value": "yes"
                    },
                    {
                        "text": "No",
                        "value": "no"
                    }
                ]
            },
            {
                "type": "textbox",
                "name": "title",
                "label": "Title"
            }
        ]
    }
]
`

== Frequently Asked Questions ==

= Will I have to change my shortcodes? =
The shortcode-helper is just a wrapper for your shortcodes. That means you code your shortcodes as normally, edit the `shortcodes.json` and the plugin copies the correct shortcode into the editor.

== Screenshots ==

1. Dropdown
2. Popup for attributes
3. JSON-Generator

== Changelog ==

= Version 1.4 =
*	NEW: JSON-Generator (create valid JSON-Code within the backend)
*	Sample JSON is valid now

= Version 1.3.1 =
*	Added button to custom post types
*	New icon

= Version 1.3 =
*	Fixed js-errors
*	Fixed problem with inserting the content
*   Added Media-Support

= Version 1.2 =
*	Change directory of the json-file (choose between template- or plugin-folder)
*	Fixed javascript-errors
*	Cleanup

= Version 1.1 =
*	Now you can hide the content-input in the popup
*	New description-area
*	Cleanup