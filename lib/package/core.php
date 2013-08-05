<?php
/**
 * Core class and method to get and save data from notes_body
 *
 * @package Notes
 */
namespace lib\package;

new \lib\package\Core();
class Core {
	
	/**
	 * Constructor
	 * 
	 * @return  void
	 */
	public function __construct() {
		
		// load config
		$this->get_config();
		
		// Set error reporting
		$this->debug();
		
		// create view
		$this->get_view();
	}
	
	/**
	 * Include the configuration
	 * 
	 * @return  void
	 */
	public function get_config() {
		
		// include the configuration
		if ( file_exists( N_ROOT . 'config.php' ) ) 
			require_once N_ROOT . 'config.php';
	}
	
	/**
	 * Include the template with html markup
	 * 
	 * @return  void
	 */
	public function get_view() {
		
		require_once N_ROOT . 'lib/package/view.php';
	}
	
	/**
	* Set error reporting for developers or default use
	* 
	* @return  void
	*/
	public function debug() {
		
		// fallback, if the const is not defined
		if ( ! defined( 'DEBUG' ) )
			define( 'DEBUG', FALSE );
		
		if ( DEBUG ) {
			error_reporting( E_ALL | E_STRICT );
			ini_set( 'display_errors', 1 );
		} else {
			// set error reporting for default use
			error_reporting(
				E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | 
				E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR
			);
			ini_set( 'display_errors', 0 );
		}
	}
	
	/**
	 * Debug to console, small helper
	 * 
	 * @return  string
	 */
	public static function debug_to_console( $data ) {
	
		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Notes: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Notes: " . $data . "' );</script>";
			
		echo $output;
	}
	
	/**
	 * Echo content
	 * 
	 * @param   string
	 * @return  string
	 */
	public static function e( $content ) {
		
		echo $content;
	}
	
	/**
	 * Get content from data file
	 * 
	 * @param   string
	 * @return  string
	 */
	public static function g() {
		
		if ( ! is_readable( N_ROOT . FILE ) )
			return 'Datafile is not readable';
		
		$handle  = fopen ( N_ROOT . FILE, 'r' );
		$content = stream_get_contents( $handle );
		fclose( $handle );
		
		echo $content;
	}
	
	/**
	 * Write content to data file
	 * 
	 * @param   string
	 * @return  string
	 */
	public static function w( $content = NULL ) {
		
		$handle  = fopen( FILE, 'w' );
		// only text?
		// $content = filter_var( $_POST['content'], FILTER_SANITIZE_STRING );
		$content = fwrite( $handle, stripslashes( $content ) );
		fclose( $handle );
	}
	
	/**
	 * Display Editor, Source and WYSIWYG mode
	 * 
	 * @param   string  $order    Use ASC or DESC for order of editor areas; ASC set the sourc editor on top
	 *                            You overwrite the value vis constant ORDER
	 * @param   boolean $displax  Display the source editor.
	 *                            You overwrite this var via const SOURCE in config.php_check_syntax
	 * @return  void
	 */
	public static function get_editor( $order = 'ASC', $display = TRUE ) {
		
		if ( defined( 'ORDER' ) )
			$order = ORDER; 
		
		if ( defined( 'SOURCE' ) )
			$display = SOURCE;
		
		if ( ! $display )
			$display = ' style="display: none;"';
		
		if ( 'ASC' === $order ) {
		?>
			<textarea id="source"<?php echo $display; ?>></textarea>
			<div id="content" class="editable form-control"><?php self::g(); ?></div>
		<?php
		} else {
		?>
			<div id="content" class="editable form-control"><?php self::g(); ?></div>
			<textarea id="source"<?php echo $display; ?>></textarea>
		<?php
		}
	}
	
} // end class 
