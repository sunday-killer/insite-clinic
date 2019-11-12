<?php
/**
 * Created by PhpStorm.
 * User: hairutdinovbr
 * Date: 2019-11-12
 * Time: 12:37 PM
 */

function is_ajax() {
  return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
}