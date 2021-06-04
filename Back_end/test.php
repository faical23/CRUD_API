<?php
 $link = $_SERVER['PHP_SELF'];
 $link_array = explode('/',$link); /// break the link by / and posted inside array
 echo $page = end($link_array); //// get the last index in arrays