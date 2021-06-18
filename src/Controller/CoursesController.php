<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{
    public function index()
    {
        $this->request->allowMethod(['get']);

        $this->paginate = [
            'contain' => [
                'Schedule' => [
                    'Professors',
                    'StudentSchedule' => [
                        'Students',
                    ],
                ],
            ],
        ];
        $courses = $this->paginate($this->Courses);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($courses, 1));
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        if (is_null($id) || !$this->Courses->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Course does not exist.'
                    ],
                    1
                ));
        }

        $course = $this->Courses->get($id, [
            'contain' => [
                'Schedule' => [
                    'Professors',
                    'StudentSchedule' => [
                        'Students',
                    ],
                ],
            ],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($course, 1));
    }

    public function add()
    {
        $this->request->allowMethod(['post']);

        $course = $this->Courses->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $data);
            if ($this->Courses->save($course)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201)
                    ->withStringBody(json_encode($course, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not create new course.'
                ],
                1
            ));
    }

    public function edit($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);

        if (is_null($id) || !$this->Courses->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Course does not exist.'
                    ],
                    1
                ));
        }

        $course = $this->Courses->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $data);
            if ($this->Courses->save($course)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode($course, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not update course.'
                ],
                1
            ));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if (is_null($id) || !$this->Courses->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Course does not exist.'
                    ],
                    1
                ));
        }

        $course = $this->Courses->get($id);

        if ($this->Courses->delete($course)) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(
                    [
                        'message' => "Course {$id} was successfully deleted."
                    ],
                    1
                ));
        }
        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not delete course'
                ],
                1
            ));
    }
}
