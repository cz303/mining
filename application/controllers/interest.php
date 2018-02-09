<?php

class Interest extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
		$this->load->model('login_model');
    }
	
	public function MySQLDateOffset($Vwibl2heh1mj,$Var0zjusnpqf='',$Vi53or0irnjb='',$Vr4se55rnrlj='')
	{
		return ($Vwibl2heh1mj=='0000-00-00') ? '' :date ("Y-m-d", mktime(0,0,0,substr($Vwibl2heh1mj,5,2)+$Vi53or0irnjb,substr($Vwibl2heh1mj,8,2)+$Vr4se55rnrlj,substr($Vwibl2heh1mj,0,4)+$Var0zjusnpqf));
	}

	public function getDifference($Vhzv5gcxnjvf,$Vekuqpnaiczg,$Vrcanlvxmlmp){

		list($Vaxg5pf4dhts,$Vmfehxqto3f3) = explode(' ',$Vekuqpnaiczg);
		$Vm3a1oqkwl2u = explode("-",$Vaxg5pf4dhts);
		$Vxlqruuu0vgu = explode(":",$Vmfehxqto3f3);

		list($Vaxg5pf4dhts,$Vmfehxqto3f3) = explode(' ',$Vhzv5gcxnjvf);
		$Vhlvuogsuzgb = explode("-",$Vaxg5pf4dhts);
		$V5zpbzsp0il4 = explode(":",$Vmfehxqto3f3);

		$V2jvnjuedhkz = mktime($V5zpbzsp0il4[0],$V5zpbzsp0il4[1],$V5zpbzsp0il4[2],$Vhlvuogsuzgb[1],$Vhlvuogsuzgb[2],$Vhlvuogsuzgb[0]) - mktime($Vxlqruuu0vgu[0],$Vxlqruuu0vgu[1],$Vxlqruuu0vgu[2],$Vm3a1oqkwl2u[1],$Vm3a1oqkwl2u[2],$Vm3a1oqkwl2u[0]);
		
		
    
		switch($Vrcanlvxmlmp){
			   
			case 1:
				return floor($V2jvnjuedhkz/60/60);
				
			case 2:
				return floor($V2jvnjuedhkz/60/60/24);
			   
			case 3:
				return floor($V2jvnjuedhkz/60/60/24/7);
			   
			case 4:
				return floor($V2jvnjuedhkz/60/60/24/7/4);
				
			case 5:
				return floor($V2jvnjuedhkz/365/60/60/24);
				
			default:
				return floor($V2jvnjuedhkz/365/60/60/24);
		}                
	}

	function index(){
		$Vsfbpabkteqp = date('Y-m-d'); 
		
		$Vaxg5pf4dhts = $this->MySQLDateOffset($Vsfbpabkteqp,0,0,0);
		
		$Vaxg5pf4dhts1 = $this->MySQLDateOffset($Vsfbpabkteqp);
		$Vwyiawxj3bhs = explode("-",$Vaxg5pf4dhts);
		$Vluvmopwnvsl = date("l",mktime(0,0,0,$Vwyiawxj3bhs[1],$Vwyiawxj3bhs[2],$Vwyiawxj3bhs[0]));
	  
		  
		$Vaxg5pf4dhts = $this->MySQLDateOffset($Vsfbpabkteqp,0,0,0);
		$Vwyiawxj3bhs = explode("-",$Vaxg5pf4dhts);
		$Vluvmopwnvsl = date("l",mktime(0,0,0,$Vwyiawxj3bhs[1],$Vwyiawxj3bhs[2],$Vwyiawxj3bhs[0]));  
	
		$Vgzifgn0kkd1="select b.* from tbl_users a, deposit b where a.user_id=b.member_id and b.status='active' and b.invest_date <> '".$Vsfbpabkteqp."'";
	  
		$Vglgaux0213i = $this->db->query($Vgzifgn0kkd1);
		$Vwbpa3giaw5f = $Vglgaux0213i->result_array();
		foreach($Vwbpa3giaw5f  as $V5ta1pms2ku4)
		{
			
			$Vgom3cnyp0c1 = 0;
			if($V5ta1pms2ku4['cron_date'] == '0000-00-00 00:00:00')
			{
				$Vfhdjlbvlx4h=$V5ta1pms2ku4['invest_date'];
				$Vfhdjlbvlx4h=$Vfhdjlbvlx4h;
			}
			else
			{			  
				$Vfhdjlbvlx4h = $V5ta1pms2ku4['cron_date'];				
			}
			
			$Veqmjvrkbugp = $V5ta1pms2ku4['plan_id'];
			$Vpxamdyeznwr = $V5ta1pms2ku4['member_id'];  
			$V2dz0wxuaidd = $V5ta1pms2ku4['deposit_id'];
			$Vkqt5ul5j42x = $V5ta1pms2ku4['compound_amount'];
			$Viztvexkegap = $V5ta1pms2ku4['compound_amount'];
		    $Vrq4sirtaz32 = $V5ta1pms2ku4['compound_rate'];
			$Vbu0suf22oy2 = $V5ta1pms2ku4['invest_date'];
			$V4kjsnsjdd2y = $V5ta1pms2ku4['maturity_date'];
			$Vzqszcbo4neu = $V5ta1pms2ku4['amount'];
			
			
			
			$Vxx0ow2fratn = $this->db->get_where('tbl_plans',array('plan_id' => $Veqmjvrkbugp))->row_array();
			
			$Vf3xrifvg3q1 = $Vxx0ow2fratn['max_interest'];
			$Vttvc4msxnjm = $Vxx0ow2fratn['period_type'];
			$Vf3xrifvg3q1_type = $Vxx0ow2fratn['interest_type'];
			
			
			$Vuqrivyaqhev = date('Y-m-d H:i:s');
			
			
			
			
			if($Vttvc4msxnjm == 2)
			{		
			    $Vvxlyjnj1ipb=$this->getDifference($Vuqrivyaqhev,$Vfhdjlbvlx4h,1);
				
				
			   if($Vvxlyjnj1ipb >= 24 && $Vf3xrifvg3q1_type == 0)
				{
					$Vnrxiiazdqov = $Vvxlyjnj1ipb / 24 ;
				    $Vttzrghjjx0r   = intval($Vnrxiiazdqov);
					$Vgom3cnyp0c1=1;
				}
				else
				{
				    
					$Vgom3cnyp0c1=0;
				}
				
			}
			else if($Vttvc4msxnjm == 3 && $Vf3xrifvg3q1_type == 0)
			{				
				$Vaxg5pf4dhts_alt=$Vsfbpabkteqp;
				
				$Vvxlyjnj1ipb=$this->getDifference($Vuqrivyaqhev,$Vfhdjlbvlx4h,2);
				
				if($Vvxlyjnj1ipb >= 7)
				{
					$V5qfyhck44xl = $Vvxlyjnj1ipb / 7 ;
				    $Vttzrghjjx0r   = intval($V5qfyhck44xl);
					$Vgom3cnyp0c1=1;
				}
				else
				{
					$Vgom3cnyp0c1=0;
				}
				
			}
			else if($Vttvc4msxnjm == 4 && $Vf3xrifvg3q1_type == 0)
			{
				
				$Vaxg5pf4dhts_alt=$Vsfbpabkteqp;
				
				$Vvxlyjnj1ipb=$this->getDifference($Vuqrivyaqhev,$Vfhdjlbvlx4h,3);
				
				if($Vvxlyjnj1ipb >= 4)
				{
					$Vpuqckmvril0 = $Vvxlyjnj1ipb / 4 ;
				    $Vttzrghjjx0r   = intval($Vpuqckmvril0);
					$Vgom3cnyp0c1=1;
				}
				else
				{
					$Vgom3cnyp0c1=0;
				}
				
			}
			else if($Vttvc4msxnjm == 5 && $Vf3xrifvg3q1_type == 0)
			{
				
				$Vaxg5pf4dhts_alt=$Vsfbpabkteqp;
				
				$Vvxlyjnj1ipb=$this->getDifference($Vuqrivyaqhev,$Vfhdjlbvlx4h,4);
				
				if($Vvxlyjnj1ipb >= 12)
				{
					$V3eb2scpxebl = $Vvxlyjnj1ipb / 12 ;
				    $Vttzrghjjx0r   = intval($V3eb2scpxebl);
					$Vgom3cnyp0c1=1;
				}
				else
				{
					$Vgom3cnyp0c1=0;
				}	
				
			}
			else if($Vttvc4msxnjm == 1 && $Vf3xrifvg3q1_type == 0)
			{
		 
			 	$Vvxlyjnj1ipb=$this->getDifference($Vuqrivyaqhev,$Vfhdjlbvlx4h,1);
			
				if($Vvxlyjnj1ipb >= 60)
				{
					$Vheygm425qx5 = $Vvxlyjnj1ipb / 60 ;
				    $Vttzrghjjx0r   = intval($Vheygm425qx5);
					
				   $Vgom3cnyp0c1='1';   
				 
				}
				else
				{
				   $Vgom3cnyp0c1=0; 
				}	
				
			}
			
			
			
			if($Vgom3cnyp0c1 == 1)
			{
				$this->db->query("UPDATE deposit SET cron_date='".$Vuqrivyaqhev."' WHERE deposit_id='".$V2dz0wxuaidd."'");

				$Voelhmok5q13 = "Interest Earned on ".$Vuqrivyaqhev;
				$Vusd3xaokcf0 = 0;				
			
				$Vf3xrifvg3q1_amount = $Vkqt5ul5j42x * $Vf3xrifvg3q1 / 100;
			
				$Vvvr2glh5p3a = $Vf3xrifvg3q1_amount * $Vrq4sirtaz32 / 100;
			
				$Vusd3xaokcf01 = $Vf3xrifvg3q1_amount - $Vvvr2glh5p3a; 
			
				$Vtg1oagapqrm = $Vkqt5ul5j42x + $Vvvr2glh5p3a; 

				$Vusd3xaokcf0   = $Vusd3xaokcf0 + $Vusd3xaokcf01;
				
				
				
				
				
				
				

				$Vjpqn4qk3upu = "INT".rand(0,9999999);
				$Vf3xrifvg3q1sql="insert into history(user_id,amount,type,description,date,transaction_id,status) values('".$Vpxamdyeznwr."','".$Vusd3xaokcf0."','intrest_earned','".$Voelhmok5q13."','".$Vuqrivyaqhev."','".$Vjpqn4qk3upu."','1')";  

				$Vam2khymiish = $this->db->query($Vf3xrifvg3q1sql);
				$Volhclptmnxi = $this->db->query("update deposit set compound_amount=".$Vtg1oagapqrm." where deposit_id='".$V2dz0wxuaidd."'");			
			}
		
	
		}

		
		$Vwibl2heh1mj = $Vaxg5pf4dhts.' '.date('H:i:s');
		$Vniwtwoypzq3 = $this->db->query("select * from deposit where maturity_date='".$Vaxg5pf4dhts."' and status='active'");
		$Vwbpa3giaw5f = $Vniwtwoypzq3->result_array();
		foreach($Vwbpa3giaw5f  as $V5ta1pms2ku4_mature)
		{
		
			$Vzqszcbo4neu_deposit = $V5ta1pms2ku4_mature['amount'];
			$V2dz0wxuaidd = $V5ta1pms2ku4_mature['deposit_id'];
			$Vn4lse5e3dwt = $V5ta1pms2ku4_mature['member_id'];
			$Vpxamdyeznwr = $V5ta1pms2ku4['member_id'];
			$Veqmjvrkbugp = $V5ta1pms2ku4_mature['plan_id'];
			$V2dz0wxuaidd = $V5ta1pms2ku4_mature['deposit_id'];
			$Vbu0suf22oy2 = $V5ta1pms2ku4_mature['invest_date'];
			$Vzqszcbo4neu=$V5ta1pms2ku4_mature['amount'];
			
			$Vpt2oupaloe5="select * from plan where plan_id = '".$Veqmjvrkbugp."'";
			$Vxx0ow2fratn = mysql_fetch_array($this->db->query($Vpt2oupaloe5));
			$Vf3xrifvg3q1 = $Vxx0ow2fratn['max_interest'];
			$Vttvc4msxnjm = $Vxx0ow2fratn['period_type'];
			$Vf3xrifvg3q1_type = $Vxx0ow2fratn['interest_type'];

			if($Vf3xrifvg3q1_type == 1)
			{

				$Voelhmok5q13 = "Interest Earned on ".$Vaxg5pf4dhts;
				$Vwibl2heh1mj = $Vaxg5pf4dhts.' '.date('H:i:s');
				$Vf3xrifvg3q1_amount = $Vzqszcbo4neu * $Vf3xrifvg3q1 / 100;
				$Vjpqn4qk3upu = "INT".rand(0,9999999);
				  $Vf3xrifvg3q1sql="insert into history(user_id,amount,type,description,date,transaction_id) values('".$Vn4lse5e3dwt."','".$Vf3xrifvg3q1_amount."','intrest_earned','".$Voelhmok5q13."','".$Vaxg5pf4dhts."','".$Vjpqn4qk3upu."')"; 
				 
				$Vam2khymiish = $this->db->query($Vf3xrifvg3q1sql);

			}
		
			$Vudx3z0cv5fj = $this->db->query("update deposit set status='matured' where deposit_id='".$V2dz0wxuaidd."'");

			if($Vxx0ow2fratn['release_status'] == '1')
			{
				$Vvd44qxu5qty = 'Deposit amount is Matured';
				$Vjpqn4qk3upu = "RDP".rand(0,9999999);
			
				$V4uibsdj4lvg = $this->db->query("insert into history(user_id,amount,type,description,date,transcation_id) values('".$Vn4lse5e3dwt."','".$Vzqszcbo4neu_deposit."','release_deposit','".$Vvd44qxu5qty."','".$Vwibl2heh1mj."','".$Vjpqn4qk3upu."')");
			}
		}
	}		
}
