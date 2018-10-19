<?php
namespace Auditoria\Controller;

use Auditoria\Controller\AppController;

/**
 * AuditoriaRegistros Controller
 *
 * @property \Auditoria\Model\Table\AuditoriaRegistrosTable $AuditoriaRegistros
 *
 * @method \Auditoria\Model\Entity\AuditoriaRegistro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuditoriaRegistrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $auditoriaRegistros = $this->paginate($this->AuditoriaRegistros);

        $this->set(compact('auditoriaRegistros'));
    }

    /**
     * View method
     *
     * @param string|null $id Auditoria Registro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auditoriaRegistro = $this->AuditoriaRegistros->get($id, [
            'contain' => ['AuditoriaLogs']
        ]);

        $this->set('auditoriaRegistro', $auditoriaRegistro);
    }
}
