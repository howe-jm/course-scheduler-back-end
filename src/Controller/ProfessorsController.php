<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Professors Controller
 *
 * @property \App\Model\Table\ProfessorsTable $Professors
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfessorsController extends AppController
{
    public function index()
    {
        $professors = $this->paginate($this->Professors);

        $this->set(['response' => $professors]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function view($id = null)
    {
        $professor = $this->Professors->get($id, [
            'contain' => ['Schedule'],
        ]);

        $this->set(['response' => $professor]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $professor = $this->Professors->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $professor = $this->Professors->patchEntity($professor, $data);
            if ($this->Professors->save($professor)) {
                $this->set(['response' => $professor]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
        $this->set(['response' => ['error' => 'Could not save new professor.']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function edit($id = null)
    {
        $professor = $this->Professors->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professors->patchEntity($professor, $data);
            if ($this->Professors->save($professor)) {
                $this->set(['response' => $professor]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->RequestHandler->renderAs($this, 'json');
                return;
            }
        }
        $this->set(['response' => ['error' => 'Could not update professor.']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professor = $this->Professors->get($id);


        if ($this->Professors->delete($professor)) {
            $this->set(['response' => ['message' => 'Professor has been deleted.']]);
        } else {
            $this->set(['response' => ['error' => 'Professor has not been deleted.']]);
        }
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
