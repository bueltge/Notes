<?php
/**
 * Create a little bid customizing for Notes
 *
 * @package Notes
 */

/**
 * Set string for the file, there was used for save the data
 * 
 * Default is 'data'
 * 
 * @const   string
 */
define( 'FILE', 'data' );

/**
 * Set language attribute
 * 
 * Default is 'de' for german users
 * See, for example, here for the right key for your language
 *     http://www.iana.org/assignments/language-subtag-registry/language-subtag-registry
 * 
 * @const   string
 */
define( 'LANG', 'de' );


/**
 * View source area
 * 
 * Set to FALSE, if you will only see the formatted area with WYSIWYG editor
 * Default is FALSE, set TRUE for see all possibilities
 * 
 * @const   boolean
 */
define( 'SOURCE', TRUE );

/**
 * Set order of Source and WYSIWXG editor
 * 
 * Set to DESC, if you will see the WYSIWYG editor on top, before the source editor
 * Default is ASC
 * 
 * @const   string
 */
define( 'ORDER', 'ASC' );

/**
 * For developers: debugging mode.
 *
 * Change this to TRUE to enable the display of notices during development.
 * 
 * @const   boolean
 */
define( 'DEBUG', TRUE );
