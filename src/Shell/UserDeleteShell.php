<?php
namespace App\Shell;

use Cake\Console\ConsoleOutput;
use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

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

/*
        $this->out("退職日の指定がない場合は[Enter]を押してください。");
        $date = $this->in("退職日(YYYYMMDD)：");
*/
        if (empty($this->args[0])) {         // 日付指定なし
            $date = date('Ymd');    // システム値
        } else {
            $date = $this->args[0];     // 引数の値
        }

        $year = substr($date, 0, 4);            // 退職年
        $month = substr($date, 4, 2);           // 退職月
        $day = substr($date, 6, 2);             // 退職日

        // パラメータチェック
//        $this->out("[DEBUG]入力した退職日: " . $date);
//        $this->out("[DEBUG]入力した文字数: " . strlen($date));
//        $this->out("[DEBUG]日付データとして有効なら1: " . (strtotime($date) ? 1 : 0));
//        $this->out("[DEBUG]退職年: year: " . $year);
//        $this->out("[DEBUG]退職月: month: " . $month);
//        $this->out("[DEBUG]退職日: day: " . $day);

        $retireDateErrorFlag = 0;           // 退職日エラーフラグの初期化
        $retireDateLength = strlen($date);      // 退職日の文字数
        $uruuDoshi = (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) ? true : false;    // 閏年ならtrue
        $shonoTsuki = ($month == 4 or $month == 6 or $month == 9 or $month == 11) ? true : false;   // 小の月
//        $this->out("[DEBUG]閏年: " . $uruuDoshi);
//        $this->out("[DEBUG]小の月: " . $shonoTsuki);

        $errorFlag = false;         // エラーフラグ初期化
        if ($retireDateLength != 8) {
            $this->err("[ERROR] 退職日の文字数が足りません。処理を中断します。");
            $errorFlag = true;
        }

        // エラーフラグが立っていない かつ 日付データが無効
        if (!$errorFlag && !strtotime($date)) {
            $this->err("[ERROR] 退職日" . $date . "は、日付データとして無効です。処理を中断します。");
            $errorFlag = true;
        }

        if (!$errorFlag && $month == 2) {     // 2月
            if ($uruuDoshi && $day > 29) {              // 閏年 かつ 日が29より大
                $this->err("[ERROR] 退職日" . $date . "は、29日までのため、日付データとして無効です。処理を中断します。");
//                $this->out("[DEBUG]" . $year . "年は、うるう年です。");
                $errorFlag = true;
            } elseif (!$uruuDoshi && $day > 28) {       // 閏年以外 かつ 日が28より大
                $this->err("[ERROR] 退職日" . $date . "は、28日までのため、日付データとして無効です。処理を中断します。");
//                $this->out("[DEBUG]" . $year . "年は、うるう年ではありません。");
                $errorFlag = true;
            }
        } elseif (!$errorFlag && $shonoTsuki && $day > 30) {  // 小の月 かつ 日が30より大
            $this->err("[ERROR] 退職日" . $date . "は、30日までのため、日付データとして無効です。処理を中断します。");
            $errorFlag = true;
        }

        if (!$errorFlag) {
            $date2 = $year . "-" . $month . "-" . $day;
            $this->users($date2);
        }

        $this->info('***** 退職済みユーザ削除処理 実行終了 *****');
    }


    /*
     * ユーザ情報テーブル: 退職者の削除フラグを立てる
     */
    public function users($date){
        $this->loadModel('Users');      // モデルを読み込む

        // where句作成
        $where = ['retire_date = ' => $date];
//        $this->out("[DEBUG] where: " . $where['retire_date = ']);

        $retireUsers = $this->Users->find('all')->where($where);
//        $this->out("[DEBUG] 取得レコード数: " . $retireUsers->count());
        if ($retireUsers->count() == 0) {      //  該当レコードなし
            $this->out("自動削除対象なし\n");
            return;
        }

        $this->info('[INFO] 退職日: ' .$date. 'の削除フラグを1にします。');
        $this->hr();
        // 退職日が存在するレコードのdelete_fを1にする
        foreach ($retireUsers as $retireUser) {
//            $this->out("[DEBUG] id: " . $retireUser['id']);
            $users = TableRegistry::getTableLocator()->get('Users');
            $query = $users->query();
            $query->update()
                ->set(['delete_f' => 1])
                ->where(['id' => $retireUser['id']])
                ->execute();
            $this->out($retireUser['user_code']. "：" . $retireUser['user_name'] . "　自動削除");
        }
        $this->hr();
    }
}