<?php

class App 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listCars()
    {
      

    }

    public function formIsEmpty($field = [])
	{
		if (count($field) > 0) {
			foreach ($field as $value) {
				if (empty($_POST[$value]) || trim($_POST[$value]) == '') {
					return true;
				}
			}
		}
		return false;
	}

  
}
