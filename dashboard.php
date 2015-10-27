<?php
class Dashboard { 

	public $result;

	public function init(){ 

		$string = file_get_contents("convertcsv.json");
		$this->result = json_decode($string); 
	}   

	public function getTotalObrasStatusConcluido(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 90)
				$total++;		
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmLicitacao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 40)
				$total++;		
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmContratacao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 5)
				$total++;		
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmObras(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 70)
				$total++;		
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmExecucao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 71)
				$total++;		
			$i++;
		}
		return $total;
	}
	public function getMediaInvestimento(){
		$media = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->investimento_total!="")
			{
				$media+=$this->result[$i]->investimento_total;
			}
				
			$i++;
		}
		$media=$media/$i;
		return $media;
	}
	public function getMaiorInvestimento(){
		$maior = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->investimento_total!="")
			{
				if($maior==0)
					$maior=$this->result[$i]->investimento_total;

				if($maior<$this->result[$i]->investimento_total)
					$maior=$this->result[$i]->investimento_total;
			}
				
			$i++;
		}
		return $maior;
	}
	public function getMenorInvestimento(){
		$menor = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->investimento_total!="")
			{
				if($menor==0)
					$menor=$this->result[$i]->investimento_total;

				if($menor>$this->result[$i]->investimento_total)
					$menor=$this->result[$i]->investimento_total;
			}
				
			$i++;
		}
		return $menor;
	}
}
?>

