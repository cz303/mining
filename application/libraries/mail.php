<?php



class Mail {

    public function __construct() {

        $this->CI = &get_instance();
        $this->CI->load->library('email');
    }

    

    public function sendEmail($Vkg0aw223kcs, $Vgeu2rx5xc4w, $Vld5fbk2n1id, $Vmt0302hgn5x) {
        $this->CI->email->set_mailtype("html");
        $this->CI->email->from($Vkg0aw223kcs[0], $Vkg0aw223kcs[1]);
        $this->CI->email->to($Vgeu2rx5xc4w);
        $this->CI->email->subject($Vld5fbk2n1id);
        $V52ujzwbr0ov = $Vmt0302hgn5x;
        $this->CI->email->message($V52ujzwbr0ov);
        $V2kokwdbptht = $this->CI->email->send();
        if ($V2kokwdbptht) {
            return $V2kokwdbptht;
        } else {
            $Vyrkodvljby0 = show_error($this->CI->email->print_debugger());
            return $Vyrkodvljby0;
        }
    }

}
