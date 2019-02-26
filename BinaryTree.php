<?php
require_once __DIR__ . '/SeparateNode.php';

class BinaryTree
{
    private $top = null;

    private function searchPlace($obj, $at)
    {
        if ($obj->getValue() == $at->getValue()) return;

        $child = null;
        $child = $obj->getValue() > $at->getValue() ? $at->getRight() : $at->getLeft();

        if (is_null($child)) {
            $obj->getValue() > $at->getValue() ? $at->setRight($obj) : $at->setLeft($obj);
            $obj->setParent($at);
        } else {
            $this->searchPlace($obj, $child);
        }
    }

    public function append($value)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);
        if (is_null($this->top)) {
            $this->top = $newElement;
        } else {
            $this->searchPlace($newElement, $this->top);
        }
    }

    public function getDeepestElement($currentElement = null, $count = 1)
    {
        if (is_null($currentElement)) {
            $currentElement = $this->top;
        }

        $leftChild = $currentElement->getLeft();
        $rightChild = $currentElement->getRight();

        if (is_null($leftChild) && is_null($rightChild)) {
            return ['element' => $currentElement->getValue(), 'deepCount' => $count];
        }

        $leftChildInfo = null;
        $rightChildInfo = null;

        if (!is_null($leftChild)) {
            $leftChildInfo = $this->getDeepestElement($leftChild, $count + 1);
        }

        if (!is_null($rightChild)) {
            $rightChildInfo = $this->getDeepestElement($rightChild, $count + 1);
        }

        if (is_null($leftChildInfo)) {
            return $rightChildInfo;
        }

        if (is_null($rightChildInfo)) {
            return $leftChildInfo;
        }

        if ($rightChildInfo['deepCount'] > $leftChildInfo['deepCount']) {
            return $rightChildInfo;
        }

        return $leftChildInfo;
    }

    public function printTree($top = null)
    {
        if (is_null($top)) {
            $top = $this->top;
        }

        $left = $top->getLeft();
        $right = $top->getRight();

        $leftValue = $left ? $left->getValue() : null;
        $rightValue = $right ? $right->getValue() : null;

        echo 'v: ' . $top->getValue() . '(l: ' . $leftValue . ', r: ' . $rightValue . ')' . PHP_EOL;

        if (!is_null($left)) {
            $this->printTree($left);
        }

        if (!is_null($right)) {
            $this->printTree($right);
        }
    }
}
