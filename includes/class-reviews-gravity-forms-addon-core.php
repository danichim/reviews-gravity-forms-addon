<?php


class Reviews_Gravity_Forms_Addon_Core {

	private $privateKey;
	private $publicKey;
	private $endpoint;
	private $baseURL;

	public function __construct () {
		$this->fetch_data();
	}

	public function fetch_data () {
		$this->privateKey = esc_attr(get_option( 'private_key' ));
		$this->publicKey = esc_attr(get_option( 'api_key' ));
		$this->endpoint = esc_attr(get_option( 'api_endpoint' ));

		$this->baseURL = get_site_url();
	}

	public function get_api_details () {
		return array(
			"key" => $this->publicKey,
			"private" => $this->privateKey,
			"endpoint" => $this->endpoint
		);
	}

	public function get_page_data ( $atts ) {
		$final_data = null;
		$data = [];

		if (isset($atts['form_id'])) {
			$entries = GFAPI::get_entries( $atts['form_id'] );
			if (count($entries)) {
				$star_sum = array_reduce($entries, function($carry, $entry){ 
					$carry += $entry[3];
					return $carry;
				}, 0);
				
				$total = count($entries);

				$star_avg = (intval($star_sum) / intval($total));

				$entries_array = array_map(array(
					$this,
					'format_entry'
				), $entries);
				
				if($atts['nav'] == 'true') {
					$chunks = array_chunk($entries_array, $atts['per_page']);
					
					$index = isset($_REQUEST['r_page']) ? intval($_REQUEST['r_page']) : 0;

					$final_data = $chunks[$index];
				}else{
					$final_data = $entries_array;
				}
			} else {
				$final_data = [];
				$total = 0;
				$star_avg = 0;
			}
		} else {
			$final_data = [];
			$total = 0;
			$star_avg = 0;
		}
	
		$data = array(
			"entries" => $final_data,
			"total" => $total,
			"star_avg" => $star_avg
		);

		return $data;
	}
	
	public function format_entry ( $entry ) {
		$entryData = array(
			'date' =>  date("F d, Y", strtotime($entry['date_created'])),
			'first_name' => $entry['1.3'],
			'last_name' => $entry['1.6'],
			'email' => $entry[2],
			'stars' => $entry[3],
			'message' => $entry[4]
		);

		return $entryData;
	}

}