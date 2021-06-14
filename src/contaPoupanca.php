<?php

namespace Moovin\Job\Backend;

class contaPoupanca extends conta
{
    protected $limiteSaque = 1000.00;
    protected $taxaOp = 0.8;

    public function __construct()
    {
        parent::__construct();
    }

}