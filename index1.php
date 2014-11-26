<?php

if (($stream = fopen('php://input', "r")) !== FALSE)
    var_dump(stream_get_contents($stream));

?>