<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function check_absen_harian()
{
    $CI =& get_instance();
    $id_user = $CI->session->id_user;
    $CI->load->model('Absensi_model', 'absensi');
    $absen_user = $CI->absensi->absen_harian_user($id_user)->num_rows();
    if (!is_weekend()) {
        if ($absen_user < 2) {
            $CI->session->set_userdata('absen_warning', 'true');
        } else {
            $CI->session->set_userdata('absen_warning', 'false');
        }
    }
}

//fungsi by arifoxs grogol
function cek_telat($jam,$jam_masuk){
	
	$hasil = abs(strtotime($jam)-strtotime($jam_masuk));
	$detik = $hasil;
	$menit = floor($detik/60);
	$detik-=60*$menit;
	$jam2 = floor($menit/60);
	$menit -= $jam2*60;
	
	return ($jam2<10?"0".$jam2:$jam2).":".($menit<10?"0".$menit:$menit).":".($detik<10?"0".$detik:$detik);
	
}


//cek jam telat atau tidak
function check_jam($jam, $status, $raw = false)
{
    if ($jam) {
        $status = ucfirst($status);
        $CI =& get_instance();
        $CI->load->model('Jam_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('jam')->row();

        if ($status == 'Masuk' && (strtotime($jam) > strtotime($jam_kerja->finish))) {
            if ($raw) {
                return [
                    'status' => 'telat',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-danger" style="font-size:12px"> Telat ' . cek_telat($jam,$jam_kerja->finish) . '</span>';
            }
        }
		elseif ($status == 'Pulang' && strtotime($jam) > strtotime($jam_kerja->finish)) {
            if ($raw) {
                return [
                    'status' => 'lembur',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-success" style="font-size:12px">' . $jam. ' </span>';
            }
        } else {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-primary" style="font-size:30px">' . $jam . '</span>';
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Hadir'
            ];
        }
        return 'Tidak Hadir';
    }
}

///Modifikasi keterangan di laporan
function check_jam_baru($jam, $status, $raw = false)
{
    if ($jam) {
        $status = ucfirst($status);
        $CI =& get_instance();
        $CI->load->model('Jam_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('jam')->row();

        if ($status == 'Masuk' && (strtotime($jam) > strtotime($jam_kerja->finish))) {
            if ($raw) {
                return [
                    'status' => 'telat',
                    'text' => $jam
                ];
            } else {
                return $jam;
            }
        }
		elseif ($status == 'Pulang' && strtotime($jam) > strtotime($jam_kerja->finish)) {
            if ($raw) {
                return [
                    'status' => 'lembur',
                    'text' => $jam
                ];
            } else {
                return $jam;
            }
        } else {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => $jam
                ];
            } else {
                return $jam;
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Hadir'
            ];
        }
        return 'Tidak Hadir';
    }
}

function check_telat_baru($jam, $status, $raw = false)
{
    if ($jam) {
        $status = ucfirst($status);
        $CI =& get_instance();
        $CI->load->model('Jam_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('jam')->row();

        if ($status == 'Masuk' && (strtotime($jam) > strtotime($jam_kerja->finish))) {
            if ($raw) {
                return [
                    'status' => 'telat',
                    'text' => $jam
                ];
            } else {
                return "Terlambat ".cek_telat($jam,$jam_kerja->finish);
            }
        }
		elseif ($status == 'Pulang' && strtotime($jam) < strtotime($jam_kerja->finish)) {
            if ($raw) {
                return [
                    'status' => 'pulangpagi',
                    'text' => $jam
                ];
            } else {
                return "Pulang Pagi ".cek_telat($jam,$jam_kerja->finish);
            }
        } else {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => $jam
                ];
            } else {
                return "-";
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Hadir'
            ];
        }
        return '-';
    }
}



//Buat print
function check_jam2($jam, $status, $raw = false)
{
    if ($jam) {
        $status = ucfirst($status);
        $CI =& get_instance();
        $CI->load->model('Jam_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('jam')->row();

        if ($status == 'Masuk' && (strtotime($jam) > strtotime($jam_kerja->finish))) {
            if ($raw) {
                return [
                    'status' => 'telat',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-danger text-center" style="font-size:10px"> Telat ' . cek_telat($jam,$jam_kerja->finish) . '</span>';
            }
        }
		elseif ($status == 'Pulang' && strtotime($jam) > strtotime($jam_kerja->finish)) {
            if ($raw) {
                return [
                    'status' => 'lembur',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-success text-center" style="font-size:10px">' . $jam. ' </span>';
            }
        } else {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-primary text-center" style="font-size:10px">' . $jam . '</span>';
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Hadir'
            ];
        }
        return 'Tidak Hadir';
    }
}
function is_weekend($tgl = false)
{
    $tgl = @$tgl ? $tgl : date('d-m-Y');
    return in_array(date('l', strtotime($tgl)), ['Saturday', 'Sunday']);
}

/* End of File: d:\Ampps\www\project\absen-pegawai\application\helpers\check_absen_helper.php */