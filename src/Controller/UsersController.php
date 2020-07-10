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
    public $paginate = [
        'limit' => 5,
        'order' => [
            'Users.id' => 'asc'
        ]
    ];

    /*
     * 初期設定
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }


    /*
     * ユーザ情報一覧画面
     */
    public function index()
    {
        $this->viewBuilder()->layout('users_default');      // レイアウトを設定

        $users = $this->paginate($this->Users);     // Usersテーブル全データ取得
        $this->set(compact('users'));
    }


    /*
     * ユーザ登録画面
     * Usersテーブルにユーザ情報を新規登録する。
     */
    public function add()
    {
        $this->viewBuilder()->layout('users_default');  // レイアウトを設定

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('user'));
    }


    /*
     * ユーザ更新画面
     * Usersテーブルのユーザ情報を更新する。
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('users_default');  // レイアウトを設定

        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('user'));
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
        $this->viewBuilder()->layout('users_default');  // レイアウトを設定

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
