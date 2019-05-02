<?php
defined('BASEPATH') or die('No direct script access allowed');

// initialize barcode
require_once APPPATH.'libraries/barcode-master/src/milon/barcode/dns1d.php';
use Milon\Barcode\DNS1D;

class User_request extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->id_user == null)
        {
            redirect(base_url('user/index'));
        }
        $this->load->database();
        $this->load->model('m_user');
    }

    public function add_meja()
    {
        $rules = array(
            array(
                'field' => 'kode_meja',
                'label' => 'Kode Meja',
                'rules' => 'required|is_unique[meja.kode_meja]',
                'errors' => array(
                    'is_unique' => 'Kode Meja Sudah Digunakan'
                )
            )
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
            if ($this->db->insert('meja', array('kode_meja'=>$this->input->post('kode_meja')))  === TRUE)
            {
                $res->info = true;
                $res->message = 'Meja Baru Berhasil Ditambahkan';
            }
            else
            {
                $res->info = false;
                $res->message = 'Meja Baru Gagal Ditambahkan';
            }
        }


        echo json_encode($res);
    }

    public function del_meja()
    {
        $rules = array(
            array(
                'field' => 'kode_meja',
                'label' => 'Kode Meja',
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($rules);

        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
            $data = array('kode_meja'=>$this->input->post('kode_meja'));
            if ($this->db->get_where('pemesanan', $data)->result_id->num_rows === 0)
            {
                if ($this->db->delete('meja', $data) === TRUE)
                {
                    $res->info = true;
                    $res->message = 'Meja Lama Berhasil Dihapus';
                }
                else
                {
                    $res->info = false;
                    $res->message = 'Meja Lama Gagal Dihapus';
                }
            }
            else
            {
                $res->info = false;
                $res->message = 'Meja Tidak Bisa Dihapus, Karena sudah memiliki relasi';
            }
        }


        echo json_encode($res);
    }

    public function add_menu()
    {
        $rules = array(
            array(
                'field' => 'nama_menu',
                'label' => 'Nama Menu',
                'rules' => 'required'
            ),
            array(
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
            $data = array(
                'nama_menu'=>$this->input->post('nama_menu'),
                'harga'=>$this->input->post('harga')
            );
            if ($this->db->insert('menu', $data)  === TRUE)
            {
                $res->info = true;
                $res->message = 'Menu Baru Berhasil Ditambahkan';
            }
            else
            {
                $res->info = false;
                $res->message = 'Menu Baru Gagal Ditambahkan';
            }
        }


        echo json_encode($res);
    }

    public function edit_menu()
    {
        $rules = array(
            array(
                'field' => 'id_menu',
                'label' => 'Id Menu',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_menu',
                'label' => 'Nama Menu',
                'rules' => 'required'
            ),
            array(
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
            $data = array(
                'nama_menu'=>$this->input->post('nama_menu'),
                'harga'=>$this->input->post('harga')
            );
            if ($this->db->where('id_menu', $this->input->post('id_menu', TRUE))->update('menu', $data) === TRUE)
            {
                $res->info = true;
                $res->message = 'Menu Baru Berhasil Diedit';
            }
            else
            {
                $res->info = false;
                $res->message = 'Menu Baru Gagal Diedit';
            }
        }

        echo json_encode($res);
    }

    public function del_menu()
    {
        $rules = array(
            array(
                'field' => 'id_menu',
                'label' => 'Id Menu',
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($rules);

        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }

        if ($this->db->delete('menu', array('id_menu'=>$this->input->post('id_menu'))) === TRUE)
        {
            $res->info = true;
            $res->message = 'Menu Lama Berhasil Dihapus';
        }
        else
        {
            $res->info = false;
            $res->message = 'Menu Lama Gagal Dihapus';
        }

        echo json_encode($res);
    }


    public function pesan_menu()
    {
        $rules = array(
            array(
                'field' => 'id_pemesanan',
                'label' => 'Id Pemesanan',
                'rules' => 'required'
            ),
            array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'nama_pelanggan',
                'label' => 'Nama Pelanggan',
                'rules' => 'required'
            ),
            array(
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_hp',
                'label' => 'no_hp',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
            if ($this->m_user->pelanggan_pesan_menu() === TRUE)
            {
                $res->info = true;
                $res->message = "Berhasil Dipesan";
            }
            else
            {
                $res->info = false;
                $res->message = "Gagal Dipesan";
            }
        }
        echo json_encode($res);
    }

    // PR
    public function serve()
    {
        $rules = array(
            array(
                'field' => 'id_pemesanan',
                'label' => 'Id Pemesanan',
                'rules' => 'required'
            ),
            array(
                'field' => 'serve',
                'label' => 'Data Menu',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {

            foreach ($_POST['serve'] as $key => $val)
            {
                foreach ($val as $key)
                {
                    echo $key;
                }
                echo '<br>';
            }
        }

    }

    public function laporan_waiter()
    {
        $data = $this->db->select('*')->from('pemesanan')
        ->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan')
        ->join('menu', 'pemesanan.id_menu = menu.id_menu')
        ->join('user', 'pemesanan.id_user = user.id_user')
        ->having('pemesanan.status', 'selesai')->get()->result_array();
        switch($this->input->get('ext', TRUE))
        {
            case 'excel':
                $new_data = array(
                    array(
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        ''
                    ),
                    array(
                        '',
                        'id_pemesanan',
                        'id_pelanggan',
                        'nama_pelanggan',
                        'jenis_kelamin',
                        'no_hp',
                        'alamat',
                        'kode_meja',
                        'id_menu',
                        'nama_menu',
                        'harga',
                        'total',
                        'id_user',
                        'username',
                        'level',
                    )
                );
                
                foreach ($data as $key => $val)
                {
                    $new_data[$key+2] = array(
                        '',
                        $val['id_pemesanan'],
                        $val['id_pelanggan'],
                        $val['nama_pelanggan'],
                        $val['jenis_kelamin'],
                        $val['no_hp'],
                        $val['alamat'],
                        $val['kode_meja'],
                        $val['id_menu'],
                        $val['nama_menu'],
                        $val['harga'],
                        $val['total'],
                        $val['id_user'],
                        $val['username'],
                        $val['level'],
                    );
                }
                $this->to_csv('lap_pemesanan', $new_data);
            break;
            case 'pdf':
                $header = array(
                    'id_pemesanan',
                    'id_pelanggan',
                    'nama_pelanggan',
                    'jenis_kelamin',
                    'no_hp',
                    'alamat',
                    'kode_meja',
                    'id_menu',
                    'nama_menu',
                    'harga',
                    'total',
                    'id_user',
                    'username',
                    'level',
                    'password',
                );
                $w = array('40', '40', '45', '40', '20', '25', '30', '25', '35', '20', '20', '25', '30', '20');
                $new_data = [];
                foreach ($data as $x => $cell)
                {
                    for ($i=0; $i<count($cell)-1; $i++)
                    {
                        if (is_numeric($x))
                        {
                            $new_data[$x][$i] = $cell[$header[$i]];
                        }
                    }
                }

                foreach ($new_data as $k => $v)
                {
                    unset($new_data[$k][14]);
                }
                unset($header[14]);
                $this->to_pdf($header, $w, $new_data);
            break;
        }
    }

    public function laporan_kasir()
    {
        $data = $this->db->get('transaksi')->result_array();
        switch ($this->input->get('ext', TRUE))
        {
            case 'excel':
                $new_data = array(
                    array(
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                    ),
                    array(
                        '',
                        'id_transaksi',
                        'id_pemesanan',
                        'id_user',
                        'total_bayar',
                        'bayar',
                        'kembali',
                    )
                );

                foreach ($data as $key => $field)
                {
                    $new_data[$key+2] = array(
                        '',
                        $field['id_transaksi'],
                        $field['id_pemesanan'],
                        $field['id_user'],
                        $field['total_bayar'],
                        $field['bayar'],
                        $field['kembali'],
                    );
                }

                $this->to_csv('lap_transaksi',$new_data);
            break;
            case 'pdf':
                $header = array(
                    'id_transaksi',
                    'id_pemesanan',
                    'id_transaksi',
                    'total_bayar',
                    'bayar',
                    'kembali',
                );
                $w = array('40', '40', '40', '40', '30', '30');
                $new_data = [];
                
                foreach ($data as $k => $v)
                {
                    if (is_numeric($k))
                    {
                        for ($i=0; $i<count($v); $i++)
                        {
                            $new_data[$k][] = $v[$header[$i]];
                        }
                    }
                }
                $this->to_pdf($header, $w, $new_data);
            break;
        }
    }

    public function bayar()
    {
        $rules = array(
            array(
                'field' => 'id_pemesanan',
                'label' => 'Id Pemesanan',
                'rules' => 'required'
            ),
            array(
                'field' => 'total_bayar',
                'label' => 'Total Bayar',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'uang_bayar',
                'label' => 'Nama Pelanggan',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
            if ($this->m_user->pelanggan_bayar() === TRUE)
            {
                $res->info = true;
                $res->message = "Transaksi Sukses";
            }
            else
            {
                $res->info = false;
                $res->message = "Transaksi Gagal";
            }
        }
        echo json_encode($res);
    }

    public function struk()
    {
        // Initialize pdf
        $this->load->library('fpdf181/fpdf');
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->SetFillColor(255, 255, 255);

        // Get data last transaksi
        $transaksi = $this->db->get_where('transaksi', array('id_transaksi'=>$this->session->last_transaksi))
        ->result_array();

        foreach ($transaksi as $data)
        {
            $this->fpdf->Cell(86, 6, 'Struk Pembayaran', 0, 1, 'C', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'field', 0, 0, 'C', true);
            $this->fpdf->Cell(6, 6, '', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, 'value', 0, 1, 'C', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'id_transaksi', 0, 0, 'L', true);
            $this->fpdf->Cell(6, 6, '=', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, $data['id_transaksi'], 0, 1, 'R', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'id_pemesanan ', 0, 0, 'L', true);
            $this->fpdf->Cell(6, 6, '=', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, $data['id_pemesanan'], 0, 1, 'R', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'id_user ', 0, 0, 'L', true);
            $this->fpdf->Cell(6, 6, '=', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, $data['id_user'], 0, 1, 'R', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'total_bayar ', 0, 0, 'L', true);
            $this->fpdf->Cell(6, 6, '=', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, $data['total_bayar'], 0, 1, 'R', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'bayar ', 0, 0, 'L', true);
            $this->fpdf->Cell(6, 6, '=', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, $data['bayar'], 0, 1, 'R', true);
            $this->fpdf->Ln();

            $this->fpdf->Cell(50, 6, 'kembali ', 0, 0, 'L', true);
            $this->fpdf->Cell(6, 6, '=', 0, 0, 'C', true);
            $this->fpdf->Cell(30, 6, $data['kembali'], 0, 1, 'R', true);
            $this->fpdf->Ln();

            // New class barcode
            $d = new DNS1D();
            $d->setStorPath(APPPATH."/cache/");
            $this->fpdf->WriteHTML($d->getBarcodeHTML($this->session->last_transaksi, "C128"));
        }

        $this->fpdf->Output();
    }

    public function to_csv($filename, $data)
    {
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename.'.csv');
        header('Content-Transfer-Encoding: UTF-8');
        header('Pragma: no-cache');

        $handle = fopen('php://output', 'w+');

        foreach ($data as $val)
        {
            fputcsv($handle,$val);
        }
        fclose($handle);
    }
    
    public function to_pdf($header, $w, $data)
    {
        // Initialize
        $this->load->library('fpdf181/fpdf');
        $this->fpdf->AddPage('L');
        $this->fpdf->SetFont('Arial', null, 16);

        $this->fpdf->SetFillColor(255,255,255);

        // Header
        for ($i=0; $i<count($header); $i++)
        {
            if ($i == 7)
            {
                $this->fpdf->Cell($w[$i], 6, $header[$i], 1, 1, 'C', true);
                continue;
            }

            $this->fpdf->Cell($w[$i], 6, $header[$i], 1, 0, 'C', true);
        }
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        
        foreach ($data as $key => $row)
        {
            for ($i=0; $i<count($row); $i++)
            {
                if ($i == 7)
                {
                    $this->fpdf->cell($w[$i], 6, $row[$i], 1, 1, 'L', true);
                    continue;
                }
                $this->fpdf->Cell($w[$i], 6, $row[$i], 1, 0, 'L', true);
            }
            
            $this->fpdf->Ln();
            $this->fpdf->Ln();
        }
        $this->fpdf->Output();
    }
}
?>