<?php
class Index extends Controller{
    public static function test() {
        return $posts = self::query("SELECT * FROM users");
    }


  
}