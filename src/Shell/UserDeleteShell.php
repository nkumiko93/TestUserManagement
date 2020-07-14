<?php
namespace App\Shell;

use Cake\Console\ConsoleOutput;
use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;

/**
 * ユーザ情報削除シェル
 * 退職日が入力されているレコードの削除フラグを1にする
 */
class UserDeleteShell extends Shell {

    public function initialize() {
        parent::initialize();
    }

    public function main(){
        $this->clear();
        $this->info("***** 退職済みユーザ削除処理 実行開始 *****\n");

        $this->out("退職日の指定がない場合は[Enter]を押してください。");
        $date = $this->in("退職日(YYYYMMDD)：");

        // パラメータチェック
        $this->out("[DEBUG]入力した退職日: " . $date);
        $this->out("[DEBUG]入力した文字数: " . strlen($date));
        $this->out("[DEBUG]日付データとして有効なら1: " . (strtotime($date) ? 1 : 0));

        $retireDateLength = strlen($date);
        $retireDateErrorFlag = 0;     // 退職日エラーフラグの初期化
        if ($retireDateLength == 0 or $retireDateLength == 8) {

        $this->users();
//            $this->users($n);

        } else {
            $this->err("[ERROR] 退職日の文字数が足りません。処理を中断します。");
        }
/*
        if (strtotime($date)) {

        } else {
            $this->err("退職日が日付データとして有効ではありません。処理を中断します。");
        }
*/
//        $this->out(date('Y-m-d', strtotime($date)));

/*
        switch($t){
            case 'U':
                $this->users($n);
                break;
            case 'P':
                $this->persons($n);
                break;
            default:
                $this->info("can't access Database...");
                exit();
        }
*/
        $this->info('***** 退職済みユーザ削除処理 実行終了 *****');
    }

    /*
     * ユーザ情報テーブル: 退職者の削除フラグを立てる
     */
    public function users(){
//    public function users($id){
        $this->loadModel('Users');      // モデルを読み込む
//        $this->out(print_r($data->toArray()));    // DEBUG用

        $retuireUsers = $this->Users->find('all')->where('retire_date IS NOT NULL');
        $this->out("[DEBUG] 取得レコード数: " . $retuireUsers->count());
        if ($retuireUsers->count() == 0) {
            $this->out("自動削除対象なし\n");
            return;
        }

        // 退職日が存在するレコードのdelete_fを1にする
        foreach ($retuireUsers as $retuireUser) {
//            $this->out("[DEBUG] id: " . $retuireUser['id']);
            $condition = ['id' => $retuireUser['id']];
            $updatefield = ['delete_f' => '1'];
            $this->Users->updateAll($updatefield, $condition);
            $this->out($retuireUser['user_code']. "：" . $retuireUser['user_name'] . "　自動削除");
        }
    }
}