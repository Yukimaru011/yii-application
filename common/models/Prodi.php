<?php

namespace common\models;
use Yii;

class Prodi extends \yii\db\ActiveRecord
{
        public static function tableName()
    {
        return 'prodi';
    }
        public function rules()
    {
        return [
            [['nama_prodi'], 'string', 'max' => 255],
        ];
    }
        public function attributeLabels()
    {
        return [
            'id_prodi' => 'Id Prodi',
            'nama_prodi' => 'Nama Prodi',
        ];
    }
        public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, ['id_prodi' => 
'id_prodi']);
    }
}
