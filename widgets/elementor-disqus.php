<?php
namespace ElementorDisqus\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Elementor_Disqus extends Widget_Base {

	public function get_name() {
		return 'elementor-disqus';
	}

	public function get_title() {
		return __( 'Disqus', 'elementor-disqus' );
	}

	public function get_icon() {
		return 'fa fa-commenting';
	}

	public function get_categories() {
		return [ 'general-elements' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	/*
		public function get_script_depends() {
			return [ 'imagesloaded' ];
		}
	*/

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'hello-world' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		global $post;
		$settings = $this->get_settings();
		?>
		<div id="disqus_thread"></div>
		<script>
		    /**
		     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
		     */
		    /*
		    var disqus_config = function () {
		        this.page.url = <?php echo get_permalink($post->ID); ?>;  // Replace PAGE_URL with your page's canonical URL variable
		        this.page.identifier = <?php echo get_option( "disqus_forum_url", $default = false ) . $post->ID; ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		    };
		    */
		    (function() {  // DON'T EDIT BELOW THIS LINE
		        var d = document, s = d.createElement('script');

		        s.src = 'https://<?php echo get_option( "disqus_forum_url", $default = false ); ?>.disqus.com/embed.js';

		        s.setAttribute('data-timestamp', +new Date());
		        (d.head || d.body).appendChild(s);
		    })();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
		<?php
	}

	protected function _content_template() {
		?>
		<div class="disqus-preview">
				<img src="<?php echo plugins_url( '../disqus.png', __FILE__ ) ?>" style="width:100%; height:auto;"/>
		</div>
		<?php
	}
}
