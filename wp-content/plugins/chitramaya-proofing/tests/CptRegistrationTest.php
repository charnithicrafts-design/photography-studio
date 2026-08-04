<?php

class CptRegistrationTest extends WP_UnitTestCase {
    public function setUp(): void {
        parent::setUp();
        // Assuming Chitramaya_Proofing_System registers the CPT on init
        $proofing = new Chitramaya_Proofing_System();
        $proofing->register_cpt(); 
    }

    /**
     * @covers Chitramaya_Proofing_System::register_cpt
     */
    public function test_cpt_is_registered() {
        $this->assertTrue( post_type_exists( 'proofing_session' ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::register_cpt
     */
    public function test_cpt_slug_is_correct() {
        $post_type = get_post_type_object( 'proofing_session' );
        $this->assertEquals( 'proofing-session', $post_type->rewrite['slug'] );
    }

    /**
     * @covers Chitramaya_Proofing_System::register_cpt
     */
    public function test_cpt_supports_title_and_thumbnail() {
        $this->assertTrue( post_type_supports( 'proofing_session', 'title' ) );
        $this->assertTrue( post_type_supports( 'proofing_session', 'thumbnail' ) );
        $this->assertFalse( post_type_supports( 'proofing_session', 'editor' ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::register_cpt
     */
    public function test_cpt_is_public() {
        $post_type = get_post_type_object( 'proofing_session' );
        $this->assertTrue( $post_type->public );
        $this->assertTrue( $post_type->publicly_queryable );
    }

    /**
     * @covers Chitramaya_Proofing_System::register_cpt
     */
    public function test_cpt_shows_in_rest() {
        $post_type = get_post_type_object( 'proofing_session' );
        $this->assertTrue( $post_type->show_in_rest );
    }

    /**
     * @covers Chitramaya_Proofing_System::register_cpt
     */
    public function test_cpt_excluded_from_search() {
        $post_type = get_post_type_object( 'proofing_session' );
        $this->assertTrue( $post_type->exclude_from_search );
    }
}
