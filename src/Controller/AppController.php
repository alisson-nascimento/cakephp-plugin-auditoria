<?php

namespace Auditoria\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
//     use \Crud\Controller\ControllerTrait;
//    
//    /**
//     * Initialization hook method.
//     *
//     * Use this method to add common initialization code like loading components.
//     *
//     * e.g. `$this->loadComponent('Security');`
//     *
//     * @return void
//     */
//    public function initialize()
//    {
//        parent::initialize();
//
//        $this->loadComponent('RequestHandler', [
//            'enableBeforeRedirect' => false,
//        ]);
//        
//        $this->loadComponent('Crud.Crud', [
//            'actions' => [
//                'Crud.Index',
//                'Crud.View',
//            ],
//            'listeners' => [
//                // New listeners that need to be added:
//                'CrudView.View',
//                'Crud.Redirect',
//                'Crud.RelatedModels',
//                // If you need searching. Generally it's better to load these
//                // only in the controller for which you need searching.
//                'Crud.Search',
//                'CrudView.ViewSearch',
//            ]
//        ]);
//        
//        $this->loadComponent('Search.Prg', [
//            'actions' => [
//                'index',
//            ],
//        ]);
//
//        /*
//         * Enable the following component for recommended CakePHP security settings.
//         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
//         */
//        //$this->loadComponent('Security');
//               
//    }
//    
//    /**
//     * Before render callback.
//     *
//     * @param \Cake\Event\Event $event The beforeRender event.
//     * @return void
//     */
//    public function beforeRender(\Cake\Event\Event $event)
//    {
//        // For CakePHP 3.1+
//        if ($this->viewBuilder()->getClassName() === null) {
//            $this->viewBuilder()->setClassName('CrudView\View\CrudView');
//        }
//        /*
//         * Devolve o layout default para a pasta src/Template
//         */
//       $this->viewBuilder()->setLayout('default.ace');
//    }
}
