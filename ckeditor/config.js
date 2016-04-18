/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		//{ name: 'editing',     groups: [ 'find', 'selection' ] },
		{ name: 'links' },
		{ name: 'insert' },
               
		//{ name: 'forms' },
		//{ name: 'tools' },
		//{ name: 'document',	   groups: [ 'mode' ] },
		//{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		//{ name: 'about' }
	];

	config.language = 'pt-BR';
	config.uiColor = '#cccccc';
	config.toolbarCanCollapse = true;
};
