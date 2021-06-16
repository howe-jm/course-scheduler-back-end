<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Schedule Controller
 *
 * @property \App\Model\Table\ScheduleTable $Schedule
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScheduleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'Professors'],
        ];
        $schedule = $this->paginate($this->Schedule);

        $this->set(['response' => $schedule]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedule->get($id, [
            'contain' => ['Courses', 'Professors', 'StudentSchedule'],
        ]);

        $this->set(['response' => $schedule]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedule->newEmptyEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedule->patchEntity($schedule, $this->request->getData());
            if ($this->Schedule->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $courses = $this->Schedule->Courses->find('list', ['limit' => 200]);
        $professors = $this->Schedule->Professors->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'courses', 'professors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedule->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedule->patchEntity($schedule, $this->request->getData());
            if ($this->Schedule->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $courses = $this->Schedule->Courses->find('list', ['limit' => 200]);
        $professors = $this->Schedule->Professors->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'courses', 'professors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedule->get($id);
        if ($this->Schedule->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
