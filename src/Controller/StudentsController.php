<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{
    public function index()
    {
        $this->request->allowMethod(['get']);

        $this->paginate = [
            'contain' => [
                'CourseRecords',
                'StudentSchedule' => [
                    'Schedule' => [
                        'Courses',
                        'Professors',
                    ],
                ],
            ],
        ];
        $students = $this->paginate($this->Students);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($students, 1));
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        if (is_null($id) || !$this->Students->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Student does not exist.',
                    ],
                    1
                ));
        }

        $student = $this->Students->get($id, [
            'contain' => [
                'CourseRecords',
                'StudentSchedule' => [
                    'Schedule' => [
                        'Courses',
                        'Professors'
                    ]
                ]
            ],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($student, 1));
    }

    public function add()
    {
        $this->request->allowMethod(['post']);

        $student = $this->Students->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $data);
            if ($this->Students->save($student)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201)
                    ->withStringBody(json_encode($student, 1));
            }
        }
        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not create new student.'
                ],
                1
            ));
    }

    public function edit($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);

        if (is_null($id) || !$this->Students->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Student does not exist.'
                    ],
                    1
                ));
        }

        $student = $this->Students->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $data);
            if ($this->Students->save($student)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode($student, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not update student.'
                ],
                1
            ));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if (is_null($id) || !$this->Students->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Student does not exist.'
                    ],
                    1
                ));
        }

        $student = $this->Students->get($id);

        if ($this->Students->delete($student)) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(
                    [
                        'message' => "Student {$id} was successfully deleted."
                    ],
                    1
                ));
        }
        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not delete student.'
                ],
                1
            ));
    }
}
