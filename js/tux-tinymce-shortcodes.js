(function(){
	tinymce.create('tinymce.plugins.TuxShortcodesPlugin', {
		init: function(ed, url) {
			ed.addButton('tuxScButton', {
                type: 'menubutton',
				title: 'Theme Shortcodes',
				image :  url +'/shortcodes.gif',
                menu: [	{ text: 'Section', onclick: function() {
							ed.windowManager.open({
								title: 'Section',
								width: 400,
								height: 300,
								id: 'tuxsectionwindow',
								body: [
									{ type: 'checkbox', name: 'tuxsecfullwidth', label: 'Full Width', value: true },
									{ type: 'textbox', name: 'tuxseccolor', label: 'Color', value: '#ffffff' },
									{ type: 'textbox', name: 'tuxsecimgurl', label: 'Image URL', value: '' },
									{ type: 'button', name: 'tuxsecimgbutton', label: ' ', text: 'Select Image', onclick: function() {
											tuxsecimgframe = wp.media({
												className: 'media-frame',
												multiple: false,
												title: 'Select Image',
												library: { type: 'image' }
											});
											tuxsecimgframe.open();
											tuxsecimgframe.off('select');
											tuxsecimgframe.on('select',function(){
												var selection = tuxsecimgframe.state().get( 'selection' ).toJSON();
												var i;
												jQuery( '#tuxsectionwindow-body input' ).each( function( i ) { if ( i == 1 ) jQuery( this ).val( selection[0].url ); } );
											});
									}	},
									{ type: 'checkbox', name: 'tuxsecparallax', label: 'Parallax', value: 'false' },
									{ type: 'textbox', name: 'tuxsecpadding', label: 'Padding', value: '10' }
								],
								onsubmit: function(e) {
										var fullwidth = 'true', parallax = 'false';
										if ( ! e.data.tuxsecfullwidth ) fullwidth = 'false';
										if ( e.data.tuxsecparallax ) parallax = 'true';
										ed.insertContent( '[tux-section fullwidth="' + fullwidth + '" color="' + e.data.tuxseccolor + '" image="' + e.data.tuxsecimgurl + '" parallax="' + parallax + '" padding="' + e.data.tuxsecpadding + '"]' + tinymce.activeEditor.selection.getContent() + '[/tux-section]' );
									}
							});
						}	},
					    { text: 'Grid Row', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-grid-row]' + tinymce.activeEditor.selection.getContent() + '[/tux-grid-row]' ) } },
						{ text: 'Grid Column', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-grid-column size="1"]' + tinymce.activeEditor.selection.getContent() + '[/tux-grid-column]' ) } },
						{ text: 'Alert', onclick: function() {
							ed.windowManager.open({
								title: 'Alert',
								width: 400,
								height: 100,
								id: 'tuxalertwindow',
								body: [
									{ type: 'listbox', name: 'tuxalerttype', label: 'Type', values: [ { text: 'none', value: '' }, { text: 'Danger', value: 'danger' }, { text: 'Success', value: 'success' }, { text: 'Info', value: 'info' } ] },
									{ type: 'listbox', name: 'tuxalertalign', label: 'Text Align:', values: [ { text: 'none', value: '' }, { text: 'Left', value: 'left' }, { text: 'Right', value: 'right' }, { text: 'Center', value: 'center' }, { text: 'Justify', value: 'justify' } ] }
								],
								onsubmit: function(e) {
										ed.insertContent( '[tux-alert type="' + e.data.tuxalerttype + '" ' + ' textalign="' + e.data.tuxalertalign + '"]' + tinymce.activeEditor.selection.getContent() + '[/tux-alert]' );
									}
							});
						} },
						{ text: 'Button', onclick: function() {
							ed.windowManager.open({
								title: 'Button',
								width: 400,
								height: 300,
								id: 'tuxbuttonwindow',
								body: [
									{ type: 'textbox', name: 'tuxbutlink', label: 'Link URL', value: '#' },
									{ type: 'checkbox', name: 'tuxbuttarget', label: 'Open in New Window', value: 'false' },
									{ type: 'listbox', name: 'tuxbuttype', label: 'Type', values: [ { text: 'none', value: '' }, { text: 'Primary', value: 'primary' }, { text: 'Warning', value: 'warning' }, { text: 'Danger', value: 'danger' }, { text: 'Success', value: 'success' }, { text: 'Info', value: 'info' }, { text: 'Inverse', value: 'inverse' } ] },
									{ type: 'listbox', name: 'tuxbutsize', label: 'Size', values: [ { text: 'none', value: '' }, { text: 'Small', value: 'small' }, { text: 'Smaller', value: 'smaller' }, { text: 'Extra Small', value: 'xsmall' }, { text: 'Extra Extra Small', value: 'xxsmall' }, { text: 'Large', value: 'large' }, { text: 'Larger', value: 'larger' }, { text: 'Extra Large', value: 'xlarge' }, { text: 'Extra Extra Large', value: 'xxlarge' } ] },
									{ type: 'textbox', name: 'tuxbutstyle', label: 'Style', value: '' }
								],
								onsubmit: function(e) {
										var target = '';
										if ( e.data.tuxbuttarget ) target = '_blank';
										ed.insertContent( '[tux-button link="' + e.data.tuxbutlink + '" target="' + target + '" type="' + e.data.tuxbuttype + '" size="' + e.data.tuxbutsize + '" style="' + e.data.tuxbutstyle + '"]' + tinymce.activeEditor.selection.getContent() + '[/tux-button]' );
									}
							});
						} },
						{ text: 'List Pages', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-list-pages include="" grid="1"]' ) } },
						{ text: 'List Posts', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-list-posts category="" grid="1"]' ) } },
						{ text: 'Members Only Content', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-members]' + tinymce.activeEditor.selection.getContent() + '[/tux-members]' ) } },
						{ text: 'Guests Only Content', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-guests]' + tinymce.activeEditor.selection.getContent() + '[/tux-guests]' ) } },
						{ text: 'Login Form', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-login avatarsize="70"]' ) } },
						{ text: 'Search Form', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-search-form]' ) } },
						{ text: 'Current Year', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-year]' ) } },
						{ text: 'Website Snapshot', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-snap url="http://www.google.com/" alt="Google" w="400" h="300"]' ) } },
						{ text: 'Parent Theme URI', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-parent-uri]' ) } },
						{ text: 'Child Theme URI', onclick: function() { tinymce.activeEditor.selection.setContent( '[tux-child-uri]' ) } } ]
			});
			ed.addButton('tuxColumnsButton', {
				type: 'menubutton',
				title: 'Columns',
				image: url + '/columns.gif',
				menu: [ { text: '1 Column',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size1"><p>Column 1</p></div></div></div>&nbsp;' );
						} },
						{ text: '2 Columns 25/75',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size34"><p>Column 2</p></div></div></div>&nbsp;' );
						} },
						{ text: '2 Columns 50/50',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 2</p></div></div></div>&nbsp;' );
						} },
						{ text: '2 Columns 75/25',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size34"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 2</p></div></div></div>&nbsp;' );
						} },
						{ text: '3 Columns 25/25/50',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 2</p></div><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 3</p></div></div></div>&nbsp;' );
						} },
						{ text: '3 Columns 25/50/25',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 2</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 3</p></div></div></div>&nbsp;' );
						} },
						{ text: '3 Columns 33/33/33',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size3"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size3"><p>Column 2</p></div><div class="gcw-layout-cell gcw-layout-cell-size3"><p>Column 3</p></div></div></div>&nbsp;' );
						} },
						{ text: '3 Columns 50/25/25',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size2"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 2</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 3</p></div></div></div>&nbsp;' );
						} },
						{ text: '4 Columns 25/25/25/25',
						  onclick: function() {
							ed.selection.setContent( '&nbsp;<div class="gcw-content-layout"><div class="gcw-content-layout-row"><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 1</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 2</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 3</p></div><div class="gcw-layout-cell gcw-layout-cell-size4"><p>Column 4</p></div></div></div>&nbsp;' );
						} }
					]
			});
		}
	});
	tinymce.PluginManager.add('tux_shortcodes', tinymce.plugins.TuxShortcodesPlugin);
})();
