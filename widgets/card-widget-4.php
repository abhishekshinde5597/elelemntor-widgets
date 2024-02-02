<?php
class Elementor_Entites extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Elementor_Entites';
	}

	public function get_title() {
		return esc_html__( 'Elementor-Entites', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
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

		$this->add_control(
			'control_select', [
                'label' => __('Design Variation', 'AQUAPROX'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'design1',
                'options' => [
                    'design1' => __('Slider', 'AQUAPROX'),
                    'design2' => __('Grid View', 'AQUAPROX'),
                ],
            ],
		);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'entity_title',
			[
				'label' => esc_html__( 'Entity Title', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'title' , 'AQUAPROX' ),
				'placeholder' => 'title',
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'entity_category',
			[
				'label' => esc_html__( ' Entity Category', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'title' , 'AQUAPROX' ),
				'placeholder' => 'title',
				'label_block' => true,
			]
		);
		
       
        $repeater->add_control(
			'entity_image',
			[
				'label' => esc_html__( 'Entity Image', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'entity_company_logo',
			[
				'label' => esc_html__( 'Company Logo', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'entity_content',
			[
				'label' => esc_html__( 'Entity Description', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'AQUAPROX' ),
				'placeholder' => esc_html__( 'Type your description here', 'AQUAPROX' ),
			]
		);

        $repeater->add_control(
			'entity_adreass',
			[
				'label' => esc_html__( 'Entity Address', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default Adress', 'AQUAPROX' ),
				'placeholder' => esc_html__( 'Type your Adress here', 'AQUAPROX' ),
			]
		);

        $repeater->add_control(
			'entity_link',
			[
				'label' => esc_html__( 'Entity Link', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'entity_button',
			[
				'label' => esc_html__( 'Entity Button', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'title' , 'AQUAPROX' ),
				'placeholder' => 'title',
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Entites List', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'entity_title' => esc_html__( 'Entity Title #1', 'AQUAPROX' ),
					
					],
					[
						'entity_title' => esc_html__( 'Entity Title #2', 'AQUAPROX' ),
						
					],
				],
				'title_field' => '{{{ entity_title }}}',
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$design_variation = $settings['control_select'];
		 //print_r( $settings);
         ?>


<?php  if ($design_variation === 'design1') { ?>
<div class="innovation-post-slider">
    <?php foreach ($settings['list'] as $items) { ?>
    <div class="innovation-post-type-item">
        <div class="innovation-post-type-item-inner">

            <figure class="innovation-post-type-thumbnail">
                <?php if (!empty($items['entity_image']['url'])) { ?>
                <img src="<?php echo esc_url($items['entity_image']['url']); ?>"
                    alt="<?php echo esc_attr($items['entity_title']); ?>">
                <?php } ?>
            </figure>

            <div class="innovation-content">
                <h4 class="innovation-post-type-category"> <?php echo esc_html($items['entity_category']); ?></h3>

                    <h4 class="innovation-post-type-titles"><?php echo esc_html($items['entity_title']); ?> </h4>
            </div>

            <div class="innovation-hover-content">
                <?php if (!empty($items['entity_company_logo']['url'])) { ?>
                <img src="<?php echo esc_url($items['entity_company_logo']['url']); ?>" class="entites-post-type-image"
                    alt="Thumbnail">
                <?php } ?>

                <div class="innovation-post-type-hover-title"><?php echo esc_html($items['entity_title']); ?> </div>
                <?php if (!empty($items['entity_content'])) { ?>
                <div class="innovation-post-type-hover-content"><?php echo esc_html($items['entity_content']); ?></div>
                <?php } ?>

                <?php if (!empty($items['entity_adreass'])) { ?>
                <div class="innovation-post-type-hover-address"><?php echo esc_html($items['entity_adreass']); ?> </div>
                <?php } ?>

                <a href="<?php echo esc_url($items['entity_link']['url']); ?>" class="btn" target="_blank">
                    <?php echo esc_html($items['entity_button']); ?><img
                        src="<?php echo site_url(); ?>/tech/wp-content/uploads/2023/10/white_arrow.svg" alt="arrow">
                </a>

            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php
		}
		elseif($design_variation === 'design2'){
			?>
<div class="entites-post-slider">
    <div class="entites-post-main">
        <?php foreach ($settings['list'] as $items) { ?>
        <div class="entites-post-type-item">
            <div class="entites-post-type-item-inner">
                <figure class="entites-post-type-thumbnail">
                    <img src="<?php echo esc_url($items['entity_image']['url']); ?>"
                        alt="<?php echo esc_attr($items['entity_title']); ?>">
                </figure>
                <div class="entites-content">
                    <img src="<?php echo site_url();?>/wp-content/uploads/2023/11/Group-253.svg" alt="arrow">'; <p
                        class="entites-post-type-entites_category"><?php echo esc_html($items['entity_category']); ?>
                    </p>
                    <h4 class="entites-post-type-title"><?php echo esc_html($items['entity_title']); ?> </h4>
                </div>
                <div class="entites-hover-content">
                    <img src="<?php echo esc_url($items['entity_company_logo']['url']); ?>"
                        class="entites-post-type-image" alt="Thumbnail">
                    <div class="entites-wrap">
                        <div class="entites-post-type-hover-excerpt"><?php echo esc_html($items['entity_content']); ?>
                        </div>
                        <div class="entites-post-type-hover-address"><?php echo esc_html($items['entity_adreass']); ?>
                        </div>
                    </div>
                    <a href="<?php echo esc_url($items['entity_link']['url']); ?>" class="btn"
                        target="_blank"><?php echo esc_html($items['entity_button']); ?> <img
                            src="<?php echo site_url(); ?>/wp-content/uploads/2023/10/white_arrow.svg" alt="arrow">
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
		}
       
     }

	 protected function content_template() {
        ?>
<# if ( settings.list.length ) { #>
    <dl>
        <# _.each( settings.list, function( item ) { #>
            <dl class="elementor-repeater-item-{{ item._id }}">{{{ item.entity_title }}}</dl>
            <# }); #>
    </dl>
    <# } #>
        <?php
    }

}