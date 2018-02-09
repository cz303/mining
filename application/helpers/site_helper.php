<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
function CreateOption($Vgltxzybdcbh, $Vq3bnlgfl2dv, $Vq3aobpsldor) {
    $Vy4rhlxm1etw = & get_instance();
    echo '<select name=cbo' . ucwords($Vgltxzybdcbh) . ' class="cbobig form-control person">';
    echo '<option value="">Select</option>';
    echo $V33k21mwwygn = "select * from $Vq3aobpsldor";
    $Vdv1kjaahcx5 = $Vy4rhlxm1etw->db->query($V33k21mwwygn)->result_array();
    
    
    
    foreach ($Vdv1kjaahcx5 as $Vuqejuoirbsr) {
        if ($Vuqejuoirbsr['country_id'] == $Vq3bnlgfl2dv) echo '<option value=' . $Vuqejuoirbsr['country_id'] . '  selected="selected">' . $Vuqejuoirbsr['country'] . '</option>';
        else echo '<option value=' . $Vuqejuoirbsr['country_id'] . '>' . $Vuqejuoirbsr['country'] . '</option>';
    }
    echo '</select>';
}
function generateCode($Vodqvganqemw) {
    
    $V1usvtcehlac = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $Vznqbj5whpyi = '';
    $V3jwifauxtoo = 0;
    while ($V3jwifauxtoo < $Vodqvganqemw) {
        $Vznqbj5whpyi.= substr($V1usvtcehlac, mt_rand(0, strlen($V1usvtcehlac) - 1), 1);
        $V3jwifauxtoo++;
    }
    return $Vznqbj5whpyi;
}
function captchaCode() {
    $Vvqwsl3alwxz = '250';
    $Vuoutfdzcwue = '90';
    $Vodqvganqemw = '5';
    $Vznqbj5whpyi = generateCode($Vodqvganqemw);
    
    $Vifsveduj2hw = 40; 
    $V3jwifauxtoomage = @imagecreate($Vvqwsl3alwxz, $Vuoutfdzcwue) or die('Cannot initialize new GD image stream');
    
    $Vjbjklxcbkgx = imagecolorallocate($V3jwifauxtoomage, 0, 0, 0);
    $Vjp1jh01hbky = imagecolorallocate($V3jwifauxtoomage, 255, 255, 255);
    $Vjezsc2ko0js = imagecolorallocate($V3jwifauxtoomage, 0, 0, 0);
    
    for ($V3jwifauxtoo = 0;$V3jwifauxtoo < ($Vvqwsl3alwxz * $Vuoutfdzcwue) / 5;$V3jwifauxtoo++) {
        imagefilledellipse($V3jwifauxtoomage, mt_rand(0, $Vvqwsl3alwxz), mt_rand(0, $Vuoutfdzcwue), 1, 1, $Vjezsc2ko0js);
    }
    
    for ($V3jwifauxtoo = 0;$V3jwifauxtoo < ($Vvqwsl3alwxz * $Vuoutfdzcwue) / 300;$V3jwifauxtoo++) {
        imageline($V3jwifauxtoomage, mt_rand(0, $Vvqwsl3alwxz), mt_rand(0, $Vuoutfdzcwue), mt_rand(0, $Vvqwsl3alwxz), mt_rand(0, $Vuoutfdzcwue), $Vjezsc2ko0js);
    }
    
    $Vktgabmgvhcj = imagettfbbox($Vifsveduj2hw, 0, "images/arial.ttf", $Vznqbj5whpyi) or die('Error in imagettfbbox function');
    $Vshql4mg4unu = ($Vvqwsl3alwxz - $Vktgabmgvhcj[4]) / 2;
    $Vhf20zaph13j = ($Vuoutfdzcwue - $Vktgabmgvhcj[5]) / 2;
    imagettftext($V3jwifauxtoomage, $Vifsveduj2hw, 0, $Vshql4mg4unu, $Vhf20zaph13j, $Vjp1jh01hbky, "images/arial.ttf", $Vznqbj5whpyi) or die('Error in imagettftext function');
    
    header('Content-Type: image/jpeg');
    header('Cache-Control: no-cache, must-revalidate');
    imagejpeg($V3jwifauxtoomage);
    imagedestroy($V3jwifauxtoomage);
    $Vy4rhlxm1etw = & get_instance();
    $Vy4rhlxm1etw->session->userdata('code', $Vznqbj5whpyi);
    
    
}
function do_post_request($Vzbqymzogncx, $Vmocxxo5ix53, $Vbpbuem3ymiy = null) {
    $Vb3p0dtj5p01 = array('http' => array('method' => 'POST', 'content' => $Vmocxxo5ix53,));
    if ($Vbpbuem3ymiy !== null) {
        $Vb3p0dtj5p01['http']['header'] = $Vbpbuem3ymiy;
    }
    $Vuhga13d3dsi = stream_context_create($Vb3p0dtj5p01);
    $Vxdory5ftamm = fopen($Vzbqymzogncx, 'rb', false, $Vuhga13d3dsi);
    
    if (!$Vxdory5ftamm) {
        print "Problem with $Vzbqymzogncx, Cannot connect
";
    } else {
        $V2eaf25uaqh5 = stream_get_contents($Vxdory5ftamm);
    }
    if ($V2eaf25uaqh5 === false) {
        print "Problem reading data from $Vzbqymzogncx, No status returned
";
    }
    return $V2eaf25uaqh5;
}
function randomPrefix($Vlw551lbqpgt) {
    $Vlas4r1afzkb = "";
    $Vmidsyol4vjb = rand(0, 9999999);
    $Vmocxxo5ix53 = $Vmidsyol4vjb . "ABCDEFGHIJKLMNOP1234567890";
    for ($V3jwifauxtoo = 0;$V3jwifauxtoo < $Vlw551lbqpgt;$V3jwifauxtoo++) {
        $Vlas4r1afzkb.= substr($Vmocxxo5ix53, (rand() % (strlen($Vmocxxo5ix53))), 1);
    }
    return $Vlas4r1afzkb;
}
function randomPrefix1($Vlw551lbqpgt) {
    $Vlas4r1afzkb = "";
    $Vmocxxo5ix53 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for ($V3jwifauxtoo = 0;$V3jwifauxtoo < $Vlw551lbqpgt;$V3jwifauxtoo++) {
        $Vlas4r1afzkb.= substr($Vmocxxo5ix53, (rand() % (strlen($Vmocxxo5ix53))), 1);
    }
    return $Vlas4r1afzkb;
}
function format_money($V0avnl1wdvvj) {
    $Vy4rhlxm1etw = & get_instance();
    $Vhat4qckfcmz = $Vy4rhlxm1etw->config->config['coin'];
    return $V0avnl1wdvvj . ' ' . $Vhat4qckfcmz;
}
function get_list_of_trans_type() {
    $Vmocxxo5ix53 = array('deposit', 'bonus', 'penality', 'earning', 'withdrawal', 'withdraw_pending', 'intrest_earned',);
    return $Vmocxxo5ix53;
}
function get_list_of_currencies() {
    $Vmocxxo5ix53 = array('BTC' => 'Bitcoin', 'Payeer' => 'Payeer', 'Advcash' => 'Advcash', 'LTC' => 'LTC', 'DASH' => 'DASH', 'ETH' => 'Ethereum', 'XMR' => 'Monero', 'perfect_money' => 'Perfect Money',);
    return $Vmocxxo5ix53;
}
function coinpayment() {
    $Vmocxxo5ix53 = array('BTC', 'LTC' => 'LTC', 'DASH', 'ETH', 'XMR');
    return $Vmocxxo5ix53;
}
function currency_img($Vdoug41nykig) {
    $Vmocxxo5ix53 = array('bitcoin' => 'bitcoin.png', 'payeer' => 'payeer.png', 'advcash' => 'advcash.png', 'perfect_money' => 'perfect-money.png', 'monero' => 'monero.png', 'ltc' => 'litecoin.png', 'dashcoin' => 'dash.png', 'eth' => 'ethereum.png',);
    if (array_key_exists($Vdoug41nykig, $Vmocxxo5ix53)) {
        return $Vmocxxo5ix53[$Vdoug41nykig];
    } else {
        return '';
    }
}
function currency_img2($Vdoug41nykig) {
    
    $Vmocxxo5ix53 = array('Bitcoin' => 'bitcoin.png', 'bitcoin' => 'bitcoin.png', 'payeer' => 'payeer.png', 'advcash' => 'advcash.png', 'perfect_money' => 'perfect-money.png', 'Monero' => 'monero.png', 'ltc' => 'litecoin.png', 'DASH' => 'dash.png', 'dashcoin' => 'dash.png', 'Ethereum' => 'ethereum.png', 'eth' => 'ethereum.png', 'Advcash' => 'advcash.png',);
    if (array_key_exists($Vdoug41nykig, $Vmocxxo5ix53)) {
        return $Vmocxxo5ix53[$Vdoug41nykig];
    } else {
        return '';
    }
}
function period_type() {
    $Vnpnklifhhjg = array('1' => 'Hour', '2' => 'Day', '3' => 'Week', '4' => 'Month', '5' => 'Year');
    return $Vnpnklifhhjg;
}
function iperiod_type() {
    return $Vrqkhppugiow = array('1' => 'Hourly', '2' => 'Daily', '3' => 'Weekly', '4' => 'Monthly', '5' => 'Yearly');
}
function user_total_balence($Vylymojzpb5v) {
    $Vy4rhlxm1etw = & get_instance();
    $Vy4rhlxm1etw->db->select('sum(amount) as earning_amount_sum');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'intrest_earned'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_earned'] = $Vy3jf0f21atu->row()->earning_amount_sum;
    #total_withdraw
    $Vy4rhlxm1etw->db->select('sum(amount) as total_withdraw');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'withdrawal'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_withdraw'] = $Vy3jf0f21atu->row()->total_withdraw;
    #total_withdraw_requets
    $Vy4rhlxm1etw->db->select('sum(amount) as total_withdraw_requets');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'withdraw_pending'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_withdraw_requets'] = $Vy3jf0f21atu->row()->total_withdraw_requets;
    #total_withdraw_requets_count
    $Vy4rhlxm1etw->db->select('count(amount) as total_withdraw_requets');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'withdraw_pending'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_withdraw_requets_count'] = $Vy3jf0f21atu->row()->total_withdraw_requets;
    #active_deposit
    $Vy4rhlxm1etw->db->select('sum(amount) as active_deposit');
    $Vy4rhlxm1etw->db->where(array('member_id' => $Vylymojzpb5v, 'status' => 'active'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('deposit');
    $Vmocxxo5ix53['active_deposit'] = ($Vy3jf0f21atu->row()->active_deposit == NuLL) ? 0 : $Vy3jf0f21atu->row()->active_deposit;;
    #total_commissions
    $Vy4rhlxm1etw->db->select('sum(amount) as total_commissions');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'commissions'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_commissions'] = $Vy3jf0f21atu->row()->total_commissions;
    #total_commissions
    $Vy4rhlxm1etw->db->select('sum(amount) as total_commissions');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'commissions'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_commissions'] = $Vy3jf0f21atu->row()->total_commissions;
    #total_bonus
    $Vy4rhlxm1etw->db->select('sum(amount) as total_bonus');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'bonus'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_bonus'] = $Vy3jf0f21atu->row()->total_bonus;
    #total_penality
    $Vy4rhlxm1etw->db->select('sum(amount) as total_penality');
    $Vy4rhlxm1etw->db->where(array('user_id' => $Vylymojzpb5v, 'type' => 'penality'));
    $Vy3jf0f21atu = $Vy4rhlxm1etw->db->get('history');
    $Vmocxxo5ix53['total_penality'] = $Vy3jf0f21atu->row()->total_penality;
    foreach ($Vmocxxo5ix53 as $Vcdosu24agx2 => $Vzefaioenkzp) {
        if ($Vzefaioenkzp == NULL) {
            $Vmocxxo5ix53[$Vcdosu24agx2] = 0;
        } else {
            $Vmocxxo5ix53[$Vcdosu24agx2] = (float)$Vzefaioenkzp;
        }
    }
    $Vmocxxo5ix53['total_balence'] = $Vmocxxo5ix53['total_earned'] + $Vmocxxo5ix53['total_bonus'] + $Vmocxxo5ix53['total_commissions'] - $Vmocxxo5ix53['total_penality'] - $Vmocxxo5ix53['total_withdraw'];
    $Vmocxxo5ix53['withdrawable_balence'] = $Vmocxxo5ix53['total_earned'] + $Vmocxxo5ix53['total_commissions'] + $Vmocxxo5ix53['total_bonus'] - $Vmocxxo5ix53['total_penality'] - $Vmocxxo5ix53['total_withdraw'] - $Vmocxxo5ix53['total_withdraw_requets'];
    return $Vmocxxo5ix53;
}
function printr($Vdq0pwmvrrs2) {
    echo '<pre>';
    print_r($Vdq0pwmvrrs2);
    echo '</pre>';
}
function get_history_transaction($Vzfdvbbi02pg = "deposit", $Vhf20zaph13jear = 2017) {
    $Vy4rhlxm1etw = & get_instance();
    $Vmocxxo5ix53 = array();
    $Vzfdvbbi02pg = $Vzfdvbbi02pg;
    if ($Vhf20zaph13jear == date('Y')) {
        $Va3fcwvgj1wt = date('Y-m-d H:i:s', strtotime("-1 year +1 seconds"));
        $V0vgfaqxgxuf = date('Y-m-d H:i:s', strtotime("+1 day -1 seconds"));
    } else {
        $Va3fcwvgj1wt = date('Y-m-d H:i:s', strtotime($Vhf20zaph13jear . "-01-01"));
        $V0vgfaqxgxuf = date('Y-m-d H:i:s', strtotime($Va3fcwvgj1wt . " +1 year -1 seconds"));
    }
    if ($Vzfdvbbi02pg == "deposit") {
        $Vy4rhlxm1etw->db->where("(date(invest_date) >= '$Va3fcwvgj1wt' AND date(invest_date) <= '$V0vgfaqxgxuf')");
        $Vy4rhlxm1etw->db->select('sum(amount) as monthly_amount ,MONTH(invest_date) as month');
        $Vy4rhlxm1etw->db->where("(status ='active')");
        $Vy4rhlxm1etw->db->group_by(array('month(invest_date)'));
        $Vy4rhlxm1etw->db->order_by('month(invest_date)', 'asc');
        $Vffawjk5ct0t = $Vy4rhlxm1etw->db->get('deposit');
    } else {
        $Vy4rhlxm1etw->db->where("(history.date >= '$Va3fcwvgj1wt' AND history.date <= '$V0vgfaqxgxuf')");
        $Vy4rhlxm1etw->db->where('history.type', $Vzfdvbbi02pg);
        $Vy4rhlxm1etw->db->select('sum(history.amount) as monthly_amount ,MONTH(history.date) as month')->from('history');
        $Vy4rhlxm1etw->db->group_by(array('month(history.date)'));
        $Vy4rhlxm1etw->db->order_by('month(history.date)', 'asc');
        $Vffawjk5ct0t = $Vy4rhlxm1etw->db->get();
    }
    if ($Vffawjk5ct0t && $Vffawjk5ct0t->num_rows() > 0) {
        $Vmocxxo5ix53 = $Vffawjk5ct0t->result_array();
    }
    return $Vmocxxo5ix53;
}