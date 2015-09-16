<?php
/**
 * Created by IntelliJ IDEA.
 * User: gdr
 * Date: 2014/11/3
 * Time: 21:46
 */
class Sort extends CI_Model{
    //快排，参数是一个字典和他的键,返回值为排好序的键
    function quick_sort($keys,$array) {
//        $keys=array_keys($array);
        $count = count($keys);
        if($count < 2) {
            return $keys;
        }
        $rightArr = array();
        $leftArr = array();
        $key = $array[$keys[0]];
        for($i = 1 ; $i < $count ; $i ++) {
            if($array[$keys[$i]] > $key) {
                $leftArr[] = $keys[$i];
            } else {
                $rightArr[] = $keys[$i];
            }
        }
        $leftArr = $this->quick_sort($leftArr,$array);
        $rightArr = $this->quick_sort($rightArr,$array);
        return array_merge($leftArr, array($keys[0]), $rightArr);
    }
}