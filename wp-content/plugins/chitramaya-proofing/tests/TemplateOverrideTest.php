<?php
/**
 * Test Template Override
 */
class TemplateOverrideTest extends WP_UnitTestCase {

    protected $system;

    public function setUp(): void {
        parent::setUp();
        $this->system = new Chitramaya_Proofing_System();
    }

    /**
     * @covers Chitramaya_Proofing_System::template_override
     */
    public function test_template_overridden_for_proofing_session() {
        $post_id = $this->factory()->post->create( [
            'post_type' => 'proofing_session'
        ] );
        
        // Simulate visiting the proofing session single page
        $this->go_to( get_permalink( $post_id ) );
        
        $original_template = 'single.php';
        $overridden_template = $this->system->template_override( $original_template );
        
        $this->assertNotEquals( $original_template, $overridden_template );
        $this->assertStringContainsString( 'proofing', $overridden_template );
    }

    /**
     * @covers Chitramaya_Proofing_System::template_override
     */
    public function test_template_not_overridden_for_regular_posts() {
        $post_id = $this->factory()->post->create( [
            'post_type' => 'post'
        ] );
        
        // Simulate visiting the regular post single page
        $this->go_to( get_permalink( $post_id ) );
        
        $original_template = 'single.php';
        $overridden_template = $this->system->template_override( $original_template );
        
        $this->assertEquals( $original_template, $overridden_template );
    }
}
