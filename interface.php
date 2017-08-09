<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 13:54
 */

interface video{
    public function getVideo();
    public function getConnt();
}

class movie implements video{
    public function getVideos()
    {
        // TODO: Implement getVideo() method.
        echo "11";
    }

    public function getConnt()
    {
        // TODO: Implement getConnt() method.
        echo "222";
    }
}

movie::getVideos();