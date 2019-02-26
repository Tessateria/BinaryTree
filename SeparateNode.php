<?php

class SeparateNode
{
    private $value;
    private $left = null;
    private $right = null;
    private $parent = null;


    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left): void
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right): void
    {
        $this->right = $right;
    }

    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }
}