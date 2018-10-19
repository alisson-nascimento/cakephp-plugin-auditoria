<?php

namespace Auditoria\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\Event;
use Cake\ORM\Entity;

class LoggerBehavior extends Behavior {

    public function initialize(array $config) {
        parent::initialize($config);
    }
    
    private function arrayRecursiveDiff($aArray1, $aArray2) {
        $aReturn = array();

        foreach ($aArray1 as $mKey => $mValue) {
          if (array_key_exists($mKey, $aArray2)) {
            if (is_array($mValue)) {
              $aRecursiveDiff = $this->arrayRecursiveDiff($mValue, $aArray2[$mKey]);
              if (count($aRecursiveDiff)) { $aReturn[$mKey] = $aRecursiveDiff; }
            } else {
              if ($mValue != $aArray2[$mKey]) {
                $aReturn[$mKey] = $mValue;
              }
            }
          } else {
            $aReturn[$mKey] = $mValue;
          }
        }
        return $aReturn;
    } 

    public function afterSave(Event $event, Entity $entity, \ArrayObject $options) {
        
        $class = get_class($entity);
        
        if(!in_array($class, ['Auditotia\\Model\\Entity\\AuditoriaRegistro', 'Auditotia\\Entity\\Table\\AuditoriaLog'])){
            
            $registroTable = \Cake\ORM\TableRegistry::get('AuditoriaRegistros');
            $logTable = \Cake\ORM\TableRegistry::get('AuditoriaLogs');
            $log = $logTable->newEntity();

            if($entity->isNew()){

                $registro = $registroTable->newEntity();

                $registro->modelo_table = $class;
                $registro->modelo_pk = $entity->id;
                $registro->created = date('Y-m-d H:i:s');

                $log->tipo_acao = 'Insert';
            }else{
                $data = \Cake\Routing\Router::getRequest()->getData();
                unset($data['_save']);
                if(empty($data)){
                    $data = $entity->toArray();
                }
                
                $diff = $entity->extractOriginalChanged(array_keys($data));
                
//                $diff = $this->arrayRecursiveDiff($original, $data);

                $query = $registroTable->find('all')
                ->where(['modelo_pk'=>$entity->id, 'modelo_table'=>$class]);

                $registro = $query->first();

                $log->dados_antigos = json_encode($diff);
                $log->tipo_acao = 'Update';
            }


            $log->created = date('Y-m-d H:i:s');

            if ($registroTable->save($registro)) {
                //The $article entity contains the id now
                $registro_id = $registro->id;
                $log->auditoria_registro_id = $registro_id;
    //            pr($log);
                $logTable->save($log);
            }
        }                        
    }    
    
    public function afterDelete(Event $event, Entity $entity, \ArrayObject $options) {
         
        $class = get_class($entity);
        
        if(!in_array($class, ['Auditotia\\Model\\Entity\\AuditoriaRegistro', 'Auditotia\\Model\\Entity\\AuditoriaLog'])){
            $registroTable = \Cake\ORM\TableRegistry::get('AuditoriaRegistros');
            $logTable = \Cake\ORM\TableRegistry::get('AuditoriaLogs');
            $log = $logTable->newEntity();

            $query = $registroTable->find('all')
            ->where(['modelo_pk'=>$entity->id, 'modelo_table'=>$class]);

            $registro = $query->first();

            $log->tipo_acao = 'Delete';
            $log->created = date('Y-m-d H:i:s');
            
            $registro_id = $registro->id;
            $log->auditoria_registro_id = $registro_id;

            if ($logTable->save($log)) {                
               //TODO 
            }
        }                
    }
}
