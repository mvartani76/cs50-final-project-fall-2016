<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sensordata Controller
 *
 * @property \App\Model\Table\SensordataTable $Sensordata
 */
class SensordataController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sensordata = $this->paginate($this->Sensordata);

        $this->set(compact('sensordata'));
        $this->set('_serialize', ['sensordata']);
    }

    /**
     * View method
     *
     * @param string|null $id Sensordata id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sensordata = $this->Sensordata->get($id, [
            'contain' => []
        ]);

        $this->set('sensordata', $sensordata);
        $this->set('_serialize', ['sensordata']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sensordata = $this->Sensordata->newEntity();
        if ($this->request->is('post')) {
            $sensordata = $this->Sensordata->patchEntity($sensordata, $this->request->data);
            if ($this->Sensordata->save($sensordata)) {
                $this->Flash->success(__('The sensordata has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sensordata could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sensordata'));
        $this->set('_serialize', ['sensordata']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sensordata id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sensordata = $this->Sensordata->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sensordata = $this->Sensordata->patchEntity($sensordata, $this->request->data);
            if ($this->Sensordata->save($sensordata)) {
                $this->Flash->success(__('The sensordata has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sensordata could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sensordata'));
        $this->set('_serialize', ['sensordata']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sensordata id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sensordata = $this->Sensordata->get($id);
        if ($this->Sensordata->delete($sensordata)) {
            $this->Flash->success(__('The sensordata has been deleted.'));
        } else {
            $this->Flash->error(__('The sensordata could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
