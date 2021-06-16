<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CourseRecords Controller
 *
 * @property \App\Model\Table\CourseRecordsTable $CourseRecords
 * @method \App\Model\Entity\CourseRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CourseRecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Courses'],
        ];
        $courseRecords = $this->paginate($this->CourseRecords);

        $this->set(compact('courseRecords'));
    }

    /**
     * View method
     *
     * @param string|null $id Course Record id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseRecord = $this->CourseRecords->get($id, [
            'contain' => ['Students', 'Courses'],
        ]);

        $this->set(compact('courseRecord'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courseRecord = $this->CourseRecords->newEmptyEntity();
        if ($this->request->is('post')) {
            $courseRecord = $this->CourseRecords->patchEntity($courseRecord, $this->request->getData());
            if ($this->CourseRecords->save($courseRecord)) {
                $this->Flash->success(__('The course record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course record could not be saved. Please, try again.'));
        }
        $students = $this->CourseRecords->Students->find('list', ['limit' => 200]);
        $courses = $this->CourseRecords->Courses->find('list', ['limit' => 200]);
        $this->set(compact('courseRecord', 'students', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course Record id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courseRecord = $this->CourseRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseRecord = $this->CourseRecords->patchEntity($courseRecord, $this->request->getData());
            if ($this->CourseRecords->save($courseRecord)) {
                $this->Flash->success(__('The course record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course record could not be saved. Please, try again.'));
        }
        $students = $this->CourseRecords->Students->find('list', ['limit' => 200]);
        $courses = $this->CourseRecords->Courses->find('list', ['limit' => 200]);
        $this->set(compact('courseRecord', 'students', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course Record id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courseRecord = $this->CourseRecords->get($id);
        if ($this->CourseRecords->delete($courseRecord)) {
            $this->Flash->success(__('The course record has been deleted.'));
        } else {
            $this->Flash->error(__('The course record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
