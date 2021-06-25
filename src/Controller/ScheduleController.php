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
    public function index()
    {
        $this->request->allowMethod(['get']);

        $this->paginate = [
            'contain' => ['Courses', 'Professors', 'StudentSchedule' => ['Students']],
        ];

        $schedule = $this->paginate($this->Schedule);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($schedule, 1));
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        if (is_null($id) || !$this->Schedule->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Schedule item does not exist.',
                    ],
                    1
                ));
        }

        $schedule = $this->Schedule->get($id, [
            'contain' => [
                'Courses',
                'Professors',
                'StudentSchedule' => [
                    'Students',
                ],
            ],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($schedule, 1));
    }


    public function add()
    {
        $this->request->allowMethod(['post']);

        $schedule = $this->Schedule->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $schedule = $this->Schedule->patchEntity($schedule, $data);
            if ($this->Schedule->save($schedule)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201)
                    ->withStringBody(json_encode($schedule, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Schedule item not added.',
                    $schedule
                ],
                1
            ));
    }


    public function edit($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);

        if (is_null($id) || !$this->Schedule->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Schedule item does not exist.',
                    ],
                    1
                ));
        }

        $schedule = $this->Schedule->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedule->patchEntity($schedule, $data);
            if ($this->Schedule->save($schedule)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode($schedule, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not update schedule item.'
                ],
                1
            ));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if (is_null($id) || !$this->Schedule->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Schedule item does not exist.'
                    ],
                    1
                ));
        }

        $schedule = $this->Schedule->get($id);

        if ($this->Schedule->delete($schedule)) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(
                    [
                        'message' => "Schedule item {$id} was successfully deleted."
                    ],
                    1
                ));
        }
        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not delete schedule item.'
                ],
                1
            ));
    }
}
