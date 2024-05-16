<?php
namespace common\models;
use Yii;

class Mahasiswa extends \yii\db\ActiveRecord
{
 public static function tableName()
 {
    return 'mahasiswa';
    }
    public function rules()
    {
      return [
          [['id_prodi'], 'integer'],
          [['nim', 'nama'], 'string', 'max' => 255],
          [['id_prodi'], 'exist', 'skipOnError' => true, 
'targetClass' => Prodi::class, 'targetAttribute' => ['id_prodi' 
   => 'id_prodi']],
            ];
       }
       public function attributeLabels()
       { 
            return [
               'id_mahasiswa' => 'Id Mahasiswa',
               'nim' => 'Nim',
               'nama' => 'Nama',
               'id_prodi' => 'Prodi',
            ];
      }

    public function getProdi()
    {
         return $this->hasOne(Prodi::class, ['id_prodi' => 
'id_prodi']);
    }
   }
   