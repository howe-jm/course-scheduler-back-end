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
        $this->request->allowMethod(['get']);

        $this->paginate = [
            'contain' => [
                'Schedule' => [
                    'Courses',
                    'StudentSchedule' => [
                        'Students',
                    ],
                ],
            ],
        ];

        $professors = $this->paginate($this->Professors);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($professors, 1));
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        if (is_null($id) || !$this->Professors->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Professor does not exist.',
                    ],
                    1
                ));
        }

        $professor = $this->Professors->get($id, [
            'contain' => [
                'Schedule' => [
                    'Courses',
                    'StudentSchedule' => [
                        'Students',
                    ],
                ],
            ],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($professor, 1));
    }

    public function add()
    {
        $this->request->allowMethod(['post']);

        $professor = $this->Professors->newEmptyEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $professor = $this->Professors->patchEntity($professor, $data);
            if ($this->Professors->save($professor)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201)
                    ->withStringBody(json_encode($professor, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not create new professor.'
                ],
                1
            ));
    }

    public function edit($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);

        if (is_null($id) || !$this->Professors->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Professor does not exist.'
                    ],
                    1
                ));
        }

        $professor = $this->Professors->get($id);
        $data = $this->request->getData();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professors->patchEntity($professor, $data);
            if ($this->Professors->save($professor)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200)
                    ->withStringBody(json_encode($professor, 1));
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(400)
            ->withStringBody(json_encode(
                [
                    'error' => 'Could not update professor.'
                ],
                1
            ));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if (is_null($id) || !$this->Professors->exists(['id' => $id])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(
                    [
                        'error' => 'Professor does not exist.'
                    ],
                    1
                ));
        }

        $professor = $this->Professors->get($id);

        if ($this->Professors->delete($professor)) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(
                    [
                        'message' => "Professor {$id} was successfully deleted."
                    ],
                    1
                ));
        }
    }
}
