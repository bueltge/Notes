<?php
/**
 * The page, the markup and all, what you will see in frontend
 *
 * @package Notes
 */

// Alias for small strings
use \lib\package\Core as N;
?>
<!DOCTYPE html>
<html lang="<?php N::e( LANG ); ?>" class="no-js">
	<head>
		<meta charset="utf-8">
		<title>Notes</title>
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css"></link>
		<link rel="stylesheet" type="text/css" href="lib/css/jquery-ui-bootstrap/css/custom-theme/jquery-ui-1.8.16.custom.css"></link>
		<link rel="stylesheet" type="text/css" href="lib/css/hallo.css"></link>
		<link rel="stylesheet" type="text/css" href="lib/css/fontawesome/css/font-awesome.css"></link>
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="lib/css/fontawesome/css/font-awesome-ie7.css" charset="utf-8" />
		<![endif]-->
		<link rel="shortcut icon" href="http://bueltge.de/favicon.ico" />
		<style>
			body, html{
				height: 98%;
				background-color: #e6e6e6;
			}
			#wrap { margin: 2% auto; width: 80%; height: 80%; }
			textarea, #editor_iframe, #content {
				width: 100%;
				height: auto;
				min-height: 50% !important;
				margin-bottom: 1em;
			}
			footer {
				margin-top: 3em;
			}
			.modified {
				position: fixed;
				top: 1em;
				right: 10%;
				cursor: default;
			}
		</style>
	</head>
	<body>
		
		<div id="wrap">
			<h1>Notes</h1>
			<p class="modified btn btn-danger"> </p>
			<textarea id="source" <?php if ( ! SOURCE ) echo ' style="display: none;"' ?> ></textarea>
			<div id="content" class="editable form-control"><?php N::g(); ?></div>
			<button type="button" class="save_editable btn btn-primary">Save</button>
			
			<footer>&hearts; <a href="http://bueltge.de">Frank Bültge</a> &middot; <a href="https://github.com/bueltge/Notes">Project on Github</a></footer>
		</div>
		
		<script src="lib/js/jquery-2.0.1.min.js"></script>
		<script src="lib/js/jquery-ui-1.10.2.min.js"></script>
		<script src="lib/js/rangy-core-1.2.3.js"></script>
		<script src="lib/js/hallo.js"></script>
		<script src="lib/js/showdown.js"></script>
		<script src="lib/js/to-markdown.js"></script>
		<script src="lib/js/jquery.textarea.min.js"></script>
		<script src="lib/js/editor.js"></script>
		
	</body>
</html>