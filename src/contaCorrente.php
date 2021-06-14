<?php

namespace Moovin\Job\Backend;

class contaCorrente extends conta
{
    protected $limiteSaque  = 600.00;
    protected $taxaOp  = 2.50;

    public function __construct()
    {
         parent::__construct();
    }

    

}