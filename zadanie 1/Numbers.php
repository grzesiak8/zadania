<?php
declare(strict_types=1);

class Numbers {
	private $odds = [];
	private $even = [];

    /**
     * @param int $number
     * @throws Exception
     */
	public function addNumber(int $number)
	{
		if(is_numeric($number) && $number > 0) {
			if ($number % 2 == 0) {
				$this->even[] = $number;
			} else {
				$this->odds[] = $number;
			}
		} else {
			throw new \Exception('Wrong number');
		}
	}

    /**
     * @return string
     */
	public function getResult() : string
	{
		$evenResult = 0;
		$oddsResult = 0;
		if (count($this->even) > 0) {
			foreach($this->even as $oneEven) {
				$evenResult += $oneEven * 3;
			}
		}
		if (count($this->odds) > 0) {
			foreach($this->odds as $oneOdds) {
				$oddsResult += $oneOdds * 2;
			}
		}
		if($evenResult > $oddsResult) {
			return 'Trzykrotność liczb parzystych jest większa';
		} else if($evenResult == $oddsResult) {
			return 'Trzykrotność liczb parzystych jest równa Dwukrotność liczb nieparzystych';
		} else {
			return 'Dwukrotność liczb nieparzystych jest większa';
		}
	}

    /**
     * @return array
     */
	public function getEvenNumbers() : array
	{
		return $this->even;
	}

    /**
     * @return array
     */
	public function getOddsNumbers() : array
	{
		return $this->odds;
	}
}