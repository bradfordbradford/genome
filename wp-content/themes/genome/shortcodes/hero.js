// jQuery(document).ready(function($) {

//     tinymce.create('tinymce.plugins.wpse72394_plugin', {
//         init : function(ed, url) {
//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72394_insert_shortcode', function() {
//                     selected = tinyMCE.activeEditor.selection.getContent();

//                     if( selected ){
//                         //If text is selected when button is clicked
//                         //Wrap shortcode around it.
//                         content =  '[hero title="'+selected+'" by="" subtitle="" vimeo_id=""]';
//                     }else{
//                         content =  '[hero title="" by="" subtitle="" vimeo_id=""]';
//                     }

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });

//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72395_insert_shortcode', function() {
//                     selected = tinyMCE.activeEditor.selection.getContent();

//                     if( selected ){
//                         //If text is selected when button is clicked
//                         //Wrap shortcode around it.
//                         content =  '[small-caps]'+selected+'[/small-caps]';
//                     }else{
//                         content =  '[small-caps][/small-caps]';
//                     }

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });

//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72396_insert_shortcode', function() {
//                     selected = tinyMCE.activeEditor.selection.getContent();

//                     if( selected ){
//                         //If text is selected when button is clicked
//                         //Wrap shortcode around it.
//                         content =  '[block-small align="center"]'+selected+'[/block-small]';
//                     }else{
//                         content =  '[block-small align="center"][/block-small]';
//                     }

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });

//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72398_insert_shortcode', function() {
//                     content =  '[hr-break]';

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });

//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72397_insert_shortcode', function() {
//                     content =  '[hr-thick]';

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });

//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72399_insert_shortcode', function() {
//                     selected = tinyMCE.activeEditor.selection.getContent();

//                     if( selected ){
//                         //If text is selected when button is clicked
//                         //Wrap shortcode around it.
//                         content =  '[heading]'+selected+'[/heading]';
//                     }else{
//                         content =  '[heading][/heading]';
//                     }

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });

//                 // Register command for when button is clicked
//                 ed.addCommand('wpse72400_insert_shortcode', function() {
//                     content =  '[video align="right" vimeo_id=""][/video]';

//                     tinymce.execCommand('mceInsertContent', false, content);
//                 });


//             // Register buttons - trigger above command when clicked
//             ed.addButton('wpse72394_button', {title : 'H', cmd : 'wpse72394_insert_shortcode', image: url + '/h.png' });
//             ed.addButton('wpse72395_button', {title : 'S', cmd : 'wpse72395_insert_shortcode', image: url + '/s.png' });
//             ed.addButton('wpse72396_button', {title : 'B', cmd : 'wpse72396_insert_shortcode', image: url + '/b.png' });
//             ed.addButton('wpse72397_button', {title : 'ht', cmd : 'wpse72397_insert_shortcode', image: url + '/ht.png' });
//             ed.addButton('wpse72398_button', {title : 'hb', cmd : 'wpse72398_insert_shortcode', image: url + '/hb.png' });
//             ed.addButton('wpse72399_button', {title : 'h3', cmd : 'wpse72399_insert_shortcode', image: url + '/h3.png' });
//             ed.addButton('wpse72400_button', {title : 'V', cmd : 'wpse72400_insert_shortcode', image: url + '/v.png' });
//         },   
//     });

//     // Register our TinyMCE plugin
//     // first parameter is the button ID1
//     // second parameter must match the first parameter of the tinymce.create() function above
//     tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin);
//     tinymce.PluginManager.add('wpse72395_button', tinymce.plugins.wpse72395_plugin);
//     tinymce.PluginManager.add('wpse72396_button', tinymce.plugins.wpse72396_plugin);
//     tinymce.PluginManager.add('wpse72397_button', tinymce.plugins.wpse72397_plugin);
//     tinymce.PluginManager.add('wpse72398_button', tinymce.plugins.wpse72398_plugin);
//     tinymce.PluginManager.add('wpse72399_button', tinymce.plugins.wpse72399_plugin);
//     tinymce.PluginManager.add('wpse72400_button', tinymce.plugins.wpse72400_plugin);
// });

// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.onehalf', {
        createControl: function(n, cm) {
            switch (n) {
                case 'onehalf':
                    var mlb = cm.createListBox('onehalf', {
                        title : 'Shortcodes',
                        onselect : function(v) {
                            tinyMCE.activeEditor.execCommand('mceInsertContent', false, v);
                        }
                    });

                    // Add some values to the list box
                    mlb.add('Hero Section', '[hero title="" author="" subtitle="" vimeo_id=""]');
                    mlb.add('Small Caps', '[small-caps]Text[/small-caps]');
                    mlb.add('Blockquote', '[blockquote align=""]Text[/blockquote]');
                    mlb.add('HR Break', '[hr-break]');
                    mlb.add('HR Thick', '[hr-thick]');
                    mlb.add('H3', '[h3]Text[/h3]');
                    mlb.add('H4', '[h4]Text[/h4]');
                    mlb.add('Email', '[email]name@genomemag.com[/email]');
                    mlb.add('Video', '[video align="right" vimeo_id="17404191"]Image[/video]');
                    mlb.add('Contributor', '[contributor author="" posts="3" position="first"] [contributor author="" posts="3" position="last"]');
                    mlb.add('Person', '[person name="" title="" link="#" position="first"] [person name="" title="" link="#" position="last"]');
                    mlb.add('Contact', '[contact name="" phone=""]');
                    mlb.add('vCard', '[vcard name="" address1="" address2="" address3=""]');

                // Return the new listbox instance
                return mlb;

                /*
                case 'onehalf':
                var c = cm.createSplitButton('onehalf', {
                    title : 'My split button',
                    image : 'img/example.gif',
                    onclick : function() {
                        tinyMCE.activeEditor.windowManager.alert('Button was clicked.');
                    }
                });

                c.onRenderMenu.add(function(c, m) {
                    m.add({title : 'Some title', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Some item 1', onclick : function() {
                        tinyMCE.activeEditor.windowManager.alert('Some  item 1 was clicked.');
                    }});

                    m.add({title : 'Some item 2', onclick : function() {
                        tinyMCE.activeEditor.windowManager.alert('Some  item 2 was clicked.');
                    }});
                });

                // Return the new splitbutton instance
                return c;
                */
            }
            return null;
        }
    });
    tinymce.PluginManager.add('onehalf', tinymce.plugins.onehalf);
})();