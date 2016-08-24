<?php
if (isset($islogged)) {
    include_once 'after_login.php';
}else{
    include_once 'before_login.php';
} ?>
