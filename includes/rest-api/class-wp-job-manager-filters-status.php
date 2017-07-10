<?php
/**
 * Declaration of our Status Filters (will be used in GET requests)
 *
 * @package WPJM/REST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WP_Job_Manager_Filters_Status
 */
class WP_Job_Manager_Filters_Status extends WPJM_REST_Model_Declaration {

	/**
	 * Declare our fields
	 *
	 * @param  WPJM_REST_Model_Field_Declaration_Collection_Builder $def Def.
	 * @return array
	 * @throws WPJM_REST_Exception Exc.
	 */
	function declare_fields( $def ) {
		return array(
		 $def->field( 'keys', 'The status keys to return' )
			 ->typed( $def->type( 'array:string' ) )
			 ->before_set( 'explode_keys' )
			 ->with_default( array() ),
		);
	}

	/**
	 * Explode keys
	 *
	 * @param  WPJM_REST_Interfaces_Model $model Model.
	 * @param  mixed                      $keys  The keys.
	 * @return array
	 */
	function explode_keys( $model, $keys ) {
		if ( is_string( $keys ) ) {
			return explode( ',', $keys );
		}
		return $keys;
	}
}

