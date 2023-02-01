<?php

$extension = pathinfo('https://dtc/lol/the.isle.of.the.dead.54645464.jpg', PATHINFO_EXTENSION);
echo uniqid() . '.' . $extension;
 