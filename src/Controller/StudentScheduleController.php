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

    public function add()
    {
        $this->request->allowMethod(['post']);

        $studentSchedule = $this->StudentSchedule->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $studentSchedule = $this->StudentSchedule->patchEntity($studentSchedule, $data);
            if ($this->StudentSchedule->save($studentSchedule)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201)
                    ->withStringBody(json_encode($studentSchedule, 1));
            }
        }

        $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Student schedule not added.'
                ],
                1
            ));
    }

    public function edit($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);

        if (is_null($id) || !$this->StudentSchedule->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Student Schedule item does not exist.'
                    ],
                    1
                ));
        }

        $studentSchedule = $this->StudentSchedule->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentSchedule = $this->StudentSchedule->patchEntity($studentSchedule, $data);
            if ($this->StudentSchedule->save($studentSchedule)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode($studentSchedule, 1));
            }
        }
        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Student schedule item not updated.'
                ],
                1
            ));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);

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

        if ($this->StudentSchedule->delete($studentSchedule)) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(
                    [
                        'message' => 'Student schedule item deleted.'
                    ],
                    1
                ));
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Student schedule item could not be deleted.'
                ],
                1
            ));
    }
}
