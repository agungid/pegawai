<?php

function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();

    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "delete"){
        $log_tipe  = 4;
    }
    else{
        $log_tipe  = 5;
    }

    // paramter
    $param['log_user']      = $CI->session->userdata('user_id');
    $param['tipe_user']     = $CI->session->userdata('level_id');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;

    //load model log
    $CI->load->model('m_log');
    //save to database
    $CI->m_log->save_log($param);
}

function show_log(){
    $CI =& get_instance();
    $query = $CI->db->from('tabel_log')->order_by('log_id','desc')->limit(25)->get();
    foreach ($query->result() as $data) {
        if ($data->tipe_user==1) {
            $user_account = $CI->db->select('nama')
                                ->from('account_login')
                                ->join('admin','admin.admin_id=account_login.user_id')
                                ->where('account_login.user_id',$data->log_user)
                                ->get()->result();

            //->where('id',$data->log_user)->get()->result();
            // $user_account = $CI->db->query("SELECT user_id FROM account_login WHERE id='".$data->log_user."'");
            $user = $user_account[0]->nama;
        }else{
            /*$user = $CI->db->from('')*/
        }
        echo "<div class='log'>$user $data->log_desc <div class='date'>Admin | $data->log_time</div></div>";
    }
}