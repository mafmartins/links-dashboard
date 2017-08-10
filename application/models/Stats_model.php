<?php

Class Stats_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_total_downloads(){
		$query = $this->db->get('links');
		$sum = 0;

		foreach ($query->result() as $row)
		{
    		$sum = $sum + $row->downloads;
		}
		
		return $sum;
	}

	public function get_total_average(){
		$query = $this->db->get('links');
		$sum = 0;

		foreach ($query->result() as $row)
		{
    		$sum = $sum + $row->downloads;
		}

		$count = $this->db->count_all_results('links');

		$result = $sum / $count;

		return round($result);
	}

	public function get_links_count(){
		$count = $this->db->count_all_results('links');

		return $count;
	}

	public function get_days_average(){

		$query = $this->db->get('links');
		$sum = 0;

		foreach ($query->result() as $row)
		{
    		$sum = $sum + $row->downloads;
		}
		

		$now = time(); // or your date as well
    	$your_date = strtotime("2012-07-06");
    	$datediff = $now - $your_date;
    	$days = floor($datediff/(60*60*24));

    	$result = $sum/ $days;

		return round($result);
	}

	public function get_top_eps_stats($lower=0, $upper=10){

		$q = "SELECT * FROM links ORDER BY downloads DESC LIMIT ". $lower .", ".$upper;

        $query = $this->db->query($q);

        return $query->result_array();

	}

	public function get_top_proj_downs(){

		$q = "SELECT * FROM projetos";

		$query = $this->db->query($q);

		$i=1;

		$proj_sums = array();

		$array_to_sort = array();

		foreach ($query->result() as $row)
		{
    		$q2 = "SELECT * FROM links WHERE idprojeto=". $row->idprojetos;

			$query2 = $this->db->query($q2);

			$sum = 0;

			foreach ($query2->result() as $row2){

				$sum = $sum + $row2->downloads;
			
			}

			$array_to_sort[$row->titulo] = $sum;

		}

		arsort($array_to_sort);

		$proj_sums[0] = array('Projeto', 'Downloads');

		foreach ($array_to_sort as $k => $v){

			$proj_sums[$i] = array($k,$v);

			$i++;
		}

		$proj_sums = array_slice($proj_sums, 0, 11);

        return $proj_sums;

	}

	public function get_top_proj_avg(){

		$q = "SELECT * FROM projetos WHERE tipo='Anime'";

		$query = $this->db->query($q);

		$i=1;

		$proj_sums = array();

		$array_to_sort = array();

		foreach ($query->result() as $row)
		{
    		$q2 = "SELECT * FROM links WHERE idprojeto=". $row->idprojetos;

			$query2 = $this->db->query($q2);

			$sum = 0;

			foreach ($query2->result() as $row2){

				$sum = $sum + $row2->downloads;
			
			}

			$array_to_sort[$row->titulo] = round($sum / $row->rls_eps);

		}

		arsort($array_to_sort);

		$proj_sums[0] = array('Projeto', 'Downloads');

		foreach ($array_to_sort as $k => $v){

			$proj_sums[$i] = array($k,$v);

			$i++;
		}

		$proj_sums = array_slice($proj_sums, 0, 11);

        return $proj_sums;
	
	}

	public function get_last_days(){

		$q = sprintf("SELECT (DATE(last_access)) AS unique_date, COUNT(*) AS amount FROM ips GROUP BY unique_date ORDER BY unique_date DESC LIMIT 0,30");

		//$q2 = "SELECT last_access, COUNT(*) AS amount FROM ips WHERE date_format(last_access, '%Y-%m-%d') = date_format('2016-03-21 12:45:34', '%Y-%m-%d')";

		$query = $this->db->query($q);
		//$query2 = $this->db->query($q2);

		$i = 0;
		$z = 0;

		$days[0] = array('Dia', 'Downloads');

		foreach ($query->result() as $row)
		{

			$temp[$i] = array(date('d-m-Y',strtotime("-$z days")), (int)$row->amount);

			$i++;
			$z++;

		}

		$i = 1;

		$temp= array_reverse($temp);

		foreach ($temp as $item)
		{
			$days[$i] = $item;

			$i++;

		}

		//foreach ($query2->result() as $row)
		//{

		//	echo $row->amount."<br>";

		//}		

        return $days;
	
	}
}
?>