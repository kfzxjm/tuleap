<?php
require_once('SanitizerTestCase.class.php');

/**
 * Copyright (c) Xerox Corporation, Codendi Team, 2001-2009. All rights reserved
 * 
 * 
 *
 * abstract
 */
class SimpleSanitizerTestCase extends SanitizerTestCase {
    function SimpleSanitizerTest($test_name = false) {
        $this->UnitTestCase($test_name);
    }

    function setUp() {
        trigger_error("setUp method must be implemented and must instanciate this->sanitizer");
    }
    /**
     * Test the main function of the sanitizer : sanitize()
     * 
     */
    function testSanitize() {
        $bad_tag   = "<tag";
        $html      = "Lorem ipsum dolor sit amet,".$bad_tag." consectetuer adipiscing elit.";
        $result    = $this->sanitizer->sanitize($html);
        $this->assertNoUnwantedPattern("/".$bad_tag."/",$result);
    }    
}

//We just tells SimpleTest to always ignore this testcase
SimpleTestOptions::ignore('SimpleSanitizerTestCase');
?>