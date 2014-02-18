<?php

include_once "../oldAnkerPHP/lib/vendor/symfony/lib/yaml/sfYamlParser.php";
include_once "JClass.lib.php";


$parser = new sfYamlParser();
$schemaYml = $parser->parse(file_get_contents("../oldAnkerPHP/config/doctrine/schema.yml"));

foreach($schemaYml as $n => $d) {
	$cls = new JClass($n, $d);
	$ns = "package com.ankercbt.ankerservices.model;";
	file_put_contents("target/" . $n . ".java", $ns . "\n\n" . $cls);
}