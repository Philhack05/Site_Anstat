<?php

namespace App\Models;

use CodeIgniter\Model;

class DatargeciModel extends Model
{
    protected $table            = 'recrut_datargeci';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'code_district'	,'district'	,'code_reg',	'region',	'code_dept',	'dept',	'code_sp',	'sousp',	'code_loc'	,'loc'	,'code_quartier',	'quartier',	'code_ilot'	,'code_zr',	'milieu',	'datecollecte_deb',	'datecollecte_fin',	'b8',	'b8aut'	,'b8a',	'b8b_latitude',	'b8b_longitude',	'b8b_precision'	,'b8c1',	'b8c2',	'b8c3_latitude',	'b8c3_longitude',	'b8c3_precision',
        	'b9',	'b10',	'f01',	'f01a',	'f02',	'f02a',	'f03',	'f04',	'f05',	'c1',	'c2',	'c2_aut',	'c3a1',	'c3a2',	'c3b',	'c4',	'c5',	'c6a',	'c6b'	,'c7a',	'c7b',	'c8',	'c9',	'c10m',	'c10a',	'c11m',	'c11a',	'c12',	'c12b',	'c12b_aut',	'c13',	'c16',	'c16b'	,'c17',	'c18',	'c18_aut',	'c19',	'c20',	'c20a',	'c20b1',	'c20b2',	'c20b3',	'c21a',	'c21b'	,'c21c',	'c21d',	'c21d_aut',	'c22'	,'c23a',	'c23b',	'c23c'	,'c24',	'e1a'	,'e1b'	,'e1c',	'e1d',	'e1e',	'e1f',	'e1g',	'e1h',	'e1i'	,'e1j',	'e1k',	'e1l'	,'e1m',
            	'e1n',	'e1o'	,'e1p',	'e1q',	'e1r',	'e1s',	'e1t',	'e1t_aut',	'e2',	'r4',	'code_agent',	'code_equipe',	'status',	'type_enregistrement',	'is_rejet',	'is_valide'	,'commentaire',	'e1u',	'e1v',	'motif_rejet',	'c25',	'c25a',	'c26',	'code_ent',	'e1w',	'e1y',	'e1z',	'inserted_date',	'updated_date',	'valid_codif',	'valid_codif_1'	,'c20b4'

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
