<?php


class Reviews_Gravity_Forms_Addon_Shortcodes {

	protected $core;

	public function __construct($core = null) {
		$this->core = $core;
		$this->load_shortcodes();
	}


	public function load_shortcodes() {
		add_shortcode(
			'gravity_reviews',
			array (
				$this,
				'gravity_reviews_shortcode'
			)
		);
	}

	public function gravity_reviews_shortcode ( $atts, $context = null ) {
		ob_start();
		$a = array(
			'form_id' => 1,
			'type' => 'page',
			'nav' => 'true',
			'per_page' => 2
		);
		$a = array_replace($a, $atts);

		echo '<pre>'.var_export($a, true).'</pre>';

		switch ($a['type']) {
			case 'page':
				return $this->render_full_page($a);
				break;
			
			default:
				return '';
				break;
		}
	}

	public function render_full_page ( $atts ) {
		$data = $this->core->get_page_data( $atts );
		require_once( plugin_dir_path( __FILE__ ) . 'partials/page.php');
		return ob_get_clean();
	}
}