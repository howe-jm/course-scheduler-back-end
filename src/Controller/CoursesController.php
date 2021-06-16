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
        $courses = $this->paginate($this->Courses);

        $this->set(['response' => $courses]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['CourseRecords', 'Schedule'],
        ]);

        $this->set(['response'], $course);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $course = $this->Courses->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $data);
            if ($this->Courses->save($course)) {
                $this->set(['response' => $course]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
        $this->set(['response' => ['error' => 'Could not save new course.']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function edit($id = null)
    {
        $course = $this->Courses->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $data);
            if ($this->Courses->save($course)) {
                $this->set(['response' => $course]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
            }
        }
        $this->set(['response' => ['error' => 'Could not update course.']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);

        if ($this->Courses->delete($course)) {
            $this->set(['response' => ['message' => 'Student has been deleted.']]);
        } else {
            $this->set(['response' => ['error' => 'Could not delete course.']]);
        }

        return $this->redirect(['action' => 'index']);
    }
}
