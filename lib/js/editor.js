jQuery(document).ready(function($) {
	// include hallo.js editor
	$('.editable').hallo( {
		plugins: {
			'halloformat': {},
			'halloheadings': {},
			//'hallojustify': {},
			'hallolists': {},
			'hallolink': {},
			'halloreundo': {},
			/*
			'halloimage': {
				search: function(query, limit, offset, successCallback) {
					response = {offset: offset, total: limit + 1, assets: searchresult.slice(offset, offset+limit)};
					successCallback(response);
				},
				suggestions: null,
				uploadUrl: function() {
					return '/Notes/uploads/'
				}
			},
			*/
		},
		editable: true,
		//toolbar: 'halloToolbarFixed'
	});
	
	$( '.modified' ).hide();
	
	// check preview for changes
	$( '.editable' ).bind( 'hallomodified', function( event, data ) {
		$( '.modified' ).show().html( "Editables modified" );
	});
	
	// check source textarea for changes and get message
	$( '#source' ).bind( "input propertychange", function( event ) {
		
		var checklength = $( this ).val().length;

		if ( checklength ) {
			$( '.modified' ).show().html( "Editables modified" );
		}
	});
	
	var markdownize = function( content ) {
		var html = content.split( "\n" ).map($.trim).filter( function( line ) {
			return line != "";
		} ).join( "\n" );
		
		return toMarkdown( html );
	};
	
	var converter = new Showdown.converter();
	var htmlize = function( content ) {
			return converter.makeHtml( content );
		};
	
	// Method that converts the HTML contents to Markdown
	var showSource = function( content ) {
			var markdown = markdownize( content );
			if ( $( '#source' ).get(0).value == markdown ) {
				return;
			}
			$( '#source' ).get(0).value = markdown;
		};
	
	
	var updateHtml = function( content ) {
			if ( markdownize( $( '.editable' ).html() ) == content ) {
				return;
			}
			var html = htmlize( content );
			$( '.editable' ).html( html );
		};
	
	// Update Markdown every time content is modified
	$( '.editable' ).bind('hallomodified', function( event, data ) {
		showSource( data.content );
	});
	$( '#source' ).bind( 'keyup', function() {
		updateHtml( this.value );
	});
	showSource( $('.editable' ).html() );
	
	// save via click on save button
	$( '.save_editable' ).click( function() {
		
		var content = $( '#content' ).html(),
		    url     = window.location.pathname + 'index.php'; //'/lib/package/core.php';
		
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: url,
			data: {
				content: content
			}
		});
		
		$( '.modified' ).hide();
	});
	
	// use also tab
	$( '#source, #content' ).tabby();
	
});