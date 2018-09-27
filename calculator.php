<?php
class OPERATOR
{
    const ADD = '+';
    const SUBTRACTION = '-';
    const DIVISION = '/';
    const MULTIPLYING = '*';
}

class Calculate
{
	public $s='';
	public $a=array();
	public $sum=0;
//---Compensation of variable values---
	public function replace($s)
	{
	$X=isset($_GET['X'])?$_GET['X']:'';
	$Y=isset($_GET['Y'])?$_GET['Y']:'';
	$Z=isset($_GET['Z'])?$_GET['Z']:'';
	$s=str_replace('X',$X,$s);
	$s=str_replace("Y",$Y,$s);
	$s=str_replace("Z",$Z,$s);
		$this->s=$s;
	}//---end replace---


//---Convert Equation To Array---
	public function convertEqutionToArray()
	{
		$d="";
		$a=array();
		for($i=0,$j=0;$i<strlen($this->s);$i++)
		{	
			if(is_numeric($this->s[$i]))
			{
				$d=$d.$this->s[$i];

			}else
			{
				$a[$j]=(int)$d;
				$d="";$j++;
			}
		}

		$a[$j]=(int)$d;
		$this->a=$a;
		
	}

//---calculate the equations---
	public function calEquation()
	{
		$sum=0;$i=0;
		for($j=2;$i<strlen($this->s);$i++)
		{
			if(!is_numeric($this->s[$i]))
			{
				if($this->s[$i]==OPERATOR::ADD )
				{
						$sum=($this->a[0]+$this->a[1]);
				}elseif ($this->s[$i]==OPERATOR::SUBTRACTION) {

						$sum=($this->a[0]-$this->a[1]);

				}elseif($this->s[$i]==OPERATOR::MULTIPLYING){
						$sum=($this->a[0]*$this->a[1]);

				}elseif($this->s[$i]==OPERATOR::DIVISION){
					
					//handle error division by zero
					$sum=($this->a[0]/$this->a[1]);
					try{
					    eval("\$result = $sum;");
					}
					catch(Exception $e){
					    $result = 0;

					}
					if($this->a[1]==0)
					 	trigger_error("Cannot Divide by Zero");
				}
				break;
			}	
		}

	if(sizeof($this->a)>2)
		for($j=$i+1,$k=2;$j<strlen($this->s);$j++)
		{
			if(!is_numeric($this->s[$j]))
			{
					if($this->s[$j]==OPERATOR::ADD )
					{
							$sum=$sum+$this->a[$k];

					}elseif ($this->s[$j]==OPERATOR::SUBTRACTION) {
							$sum=$sum-$this->a[$k];
					}elseif($this->s[$j]==OPERATOR::MULTIPLYING){
							$sum=$sum*$this->a[$k];
					}elseif($this->s[$j]==OPERATOR::DIVISION){
							//handle error division by zero
							$sum=$sum/$this->a[$k];
							try{
							    eval("\$result = $sum;");
							}
							catch(Exception $e){
							    $result = 0;
							}
							if($this->a[$k]==0)
									 trigger_error("Cannot Divide by Zero");
					}
					$k++;
					if($k>sizeof($this->a)-1)break;
			}	
		}
		$this->sum=$sum;
	}
	public function display()
	{
		echo $this->sum;
	}





}

if(isset($_GET['equation']))
{
	$s=$_GET['equation'];
	$cal=new Calculate();
	$cal->replace($s);
	$cal->convertEqutionToArray();
	$cal->calEquation();
	$cal->display();
	
}else
{
	$s='';
	
	 $message = 'Please Enter The Equation.';

    echo "<SCRIPT type='text/javascript'> alert('$message');
       		window.location.replace(\"equations.html\");
    		</SCRIPT>";
	die();
}






