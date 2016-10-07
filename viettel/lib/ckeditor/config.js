/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
config.toolbar =
[   { name: 'document', groups: [ 'document', 'doctools' ], items: ['Templates' ] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },        
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] }, { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe', 'Syntaxhighlight' ] },
    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    { name: 'others', groups: [ 'mode' ], items: [ 'Source', 'searchCode', 'autoFormat', 'CommentSelectedRange', 'UncommentSelectedRange', 'AutoComplete', '-', 'ShowBlocks' ] },
    { name: 'tools', items: [ 'Maximize' ] },
];
	config.entities = false; 
	config.filebrowserBrowseUrl =urlck+'ckfinder/ckfinder/html'; 

    config.filebrowserImageBrowseUrl =urlck+'ckfinder/ckfinder/html?type=Images'; 

    config.filebrowserFlashBrowseUrl =urlck+'ckfinder/ckfinder/html?type=Flash'; 

    config.filebrowserUploadUrl =urlck+'ckfinder/ckfinder/connector?command=QuickUpload&type=Files'; 

    config.filebrowserImageUploadUrl = urlck+'ckfinder/ckfinder/connector?command=QuickUpload&type=Images'; 

    config.filebrowserFlashUploadUrl =urlck+'ckfinder/ckfinder/connector?command=QuickUpload&type=Flash';

};
