<?php

declare(strict_types=1);
namespace App\Controller;

use App\Modules\Image\Cropper;
use App\Modules\Image\Saver;

/**
 * Images Controller.
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    /**
     * Index method.
     *
     * @return \Cake\Http\Response|void|null Renders view
     */
    public function index()
    {
        $images = $this->paginate($this->Images);
        $query = $this->request->getdata('search');

        if ($query) {
            $measurements = \explode('x', $this->request->getdata('search'));
            $matches = \preg_match('/^[0-9]+\s*x\s*[0-9]+$/', $query);

            if ($matches) {
                $images = $this->Images->find('all')
                    ->where(['Images.width =' => $measurements[0]])
                    ->andWhere(['Images.height =' => $measurements[1]]);
                $images = $this->paginate($images);
            } else {
                $this->Flash->error(__('Wrong search input. Use "number x number" format instead.'));
            }
        }

        $this->set(\compact('images'));
    }

    /**
     * Add method.
     *
     * @return \Cake\Http\Response|void|null redirects on successful add, renders view otherwise
     */
    public function add()
    {
        $image = $this->Images->newEmptyEntity();

        if ($this->request->is('post')) {
            $file = $this->request->getUploadedFiles()['name'];

            $cropper = new Cropper(
                $this->Images->patchEntity($image, \array_replace($this->request->getData(), ['name' => $file->getClientFileName()])),
                $this->request,
                \getimagesize($_FILES['name']['tmp_name']),
                [
                    'mediaType' => $file->getclientMediaType(),
                    'tmp_name' => $_FILES['name']['tmp_name']
                ]
            );
            $croppedImage = $cropper->crop();

            if (empty($cropper->getErrors())) {
                if ($this->Images->save($image)) {
                    $imageSaver = new Saver();
                    $imageSaver->save($croppedImage, $file->getclientMediaType(), $file->getClientFileName());
                    $this->Flash->success(__('The image has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            } else {
                foreach ($cropper->getErrors() as $error) {
                    $this->Flash->error(__($error));
                }
            }

            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $this->set(\compact('image'));
    }

    /**
     * Delete method.
     *
     * @param string|null $id image id
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
     *
     * @return \Cake\Http\Response|void|null redirects to index
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);

        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
