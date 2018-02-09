<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Withdraw extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
		$this->load->model('login_model');
    }
	
	public function index(){
		$Vgbsdgexogkr=$this->db->where(array('type' => 'withdraw_pending'))->get('history')->result_array();	
		foreach($Vgbsdgexogkr as $V51xv45qs53d){
			$V44qrlgck501=$V51xv45qs53d['id'];
			$Vgfv0zj35dze=$this->db->where(array('user_id' => $V51xv45qs53d['user_id']))->get('tbl_account_details')->row_array();	
			
			$Veeydhkecqgo=array('bitcoin', 'Litcoin', 'eth', 'dashcoin', 'xmr');
			if(in_array($V51xv45qs53d['payment_thro'], $Veeydhkecqgo)){
				$Vd5c24ujpjcd=array();
				$Vd5c24ujpjcd['amount']=$V51xv45qs53d['amount'];
				
				if($V51xv45qs53d['payment_thro']=='bitcoin')
				{
					$Vd5c24ujpjcd['currency']='BTC';
					$Viz42eub4wyp='bitcoin';
				}
				else if($V51xv45qs53d['payment_thro']=='Litcoin')
				{
					$Vd5c24ujpjcd['currency']='LTC';
					$Viz42eub4wyp='Litcoin';
				}
				else if($V51xv45qs53d['payment_thro']=='eth')
				{
					$Vd5c24ujpjcd['currency']='ETH';
					$Viz42eub4wyp='eth';
				}
				else if($V51xv45qs53d['payment_thro']=='dashcoin')
				{
					$Vd5c24ujpjcd['currency']='DASH';
					$Viz42eub4wyp='dashcoin';
				}
				else if($V51xv45qs53d['payment_thro']=='xmr')
				{
					$Vd5c24ujpjcd['currency']='XMR';
					$Viz42eub4wyp='xmr';
				}
				$Vcpvxmibci4t['note']=$V51xv45qs53d['description'];
				$Vcpvxmibci4t['auto_confirm']=1;
				$Vd5c24ujpjcd['currency2']='USD';
				$Vd5c24ujpjcd['address']=$Vgfv0zj35dze[$Viz42eub4wyp];

				$Vk5ci0optosn=$this->config->item('bitcoin_public_key');
				$Vh3130oa5wyr=$this->config->item('bitcoin_private_key');
					
				$V0hxs4gpe3xd=$this->coinpayments_api_call('create_withdrawal', $Vk5ci0optosn, $Vh3130oa5wyr, $Vd5c24ujpjcd); 
				if($V0hxs4gpe3xd['error']=='ok'){
				
					$V1tkwt1hbduq=$this->db->query("update history set type='withdrawal',date='".date('Y-m-d h:i:s')."', transaction_id='".$V0hxs4gpe3xd['result']['id']."' where id=".$V44qrlgck501);
				}
			}
			else if($V51xv45qs53d['payment_thro']=='advcash'){
				$Vrtcf2oylnhz=$this->config->item('advcash_withdraw_email');
				$Vfxuak2hlblq=$this->config->item('advcash_api_name');
				$Vctie4qrbxul=$this->config->item('advcash_api_password');
				$Vgct1uh04yk5=$Vgfv0zj35dze['advcash'];
				require_once("MerchantWebService.php");
				$Vjw2wakggt2j = new MerchantWebService();

				$Vealduhk4o3r = new authDTO();
				$Vealduhk4o3r->apiName = $Vfxuak2hlblq;
				$Vealduhk4o3r->accountEmail = $Vrtcf2oylnhz;
				$Vealduhk4o3r->authenticationToken = $Vjw2wakggt2j->getAuthenticationToken($Vctie4qrbxul);

				$Vm0u2vvtpc54 = new sendMoneyRequest();
				$Vm0u2vvtpc54->amount = $V51xv45qs53d['amount'];
				$Vm0u2vvtpc54->currency = "USD";
				$Vm0u2vvtpc54->email = $Vgct1uh04yk5;
				$Vm0u2vvtpc54->note = $V51xv45qs53d['description'];
				$Vm0u2vvtpc54->savePaymentTemplate = false;

				$Vrmvpmpypjmp = new validationSendMoney();
				$Vrmvpmpypjmp->arg0 = $Vealduhk4o3r;
				$Vrmvpmpypjmp->arg1 = $Vm0u2vvtpc54;

				$Vnpgczce13sx = new sendMoney();
				$Vnpgczce13sx->arg0 = $Vealduhk4o3r;
				$Vnpgczce13sx->arg1 = $Vm0u2vvtpc54;

				try {
					$Vjw2wakggt2j->validationSendMoney($Vrmvpmpypjmp);
					$Vnpgczce13sxResponse = $Vjw2wakggt2j->sendMoney($Vnpgczce13sx);

					$Vxfidi1wftrb=$Vnpgczce13sxResponse->return;
					$V1tkwt1hbduq=$this->db->query("update history set type='withdrawal',date='".date('Y-m-d h:i:s')."', transaction_id='".$Vxfidi1wftrb."' where id=".$V44qrlgck501);
				} 
				catch (Exception $Vnhm0uuykimv) {
				}
			}	
			else if($V51xv45qs53d['payment_thro']=='payeer'){
				require_once("cpayeer.php");
				$Vkf50wmobuwo=$Vgfv0zj35dze['payeer'];
				$Vgct1uh04yk5  = $this->config->item('payeer_account');
				$Vgr3usyw5z5v = $this->config->item('payeer_api_user');
				$Vkb14fdh3pok = $this->config->item('payeer_api_secret');
							
				$Vvknqglpfzjl=new CPayeer($Vgct1uh04yk5, $Vgr3usyw5z5v, $Vkb14fdh3pok);
				if ($Vvknqglpfzjl->isAuth()){
					$Veklmphom1ml = $Vvknqglpfzjl->transfer(array(
						'curIn' => 'USD',
						'sum' => $V51xv45qs53d['amount'],
						'curOut' => 'USD',
						'to' => $Vkf50wmobuwo,
						'comment' => $V51xv45qs53d['description'],
					));
					if (empty($Veklmphom1ml['errors'])){						
						$Vxfidi1wftrb=$Veklmphom1ml['historyId'];
						$V1tkwt1hbduq=$this->db->query("update history set type='withdrawal',date='".date('Y-m-d h:i:s')."', transaction_id='".$Vxfidi1wftrb."' where id=".$V44qrlgck501);
					}
					else{
						echo '<pre>'.print_r($Veklmphom1ml["errors"], true).'</pre>';
					}
				}
				else{
					echo '<pre>'.print_r($Vvknqglpfzjl->getErrors(), true).'</pre>';
				}
			}
			else if($V51xv45qs53d['payment_thro']=='perfect_money'){
				$Vaq0aynt01dl='WTH'.rand(1, 99999999);
				$Vg11lum5rhzl=$Vgfv0zj35dze['perfect_money'];
				$Vpzlzb3hw43q=$this->config->item('perfect_money_member_id');
				$Vsylh2fyjy0p=$this->config->item('perfect_money_phrase_hash');
				$Vjd44yg2nzdn=$this->config->item('perfect_money_account_id');
				$Vyep0bqesraf = 'AccountID='.$Vpzlzb3hw43q.'&PassPhrase='.$Vsylh2fyjy0p.'&Payer_Account='.$Vjd44yg2nzdn.'&Payee_Account='.$Vg11lum5rhzl.'&Amount='.number_format($V51xv45qs53d['amount'],2,'.', '').'&PAY_IN=1&PAYMENT_ID='.$Vaq0aynt01dl.'&Memo='.$V51xv45qs53d['description'];		
				$Vtbbah5lqvpo=fopen('https://perfectmoney.is/acct/confirm.asp?'.$Vyep0bqesraf, 'rb');
				if($Vtbbah5lqvpo===false){
					$Vzjcdynyc23y = 'error opening url';
				}

				
				$Vvbltn01tphw=array(); $Vvbltn01tphw="";
				while(!feof($Vtbbah5lqvpo)) $Vvbltn01tphw.=fgets($Vtbbah5lqvpo);
				fclose($Vtbbah5lqvpo);

				
				if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $Vvbltn01tphw, $Vwbpa3giaw5f, PREG_SET_ORDER)){
					$Vzjcdynyc23y= 'Invalid output';
				}

				$Vwztie2nghhj="";
				foreach($Vwbpa3giaw5f as $Vc23eiaejwdl){
					$Vseq1edikdvg=$Vc23eiaejwdl[1];
					$Vwztie2nghhj[$Vseq1edikdvg]=$Vc23eiaejwdl[2];
				}

				if(isset($Vwztie2nghhj['PAYMENT_BATCH_NUM']) && $Vwztie2nghhj['PAYMENT_BATCH_NUM']!=''){
					$Vxfidi1wftrb=$Vwztie2nghhj['PAYMENT_BATCH_NUM'];
					$V1tkwt1hbduq=$this->db->query("update history set type='withdrawal',date='".date('Y-m-d h:i:s')."', transaction_id='".$Vxfidi1wftrb."' where id=".$V44qrlgck501);
				}
			}
		}
	}

	public function coinpayments_api_call($V3zmm2yxwbze, $Vk5ci0optosn, $Vh3130oa5wyr , $Vd5c24ujpjcd = array()) { 
		$Vd5c24ujpjcd['version'] = 1; 
		$Vd5c24ujpjcd['cmd'] = $V3zmm2yxwbze; 
		$Vd5c24ujpjcd['key'] = $Vk5ci0optosn; 
		$Vd5c24ujpjcd['format'] = 'json'; 
		 
		
		$V3be3wpopr4x = http_build_query($Vd5c24ujpjcd, '', '&'); 
		 
		
		$Vtdxsbidljox = hash_hmac('sha512', $V3be3wpopr4x, $Vh3130oa5wyr); 
		 
		
		static $Vaqz3fhdbceh = NULL; 
		if ($Vaqz3fhdbceh === NULL) { 
			$Vaqz3fhdbceh = curl_init('https://www.coinpayments.net/api.php'); 
			curl_setopt($Vaqz3fhdbceh, CURLOPT_FAILONERROR, TRUE); 
			curl_setopt($Vaqz3fhdbceh, CURLOPT_RETURNTRANSFER, TRUE); 
			curl_setopt($Vaqz3fhdbceh, CURLOPT_SSL_VERIFYPEER, 0); 
		} 
		curl_setopt($Vaqz3fhdbceh, CURLOPT_HTTPHEADER, array('HMAC: '.$Vtdxsbidljox)); 
		curl_setopt($Vaqz3fhdbceh, CURLOPT_POSTFIELDS, $V3be3wpopr4x); 
		 
		
		$Vou4vxorrdoe = curl_exec($Vaqz3fhdbceh);                 
		
		if ($Vou4vxorrdoe !== FALSE) { 
			if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) { 
				
				$V5boos1d4pv1 = json_decode($Vou4vxorrdoe, TRUE, 512, JSON_BIGINT_AS_STRING); 
			} else { 
				$V5boos1d4pv1 = json_decode($Vou4vxorrdoe, TRUE); 
			} 
			if ($V5boos1d4pv1 !== NULL && count($V5boos1d4pv1)) { 
				return $V5boos1d4pv1; 
			} else { 
				
				return array('error' => 'Unable to parse JSON result ('.json_last_error().')'); 
			} 
		} else { 
			return array('error' => 'cURL error: '.curl_error($Vaqz3fhdbceh)); 
		} 
	} 
}