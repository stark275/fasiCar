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

	/**
	 * Transforme une chaine en date
     * @param $date
     * @return Date
     * Execute une requète pre SQL
     */
	public function dateFormate($date)
	{
		$time = strtotime($date);
		$newformat = date('Y-m-d',$time);
		return $newformat;
	} // 2020-02-12

	public function dateReFormate($date){
		$time = strtotime($date);
		$newformat = date('d-m-y',$time);
		return $newformat;
	}
	/**
	 * Verifie si une periode est valide
     * @param $begin
     * @param $end  
     * @return bool
     * Execute une requète pre SQL
     */
	public function periodIsvalid($begin, $end)
	{
		if ($this->dateFormate($begin) < $this->dateFormate($end)) {
			return true;
		}
		return false;
	}

  
}
