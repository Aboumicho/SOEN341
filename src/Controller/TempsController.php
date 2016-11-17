<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Temps Controller
 *
 * @property \App\Model\Table\TempsTable $Temps
 */
class TempsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $temps = $this->paginate($this->Temps);

        $this->set(compact('temps'));
        $this->set('_serialize', ['temps']);
    }

    /**
     * View method
     *
     * @param string|null $id Temp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $temp = $this->Temps->get($id, [
            'contain' => []
        ]);

        $this->set('temp', $temp);
        $this->set('_serialize', ['temp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $temp = $this->Temps->newEntity();
        if ($this->request->is('post')) {
            $temp = $this->Temps->patchEntity($temp, $this->request->data);
            if ($this->Temps->save($temp)) {
                $this->Flash->success(__('The temp has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The temp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('temp'));
        $this->set('_serialize', ['temp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Temp id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $temp = $this->Temps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $temp = $this->Temps->patchEntity($temp, $this->request->data);
            if ($this->Temps->save($temp)) {
                $this->Flash->success(__('The temp has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The temp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('temp'));
        $this->set('_serialize', ['temp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Temp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $temp = $this->Temps->get($id);
        if ($this->Temps->delete($temp)) {
            $this->Flash->success(__('The temp has been deleted.'));
        } else {
            $this->Flash->error(__('The temp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
