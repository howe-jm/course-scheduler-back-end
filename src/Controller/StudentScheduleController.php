<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * StudentSchedule Controller
 *
 * @property \App\Model\Table\StudentScheduleTable $StudentSchedule
 * @method \App\Model\Entity\StudentSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentScheduleController extends AppController
{
    public function index()
    {
        $this->request->allowMethod(['get']);

        $this->paginate = [
            'contain' => [
                'Schedule' => [
                    'Professors',
                    'Courses',
                ],
                'Students',
            ],
        ];
        $studentSchedule = $this->paginate($this->StudentSchedule);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($studentSchedule, 1));
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        if (is_null($id) || !$this->StudentSchedule->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Student schedule item does not exist.'
                    ],
                    1
                ));
        }

        $studentSchedule = $this->StudentSchedule->get($id);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($studentSchedule, 1));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentSchedule = $this->StudentSchedule->newEmptyEntity();
        if ($this->request->is('post')) {
            $studentSchedule = $this->StudentSchedule->patchEntity($studentSchedule, $this->request->getData());
            if ($this->StudentSchedule->save($studentSchedule)) {
                $this->Flash->success(__('The student schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student schedule could not be saved. Please, try again.'));
        }
        $schedule = $this->StudentSchedule->Schedule->find('list', ['limit' => 200]);
        $students = $this->StudentSchedule->Students->find('list', ['limit' => 200]);
        $this->set(compact('studentSchedule', 'schedule', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Schedule id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentSchedule = $this->StudentSchedule->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentSchedule = $this->StudentSchedule->patchEntity($studentSchedule, $this->request->getData());
            if ($this->StudentSchedule->save($studentSchedule)) {
                $this->Flash->success(__('The student schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student schedule could not be saved. Please, try again.'));
        }
        $schedule = $this->StudentSchedule->Schedule->find('list', ['limit' => 200]);
        $students = $this->StudentSchedule->Students->find('list', ['limit' => 200]);
        $this->set(compact('studentSchedule', 'schedule', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Schedule id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentSchedule = $this->StudentSchedule->get($id);
        if ($this->StudentSchedule->delete($studentSchedule)) {
            $this->Flash->success(__('The student schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The student schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
