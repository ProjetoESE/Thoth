<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class ENUM to the Rule Types;
*/
class Rule_Type extends  SplType{

    const All = 1;
    const At_Leat = 2;
    const Any = 3;

	/**
	 * Rule_Type constructor.
	 */
	public function __construct()
	{
	}

}

