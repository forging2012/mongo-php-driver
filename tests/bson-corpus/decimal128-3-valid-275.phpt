--TEST--
Decimal128: [basx218] Numbers with E
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('18000000136400F104000000000000000000000000403000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "126.5E+1"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "1265"}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400f104000000000000000000000000403000
{"d":{"$numberDecimal":"1265"}}
{"d":{"$numberDecimal":"1265"}}
{"d":{"$numberDecimal":"1265"}}
18000000136400f104000000000000000000000000403000
18000000136400f104000000000000000000000000403000
===DONE===