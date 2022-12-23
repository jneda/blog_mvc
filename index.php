<?php
session_start();

require_once './model/manager/PostManager.php';

$posts = PostManager::fetchAllPosts();

require_once './view/indexView.php';
