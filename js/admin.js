$(pageInit);

function pageInit()
	{
		$("#upload").uploadify({
				'uploader'		: 	'<?=base_url() ;?>js/uploadify/uploadify.swf',
				'script'		: 	'<?=base_url() ;?>admin/uploadify',
				'cancelImg'		: 	'<?=base_url() ;?>js/uploadify/cancel.png',
				'folder'		: 	'/uploads',
				'queueSizeLimit':	204800,
				'scriptAccess'	: 	'always',
				'multi'			: 	true,
				'onComplete'   : function (event, queueID, fileObj, response, data) {
					$('#pic').append('<li><img src='+response+'_thumb'+fileObj.type+'></li>');
				}
		});
		
		$('#description').xheditor({tools:'Source,|,Bold,Italic,Underline,Strikethrough,|,FontColor,BackColor,|,Align,List,|,Link,Unlink',skin:'nostyle'});
	}