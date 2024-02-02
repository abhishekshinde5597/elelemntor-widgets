<?php
class Elementor_Nos_Expertise extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Elementor_Nos_Expertise';
	}

	public function get_title() {
		return esc_html__( 'Nos-Expertises', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-carousel';
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
                    'design1' => __('Design 1', 'AQUAPROX'),
                    'design2' => __('Design 2', 'AQUAPROX'),
                ],
            ],
		);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'exprtise_image',
			[
				'label' => esc_html__( 'Expertise Image', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'exprtise_image_icon',
			[
				'label' => esc_html__( 'Expertise Image Icon', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'exprtise_title',
			[
				'label' => esc_html__( 'Expertise Title', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'title' , 'AQUAPROX' ),
				'placeholder' => 'title',
				'label_block' => true,
			]
		);

		

        $repeater->add_control(
			'exprtise_content',
			[
				'label' => esc_html__( 'Expertise Content', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( '17 Aug Board meeting Presentation' , 'AQUAPROX' ),
				'placeholder' => 'Desciiption',
				'label_block' => true,
			]
		);
        
    
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Expertise List', 'AQUAPROX' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'exprtise_title' => esc_html__( 'Expertise Title #1', 'AQUAPROX' ),
					
					],
					[
						'exprtise_title' => esc_html__( 'Expertise Title #2', 'AQUAPROX' ),
						
					],
				],
				'title_field' => '{{{ exprtise_title }}}',
			]
		);

        $this->end_controls_section();
    }

protected function render() {
	$expertise_settings = $this->get_settings_for_display();
	$design_variation = $expertise_settings['control_select'];
		?>
<?php  if ($design_variation === 'design1') { ?>		
<div class="expertises-main expertise_page_slider">
    <div class="Nos-expertises-slider slider-for">
        <?php foreach ($expertise_settings['list'] as $item_list) :
                ?>
                <div class="nos-wrap">
                    <div class="nos-main">
					<?php if(!empty($item_list['exprtise_image_icon']['url'])) :?>
                        <div class="column-50">
                            <img class="slide-main-img" src="<?php echo $item_list['exprtise_image_icon']['url']; ?>">
                        </div>
						<?php endif;?>
                        <div class="content-col">
                            <h5 class="slide-titles"><?php echo $item_list['exprtise_title']; ?></h5>
                            <div class="slide-content"><?php echo $item_list['exprtise_content']; ?></div>
							<?php if(!empty($item_list['exprtise_content'])): ?>
                            <div class="aq-morelink">
                                <a href="javascript:void(0)" class="afficher" id><?php echo apply_filters('wpml_translate_single_string', 'Show more', 'customstaring', 'Afficher-plus-btn'); ?></a>
                            </div>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        endforeach; ?>
    </div>

    <div class="Nos-expertises-nav slider-nav">
        <?php foreach ($expertise_settings['list'] as $item_list) :
                ?>
                <div>
                    <div class="nav-tab">
                        <img class="nav-img" src="<?php echo $item_list['exprtise_image']['url']; ?>" alt="Nav Image">
                    </div>
                    <h5 class="slide-title"><?php echo $item_list['exprtise_title']; ?></h5>
                </div>
            <?php
         
        endforeach; ?>
    </div>
</div>
<?php
	}
	elseif($design_variation === 'design2'){
	?>

<div class="image-text">
            <div class="image">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/10/Group-145.svg" alt="">
            </div>

      <div class="text">
             <div class="expertises-main nos-expertises-slider-home">
           <div class="Nos-expertises-slider slider-for">
		       <?php foreach ($expertise_settings['list'] as $item_list) : ?>
                    <div class="nos-wrap">
                        <div class="nos-main">
                       
                            <div class="column-50">
                                <img class="slide-main-img" src="<?php echo $item_list['exprtise_image_icon']['url']; ?>" alt="">
                            </div>
                           
                            <div class="content-col">
                           
                                <h5 class="slide-titles"><?php echo $item_list['exprtise_title']; ?></h5>
                                <div class="slide-content"><?php echo $item_list['exprtise_content']; ?></div>
                                <div class="aq-morelink">
                                <a href="javascript:void()" class="morelink"><?php echo apply_filters( 'wpml_translate_single_string', 'Learn more', 'customstaring', 'En-savoir-plus-btn' );?></a>
                                </div>
                                
                            <!-- <ul class="aq-icon">
                              <li><img class="aq-company-icon" src="<?php //echo $item_list['exprtise_image_icon']['url']; ?>" alt="Nav Image"></li>
                            </ul>        -->

                            </div>
                        </div>
                    </div>
					<?php endforeach; ?>
            </div>

        <div class="Nos-expertises-nav slider-nav">
		    <?php foreach ($expertise_settings['list'] as $item_list) : ?>
                    <div>
                      
                      <div class="nav-tab">
                        <img class="nav-img" src="<?php echo $item_list['exprtise_image']['url']; ?>" alt="Nav Image">
                        </div>
                        <h5 class="slide-title"><?php echo $item_list['exprtise_title']; ?></h5>
                
                    </div>
            <?php endforeach; ?>
        </div>

    </div>
 </div> 

</div>
 <?php }
}
protected function content_template() {
	?>
	<# if ( settings.list.length ) { #>
		<dl>
		<# _.each( settings.list, function( item ) { #>
			<dl class="elementor-repeater-item-{{ item._id }}">{{{ item.exprtise_title }}}</dl>
		<# }); #>
		</dl>
	<# } #>
	<?php
}
}

?>


