(function() {
	tinymce.create('tinymce.plugins.rwpt_buttonPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/pop_up_window.php', // file that contains HTML for our modal window
					width : 600, // size of our window
					height : 450, // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			ed.addButton('rwpt_button', {title : 'Insert Testimonial', cmd : 'mcebutton', image: url +'/icon.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'Insert Testimonial Button',
				author : 'Azizul Haque',
				authorurl : 'http://envatobd.com/plugins',
				infourl : 'http://envatobd.com/',
				version : '1.0'
			};
		}
	});
	 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('rwpt_button', tinymce.plugins.rwpt_buttonPlugin);

})();