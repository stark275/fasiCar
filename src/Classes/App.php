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


	public function dateFormate($date)
	{
		$time = strtotime($date);
		$newformat = date('Y-m-d',$time);
		return $newformat;
	}

	public function periodIsvalid($begin, $end)
	{
		if ($this->dateFormate($begin) < $this->dateFormate($end)) {
			return true;
		}
		return false;
	}

  
}
