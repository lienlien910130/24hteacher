/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html'; 
config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?Type=Images'; 
config.filebrowserFlashBrowseUrl = 'ckfinder/ckfinder.html?Type=Flash'; 
config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; //�i�W�Ǥ@���ɮ� 
config.filebrowserImageUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';//�i�W�ǹ��� 
config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';//�i�W��Flash�ɮ�

};