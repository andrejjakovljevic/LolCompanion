<?php
/*
 * Autor: Veljko Rvovic 18/0132
 */
namespace App\Models;

use CodeIgniter\Model;

class QuestAttributeModel extends Model
{
    protected $table      = 'questattributes';
    protected $primaryKey = '(attributeId)';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['attributeId', 'questId', 'attributeKey', 'attributeValue'];
    
    /**
     * Autor: Veljko Rvovic rv180132
     * Pomocna funkcija za dohvatanje delova izazova
     * @return object
     */
    public static function getAttributes($idQ) {
        $qAttrModel = new QuestAttributeModel();
        $attributes = $qAttrModel->where('questId', $idQ)->findAll();
        return $attributes;
    }
    
}