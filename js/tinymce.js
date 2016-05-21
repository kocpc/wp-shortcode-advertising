(function() {
     /* Register the buttons */
     tinymce.create('tinymce.plugins.WPSAButton', {
          init : function(editor, url) {
               /**
               * Insert advertising shortcode
               */
               editor.addButton( 'wpsa-shortcode', {
                    title : 'Insert AD',
                    image: url + '/../images/advertising.png',
                    onclick : function() {
                         editor.selection.setContent('[insert-ad]');
                    }
               });
          },
          createControl : function(n, cm) {
               return null;
          },
     });
     /* Start the buttons */
     tinymce.PluginManager.add( 'wpsa_shortcode', tinymce.plugins.WPSAButton );
})();