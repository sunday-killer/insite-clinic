<?php
/**
 * Created by PhpStorm.
 * User: hairutdinovbr
 * Date: 2019-11-12
 * Time: 12:29 PM
 */
include_once 'functions.php';


if (is_ajax()) {
  $webservice = 'http://178.205.108.206/kazan_v82_test1/ws/IWTS.1cws?wsdl';
  $username = 'infostand';
  $password = 'infostand';

  $client = new SoapClient(
    $webservice,
    [
      'login' => $username,
      'password'       => $password,
      'soap_version'   => SOAP_1_2,
      'cache_wsdl'     => WSDL_CACHE_NONE,
      'exceptions'     => true,
      'trace'          => 1
    ]
  );

  $Date = date("d.m.Y H:i:s");
  $Id = time();
  $Name = $_POST['name'];
  $Email = $_POST['email'];
  $Phone = $_POST['phone'];
  $Doctor = 551;
  $Comment = $_POST["comment"];
  echo json_encode($client->MakeAnAppointment(compact('Date', 'Id', 'Name', 'Email', 'Phone', 'Doctor', 'Comment')));
  exit();
}
