<?php
class Elementor_filter extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Elementor_filter';
	}

	public function get_title() {
		return esc_html__( 'Document Title', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

    protected function register_controls() {
       

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'AQUAPROX' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

       

        $repeater->add_control(
			'document_title',
			[
				'label' => esc_html__( 'Document Title', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'title' , 'AQUAPROX' ),
				'placeholder' => 'title',
				'label_block' => true,
			]
		);

        
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Document List', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'document_title' => esc_html__( 'Document Title #1', 'AQUAPROX' ),
					
					],
					[
						'document_title' => esc_html__( 'Document Title #2', 'AQUAPROX' ),
						
					],
				],
				'title_field' => '{{{ document_title }}}',
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
      ?>
  <div class="expertise-title">
  <ul class="elementor-icon-list-items"> 
      <?php foreach($settings['list'] as $item){ ?>
            <li class="service-post">
                <div class="service-post-inner">
                    <div class="service_img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2023/10/AQUAPROX-O_White.svg" alt="arrow"></div>
                    <span class="service-post-title"><?php echo $item['document_title']; ?></span>
                </div>
            </li>
            <?php
         }
         ?>
   </ul>
  </div>
        <?php
       
     }

	 protected function content_template() {
        ?>
        <# if ( settings.list.length ) { #>
            <dl>
            <# _.each( settings.list, function( item ) { #>
                <dl class="elementor-repeater-item-{{ item._id }}">{{{ item.document_title }}}</dl>
            <# }); #>
            </dl>
        <# } #>
        <?php
    }


}