jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.wpse72394_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('wpse72394_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[hero title="'+selected+'" by="" subtitle="" vimeo_id=""]';
                    }else{
                        content =  '[hero title="" by="" subtitle="" vimeo_id=""]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

                // Register command for when button is clicked
                ed.addCommand('wpse72395_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[small-caps]'+selected+'[/small-caps]';
                    }else{
                        content =  '[small-caps][/small-caps]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });



            // Register buttons - trigger above command when clicked
            ed.addButton('wpse72394_button', {title : 'H', cmd : 'wpse72394_insert_shortcode', image: url + '18_evernote.png' });
            ed.addButton('wpse72395_button', {title : 'S', cmd : 'wpse72395_insert_shortcode', image: url + '18_evernote.png' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin);
    tinymce.PluginManager.add('wpse72395_button', tinymce.plugins.wpse72395_plugin);
});