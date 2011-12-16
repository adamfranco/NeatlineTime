<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

/**
 * Timelines controller integration tests.
 *
 * PHP version 5
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at http://www.apache.org/licenses/LICENSE-2.0 Unless required by
 * applicable law or agreed to in writing, software distributed under the
 * License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS
 * OF ANY KIND, either express or implied. See the License for the specific
 * language governing permissions and limitations under the License.
 *
 * @package     omeka
 * @subpackage  neatline
 * @author      Scholars' Lab <>
 * @author      Bethany Nowviskie <bethany@virginia.edu>
 * @author      Adam Soroka <ajs6f@virginia.edu>
 * @author      David McClure <david.mcclure@virginia.edu>
 * @copyright   2011 The Board and Visitors of the University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html Apache 2 License
 */
?>

<?php

class NeatlineTime_TimelinesControllerTest extends Omeka_Test_AppTestCase
{

    /**
     * Instantiate the helper class, install the plugins, get the database.
     *
     * @return void.
     */
    public function setUp()
    {

        parent::setUp();
        $this->helper = new NeatlineTime_Test_AppTestCase;
        $this->helper->setUpPlugin();
        $this->db = get_db();

        $timeline = $this->helper->_createTimeline();
    }

    /**
     * Data provider for TimelinesController routes.
     */
    public static function routes()
    {
        return array(
            array('/neatline-time/timelines/browse', 'timelines', 'browse'),
            array('/neatline-time/timelines/add', 'timelines', 'add'),
            array('/neatline-time/timelines/edit/1', 'timelines', 'edit'),
            array('/neatline-time/timelines/query/1', 'timelines', 'query')
        );
    }

    /**
     * @dataProvider routes
     */
    public function testRouting($url, $controller, $action, $callback = null)
    {
        $this->dispatch($url, $callback);
        $this->assertController($controller);
        $this->assertAction($action);
    }

}