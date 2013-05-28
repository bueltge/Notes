<?php
$notesfile = 'data';
if ( isset( $_POST['content'] ) ) {
	$handle  = fopen( $notesfile, 'w' );
	$content = $_POST['content'];
	// only text?
	//$content = filter_var( $_POST['content'], FILTER_SANITIZE_STRING );
	$content = fwrite( $handle, stripslashes( $content ) );
	fclose( $handle );
}

if ( is_readable( $notesfile ) ) {
	$handle  = fopen ( $notesfile, 'r' );
	$content = stream_get_contents( $handle );
	fclose( $handle );
}
?>
<!DOCTYPE html>
<html lang="de" class="no-js">
	<head>
		<meta charset="utf-8">
		<title>Notes</title>
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css"></link>
		<link rel="stylesheet" type="text/css" href="lib/css/prettify.css"></link>
		<link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css"></link>
		<link rel="shortcut icon" href="http://bueltge.de/favicon.ico" />
		<style>
			body, html{
				height: 98%;
				background-color: #e6e6e6;
			}
			#wrap { margin: 2% auto; width: 80%; height: 80%; }
			textarea, #editor_iframe {
				width: 100%;
				height: 80% !important;
				min-height: 250px; /* Fallback Mobile */
			}
			input[type="submit"] { width: 5%; }
		</style>
	</head>
	<body>
		
		<div id="wrap">
			<h1>Notes</h1>
			<form action="index.php" method="post" id="notes_form">
				<textarea id="notes" name="content"><?php if ( isset( $content ) ) echo $content; ?></textarea>
				<br>
				<input class="btn btn-primary" type="submit" name="submit" value="Submit" />
			</form>
			
			<footer>&hearts; <a href="http://bueltge.de">Frank Bültge</a> &middot; <a href="https://github.com/bueltge/Notes">Project on Github</a></footer>
		</div>
		
		<script src="lib/js/wysihtml5-0.3.0.js"></script>
		<script src="lib/js/jquery-2.0.1.min.js"></script>
		<script src="lib/js/prettify.js"></script>
		<script src="lib/js/bootstrap.min.js"></script>
		<script src="src/bootstrap-wysihtml5.js"></script>
		
		<script>
		// @see: https://github.com/jhollingworth/bootstrap-wysihtml5/
		$('#notes').wysihtml5({
			"font-styles": true,
			"emphasis": true,
			"lists": true,
			"html": false,
			"link": true,
			"image": false,
			"color": false
		});
		
		$( '.wysihtml5-sandbox' ).ready( function() {
			$( '.wysihtml5-sandbox').attr( 'id', 'editor_iframe' );
			
			var frame = document.getElementById( "editor_iframe" );
			var frameWin=(frame.contentWindow || frame.contentDocument);
			
			$( frameWin.document ).keydown( function( e ) {
				if ( e.which == 13 ) { // When key pressed is "Enter" key.
					e.preventDefault();
					console-log( 'keydown' );
					$( '#notes_form' ).submit();
				}
			});
		});
		</script>
		
	</body>
</html>