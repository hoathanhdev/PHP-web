/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	config.uiColor = '#00BFFF';
	
	config.height = 600;
	
	config.toolbar = 'MyToolbar';
	
	// Định nghĩa MyToolbar
	config.toolbar_MyToolbar =
	[
		{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
		{ name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		'/',
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] }
	];
	
	// Cấu hình tích hợp CKFinder vào CKEditor
	var path = "http://127.0.0.1:8080/trangtin_v0.5/scripts/ckfinder/";
	
	config.filebrowserBrowseUrl 		= path + 'ckfinder.html';
	config.filebrowserImageBrowseUrl 	= path + 'ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl 	= path + 'ckfinder.html?type=Flash';
	config.filebrowserUploadUrl 		= path + 'core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl 	= path + 'core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl 	= path + 'core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
