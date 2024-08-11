<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmahasiswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang';
    protected $primaryKey       = 'kode';
    protected $allowedFields    = ['kode','nama','harga','satuan', ];

}