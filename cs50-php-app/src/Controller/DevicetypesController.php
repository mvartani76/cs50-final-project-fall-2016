<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Devicetypes Controller
 *
 * @property \App\Model\Table\DevicetypesTable $Devicetypes
 */
class DevicetypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $devicetypes = $this->paginate($this->Devicetypes);

        $this->set(compact('devicetypes'));
        $this->set('_serialize', ['devicetypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Devicetype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $devicetype = $this->Devicetypes->get($id, [
            'contain' => []
        ]);

        $this->set('devicetype', $devicetype);
        $this->set('_serialize', ['devicetype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $devicetype = $this->Devicetypes->newEntity();
        if ($this->request->is('post')) {
            $devicetype = $this->Devicetypes->patchEntity($devicetype, $this->request->data);
            if ($this->Devicetypes->save($devicetype)) {
                $this->Flash->success(__('The devicetype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The devicetype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('devicetype'));
        $this->set('_serialize', ['devicetype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Devicetype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $devicetype = $this->Devicetypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $devicetype = $this->Devicetypes->patchEntity($devicetype, $this->request->data);
            if ($this->Devicetypes->save($devicetype)) {
                $this->Flash->success(__('The devicetype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The devicetype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('devicetype'));
        $this->set('_serialize', ['devicetype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Devicetype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $devicetype = $this->Devicetypes->get($id);
        if ($this->Devicetypes->delete($devicetype)) {
            $this->Flash->success(__('The devicetype has been deleted.'));
        } else {
            $this->Flash->error(__('The devicetype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
