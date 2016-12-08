<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\DashboardTable $Dashboard
 */
class DashboardController extends AppController
{

    public function initialize()
    {
       parent::initialize();
       $this->modelClass = false;
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('default');

        $this->paginate = [
            'contain' => ['Users']
            ];

        // Query the Devicetypes table
        $this->loadModel('Devicetypes');
        $devicetypes = $this->Devicetypes->find('all');
        $this->set('devicetypes', $devicetypes);

        $numdevicetypes = $devicetypes->count();
        
        // Query the number of devices by DeviceType in the database
        $this->loadModel('Devices');

        for ($i=1; $i<=$numdevicetypes; $i++){
            $devicecounts[$i] = $this->Devices->find('all')
                ->where(['deviceType_id' => $i])
                ->count();
        }
        $this->set('devicecounts', $devicecounts);

    }

    /**
     * View method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => []
        ]);

        $this->set('dashboard', $dashboard);
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboard = $this->Dashboard->newEntity();
        if ($this->request->is('post')) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->data);
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dashboard'));
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->data);
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dashboard'));
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboard = $this->Dashboard->get($id);
        if ($this->Dashboard->delete($dashboard)) {
            $this->Flash->success(__('The dashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
