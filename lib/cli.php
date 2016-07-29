<?php

WP_CLI::add_command( 'sunstone-terms', 'Sunstone_Terms_CLI' );

class Sunstone_Terms_CLI extends WP_CLI_Command {

	private $post_id;

	/**
	 * Convert all Beyond the Beyond posts to Beyond the Beyond CPTs.
	 *
	 * @subcommand import-terms
	 *
	 * @return void
	 */
	public function load_terms( $args, $assoc_args ) {
		$files  = scandir( $this->path(), 1 );
		$pids   = array_map( array( $this, 'convert_to_ints' ), $files );
		$import = array_map( array( $this, 'massage_data' ), $pids );
	}

	/**
	 * Return the path of the JSON
	 * @return string
	 */
	private function path() {
		return realpath(__DIR__ . '/..') . '/google';
	}

	/**
	 * Get the PID from the file name
	 * @param  string $file File name
	 * @return string       PID
	 */
	private function convert_to_ints( $file ) {
		return str_replace( '.json', '', $file );
	}

	/**
	 * Find, and then massage some data
	 * @param  [type] $pid [description]
	 * @return [type]      [description]
	 */
	private function massage_data( $pid ) {
		echo( sprintf( 'Starting %d', $pid ) );
		$file_path = sprintf( '%s/%d.json', $this->path(), $pid );
		if ( file_exists( $file_path ) ) {
			$json   = file_get_contents( $file_path );
			$object = json_decode( $json );
			$object->pid = $pid;
			$imported = $this->import_terms( $object );
		}
	}

	/**
	 * [import_terms description]
	 * @param  [type] $object [description]
	 * @return [type]         [description]
	 */
	private function import_terms( $object ) {
		foreach ( $object->entities as $entity ) {
			$this->import_term( $entity );
		}
	}

	/**
	 * Find the taxonomy, and import the term
	 * @param  int    $pid    Post ID
	 * @param  object $entity Entitle
	 * @return void
	 */
	private function import_term( $entity ) {
		$taxonomy = $this->find_taxonomy( $entity->type );
		$this->set_term( $entity->pid, $entity->name, $taxonomy );
	}

	/**
	 * Map the taxonomy to our better name
	 * @param  string $type Taxonomy type
	 * @return string       Better tax name
	 */
	private function find_taxonomy( $type ) {
		switch ( $type ) {
			case 'UNKNOWN' :
				return 'post_tag';
			case 'PERSON' :
				return 'person';
			case 'LOCATION' :
				return 'location';
			case 'ORGANIZATION' :
				return 'organization';
			case 'EVENT' :
				return 'occasion';
			case 'WORK_OF_ART' :
				return 'work-of-art';
			case 'CONSUMER_GOOD' :
				return 'good';
			case 'OTHER' :
				return 'post_tag';
		}
	}

	/**
	 * Add the term to the object.
	 *
	 * @param  string $term_name Term to lookup
	 * @param  string $taxonomy  Taxonomy on which term resides.
	 * @return void
	 */
	private function set_term( $pid, $term_name, $taxonomy ) {
		$exist = get_term_by( 'name', $term_name, $taxonomy );
		if ( $exist === false ) {
			$exist = wp_insert_term( $term_name, $taxonomy );
		}
		if ( isset( $exist->term_id ) && ! is_wp_error( $exist ) ) {
			$added = wp_set_object_terms( $pid, $exist->term_id, $taxonomy, true );
		}
		wp_update_term_count_now( array( $exist->term_id ), $taxonomy );
	}

}
