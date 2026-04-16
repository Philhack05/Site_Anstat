<?php

namespace App\Models;

use CodeIgniter\Model;

class DatargeciEtModel extends Model
{
    protected $table            = 'recrut_datargeci_et';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        	'idUE',	'code_reg',	'region',	'code_dept',	'dept',	'code_sp',	'sousp',	'code_loc',	'loc',	'code_quartier',	'quartier',	'code_ilot',	'code_zr',	'milieu',	'raisonsocial',	'adressegeo',	'localiteetab',	'code_agent',	'code_equipe',	'status',	'code_district',	'district',	'contact',	'code_ent',	'inserted_date',	'updated_date',	'valid_codif',	'valid_codif_1'

    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
