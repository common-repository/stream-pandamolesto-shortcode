//////////////////////////////////////////////////////////////////
// Add Stream button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.stream', {  
        init : function(ed, url) {  
            ed.addButton('stream', {  
                title : 'Add a Stream Video',  
                image : url+'/button-stream.png',  
                onclick : function() {  
                     ed.selection.setContent('[stream id="51112f94a" width="600" height="350" link="false"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('stream', tinymce.plugins.stream);  
})();
