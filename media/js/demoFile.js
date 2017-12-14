// 文件上传
jQuery(function() {
    var $ = jQuery,
        $list = $('#thelist'),
        $btn = $('#ctlBtn'),
        state = 'pending',
        uploader;

    uploader = WebUploader.create({
		
		 accept: {
            extensions: 'gif,jpg,jpeg,bmp,png,pdf',
			mimeTypes: 'image/*,application/pdf'
        },
		
		
        // 不压缩image
        resize: false,

        // swf文件路径
        swf: '../../media/webuploader-0.1.5/Uploader.swf',

        // 文件接收服务端。
        // server: 'http://webuploader.duapp.com/server/fileupload.php',
        server: fileParameter,

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker'
    });

    // 当有文件添加进来的时候
    uploader.on( 'fileQueued', function( file ) {
        $list.append( '<div id="' + file.id + '" class="item">' +
            '<h4 class="info">' + file.name + '</h4>' +
            '<p class="state">アップロード待ち...</p>' +
        '</div>' );
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress .progress-bar');

        // 避免重复创建
        if ( !$percent.length ) {
            $percent = $('<div class="progress progress-striped active">' +
              '<div class="progress-bar" role="progressbar" style="width: 0%">' +
              '</div>' +
            '</div>').appendTo( $li ).find('.progress-bar');
        }
        
        $li.find('p.state').text('アップロード中');

        $percent.css( 'width', percentage * 100 + '%' );
    });
    
    uploader.on( 'uploadSuccess', function( file ) {
        $( '#'+file.id ).find('p.state').text('アップロード完了');
    });

    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('アップロードエラー');
    });

    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').fadeOut();
    });

    uploader.on( 'all', function( type ) {
        if ( type === 'startUpload' ) {
            state = 'uploading';
        } else if ( type === 'stopUpload' ) {
            state = 'paused';
        } else if ( type === 'uploadFinished' ) {
            state = 'done';
			//alert( 'アップロード成功' );
			setTimeout("location.reload()",1000);
        }

        if ( state === 'uploading' ) {
            $btn.text('アップロード停止');
        } else {
            $btn.text('アップロード開始');
        }
    });
    
    $btn.on( 'click', function() {
        if ( state === 'uploading' ) {
            uploader.stop();
        } else {
            uploader.upload();
        }
    });
	
});