<?php

namespace Xyfi\Hello_Rammstein;

/**
 * Entry point for the plugin.
 *
 * Class Hello_Rammstein
 */
class Hello_Rammstein {
	public function register_hooks() {
		add_action( 'admin_head', [ $this, 'output_css' ] );
		add_action( 'admin_notices', [ $this, 'output_lyric' ] );
	}

	public function output_css() {
		$x = is_rtl() ? 'left' : 'right';
		$padding = "padding-$x: 15px";
		echo "
			<style type='text/css'>
				#rammstein {
					float: $x;
					$padding;
					padding-top: 5px;
					margin: 0;
					font-size: 11px;
				}
			</style>
		";
	}

	public function output_lyric() {
		$chosen = $this->get_random_lyric();
		echo "<p id='rammstein'>$chosen</p>";
	}

	protected function get_random_lyric() {
		$lyrics = [
			"Du",
			"Du hast",
			"Du hast mich",
			"Du hast mich gefragt",
			"Du hast mich gefragt und ich hab nichts gesagt",
			"Nein",
			"Sie lieben auch in schlechten Tagen",
			"Treue sein",
			"Treue sein für alle Tage",
			"Willst du bis der Tod uns scheidet",
			"Willst du bis zum Tod, der scheidet"
		];

		return $lyrics[ $this->get_random_number( count( $lyrics ) - 1 ) ];
	}

	/**
	 * @codeCoverageIgnore
	 */
	protected function get_random_number( $max, $min = 0 ) {
		return mt_rand( $min, $max );
	}
}
