<?php
require_once __DIR__ . '/BinaryTree.php';

$tree = new BinaryTree();
$tree->append("5");
$tree->append("2");
$tree->append("5");
$tree->append("3");
$tree->append("7");

$tree->printTree();

print_r($tree->getDeepestElement());
