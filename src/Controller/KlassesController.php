<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Klasses Controller
 *
 * @property \App\Model\Table\KlassesTable $Klasses
 */
class KlassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $klasses = $this->paginate($this->Klasses);

        $this->set(compact('klasses'));
        $this->set('_serialize', ['klasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Klass id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $klass = $this->Klasses->get($id, [
            'contain' => ['Courses']
        ]);

        $this->set('klass', $klass);
        $this->set('_serialize', ['klass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $klass = $this->Klasses->newEntity();
        if ($this->request->is('post')) {
            $klass = $this->Klasses->patchEntity($klass, $this->request->data);
            if ($this->Klasses->save($klass)) {
                $this->Flash->success(__('The klass has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The klass could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Klasses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('klass', 'courses'));
        $this->set('_serialize', ['klass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Klass id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $klass = $this->Klasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $klass = $this->Klasses->patchEntity($klass, $this->request->data);
            if ($this->Klasses->save($klass)) {
                $this->Flash->success(__('The klass has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The klass could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Klasses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('klass', 'courses'));
        $this->set('_serialize', ['klass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Klass id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $klass = $this->Klasses->get($id);
        if ($this->Klasses->delete($klass)) {
            $this->Flash->success(__('The klass has been deleted.'));
        } else {
            $this->Flash->error(__('The klass could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
