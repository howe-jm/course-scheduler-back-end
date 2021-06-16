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
        $students = $this->paginate($this->Students);

        $this->set(['response' => $students]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function view($id = null)
    {
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

        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->set(['response' => $student]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
    }

    public function edit($id = null)
    {
        $student = $this->Students->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->set(['response' => $student]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
        $this->set(['response' => ['error' => 'Did not save']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->set(['response' => 'Student deleted.']);
        } else {
            $this->set(['error' => 'The student could not be deleted. Please, try again.']);
        }
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
