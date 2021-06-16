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

        $students = $this->paginate($this->Students);

        $this->set(['response' => $students]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        if ($id == null || empty($this->Students->findById($id)->first())) {
            $this->set(['response' => ['error' => 'Student was not found.']]);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
            return;
        }

        $student = $this->Students->get($id, [
            'contain' => ['CourseRecords', 'StudentSchedule'],
        ]);

        $this->set(['response' => $student]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function add()
    {
        $this->request->allowMethod(['post']);

        $student = $this->Students->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $data);
            if ($this->Students->save($student)) {
                $this->set(['response' => $student]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
        $this->set(['response' => ['error' => 'Could not save new student.']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function edit($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);

        if ($id == null || empty($this->Students->findById($id)->first())) {
            $this->set(['response' => ['error' => 'Student was not found.']]);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
            return;
        }

        $student = $this->Students->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $data);
            if ($this->Students->save($student)) {
                $this->set(['response' => $student]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
        $this->set(['response' => ['error' => 'Could not update student.']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if ($id == null || empty($this->Students->findById($id)->first())) {
            $this->set(['response' => ['error' => 'Student was not found.']]);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
            return;
        }

        $student = $this->Students->get($id);

        if ($this->Students->delete($student)) {
            $this->set(['response' => ['message' => 'Student has been deleted.']]);
        } else {
            $this->set(['response' => ['error' => 'Could not delete student.']]);
        }
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
