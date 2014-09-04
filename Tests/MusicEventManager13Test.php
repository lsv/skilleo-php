<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/4/14
 * Time: 12:22 PM
 */

class MusicEventManager13Test extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('{"bands" : [{"id" : "1", "style" : "Rock", "date_range" : "01-05/15-05"}, {"id" : "2", "style" : "Hip Hop", "date_range" : "05-05/08-05"}], "shows" : [{"id" : "1", "style" : "Rock", "date" : "05-05"}, {"id" : "2", "style" : "Hip Hop", "date" : "01-05"}, {"id" : "3", "style" : "Classic", "date" : "18-05"}]}', '1-1,2-0,3-0'),
            //array('{"bands":[{"id":"3","style":"Rock","date_range":"16-07/26-07"},{"id":"5","style":"Rock","date_range":"06-07/16-07"}],"shows":[{"id":"2","style":"Rock","date":"16-07"},{"id":"3","style":"Rock","date":"26-07"}]}', '2-2,3-1')
        );
    }

    public function test_can_count_if_band_is_from_date()
    {
        $this->assertEquals('1-1', MusicEventManager13::getEvents('{"bands":[{"id":"3","style":"Rock","date_range":"16-07/17-07"}],"shows":[{"id":"1","style":"Rock","date":"16-07"}]}'));
    }

    public function test_can_count_if_band_is_to_date()
    {
        $this->assertEquals('1-1', MusicEventManager13::getEvents('{"bands":[{"id":"3","style":"Rock","date_range":"16-07/17-07"}],"shows":[{"id":"1","style":"Rock","date":"17-07"}]}'));
    }

    public function test_throws_error_invalid_json()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->assertTrue(MusicEventManager13::getEvents('123=>asdasd'));
    }

    public function test_throws_error_not_set_band()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->assertTrue(MusicEventManager13::getEvents('{"shows": []}'));
    }

    public function test_throws_error_band_invalid()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->assertTrue(MusicEventManager13::getEvents('{"bands": [{"id": 0}], "shows": []}'));
    }

    public function test_throws_error_not_set_show()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->assertTrue(MusicEventManager13::getEvents('{"bands": []}'));
    }

    public function test_throws_error_show_invalid()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->assertTrue(MusicEventManager13::getEvents('{"bands": [{"id" : "1", "style" : "Rock", "date_range" : "01-05/15-05"}], "shows": [{"id": 0}]}'));
    }

    public function test_throws_error_date_invalid()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->assertTrue(MusicEventManager13::getEvents('{"bands": [{"id" : "1", "style" : "Rock", "date_range" : "23-15/15-05"}], "shows": [{"id" : "1", "style" : "Rock", "date" : "05-05"}]}'));
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_validate($input, $expected)
    {
        $this->assertEquals($expected, MusicEventManager13::getEvents($input));
    }

}
 