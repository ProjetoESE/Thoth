<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class ENUM to the Status Extraction;
*/
class Status_Extraction_Type extends  SplType{

    const  Approved = 1;
    const  Disapproved = 2;

	/**
	 * Status_Extraction_Type constructor.
	 */
	public function __construct()
	{
	}


}
