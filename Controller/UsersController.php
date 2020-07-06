<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

/*
 * ユーザ情報管理
 * ユーザ情報の表示、登録、更新、削除を行う。
 */
class UsersController extends AppController
{

    /*
     *
     */
    public function initialize()
    {
        parent::initialize();
    }


    /*
     * ユーザ情報リスト表示
     */
    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }


    /*
     * ユーザ登録画面
     * usersテーブルにデータを新規登録する。
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        $this->set('user', $user);
        if ($this->request->is('post')) {
            $validator = new Validator();
            $validator->add(
                'age','comparison',['rule' =>['comparison','>',20]]
            );
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)){
                $this->Flash->error('comparison error');
            } else {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'index']);
                }
            }
        }
    }


    /*
     * ユーザ更新画面
     * usersテーブルのデータを更新する。
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->set('user', $user);
        }
    }


    /*
     * ユーザ情報削除
     * usersテーブルのデータを削除する。
     */
    public function delete($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->Users->delete($user)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->set('user', $user);
        }
    }


    /*
     * ログイン画面
     */
    public function login()
    {
//        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ユーザコードまたはパスワードが無効です。もう一度お試しください。'));
        }
    }


    /*
     * ログアウト
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
