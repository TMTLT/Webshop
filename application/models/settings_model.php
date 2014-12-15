<?php

    /**
     * Class Settings_model
     */
    class Settings_model extends CI_Model {
        /**
         *
         */
        public function __construct() {
            $this->load->database();
        }

        /**
         * @return bool
         *
         */
        public function admin() {
            if ($this->session->userdata('admin')) {
                return true;
            } else {
                return false;
            }
        }

        public function addproduct() {
            $name = uniqid();

            $config['upload_path'] = './database/';
            $config['allowed_types'] = 'jpg|png';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image_file');

            $data = $this->upload->data();

            $iWidth = $iHeight = 200;

            $sTempFileName = './database/' . $data['file_name'];
            if (file_exists($sTempFileName)) {
                switch($data['file_type']) {
                    case 'image/jpeg':
                        $vImg = imagecreatefromjpeg($sTempFileName);
                        break;
                    case 'image/png':
                        $vImg = imagecreatefrompng($sTempFileName);
                        break;
                    default:
                        @unlink($sTempFileName);
                        return;
                }

                $vDstImg = imagecreatetruecolor($iWidth, $iHeight);
                imagecopyresampled($vDstImg,
                                   $vImg,
                                   0,
                                   0,
                                   (int)$this->input->post('x1'),
                                   (int)$this->input->post('y1'),
                                   $iWidth,
                                   $iHeight,
                                   (int)$this->input->post('w'),
                                   (int)$this->input->post('h')
                );

                imagejpeg($vDstImg, $sTempFileName.'.jpeg', 100);
                unlink($sTempFileName);

                $this->load->database();

                $data      = array(
                    'titel'      => $this->input->post('name'),
                    'beschrijving' => $this->input->post('description'),
                    'image'    => $data['file_name'].'.jpeg',
                    'prijs'      => str_replace(",", ".", $this->input->post('price')),
                    'categorie'         => $this->input->post('category'),
                    'aantal'    => 0
                );

                $str = $this->db->insert_string('products', $data);

                $res = $this->db->query($str);

                if(!$res) {
                    // TODO: remove this
                    if(true) {
                        $msg = $this->db->_error_message();
                        $num = $this->db->_error_number();

                        $data['msg'] = "Error(" . $num . ") " . $msg;
                        print_r($data);
                    }

                    return false;
                }

                echo 1;
            }
        }
    }