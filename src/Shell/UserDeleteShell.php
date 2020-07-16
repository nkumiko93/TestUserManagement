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

        $retireDateLength = strlen($date);      // 退職日の文字数
        $retireDateErrorFlag = 0;           // 退職日エラーフラグの初期化
        $uruuDoshi = (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) ? true : false;    // 閏年ならtrue
        $shonoTsuki = ($month == 4 or $month == 6 or $month == 9 or $month == 11) ? true : false;   // 小の月
//        $this->out("[DEBUG]閏年: " . $uruuDoshi);
//        $this->out("[DEBUG]小の月: " . $shonoTsuki);

        $errorFlag = false;         // エラーフラグ初期化
        if ($retireDateLength != 0 && $retireDateLength != 8) {
            $this->err("[ERROR] 退職日の文字数が足りません。処理を中断します。");
            $errorFlag = true;
        }

        // エラーフラグが立っていない かつ 日付データが無効
        if (!$errorFlag && $retireDateLength != 0 && !strtotime($date)) {
            $this->err("[ERROR] 退職日" . $date . "は、日付データとして無効です。処理を中断します。");
            $errorFlag = true;
        }

        if (!$errorFlag && $retireDateLength != 0 && $month == 2) {     // 2月
            if ($uruuDoshi && $day > 29) {              // 閏年 かつ 日が29以上
                $this->err("[ERROR] 退職日" . $date . "は、日付データとして無効です。処理を中断します。");
//                $this->out("[DEBUG]" . $year . "年は、うるう年です。");
                $errorFlag = true;
            } elseif (!$uruuDoshi && $day > 28) {       // 閏年以外 かつ 日が28以上
                $this->err("[ERROR] 退職日" . $date . "は、日付データとして無効です。処理を中断します。");
//                $this->out("[DEBUG]" . $year . "年は、うるう年ではありません。");
                $errorFlag = true;
            }
        } elseif (!$errorFlag && $retireDateLength != 0 && $shonoTsuki && $day > 30) {  // 小の月 かつ 日が31以上
            $this->err("[ERROR] 退職日" . $date . "は、日付データとして無効です。処理を中断します。");
            $errorFlag = true;
        }

        if (!$errorFlag) {
            $this->users($year, $month, $day);
        }

        $this->info('***** 退職済みユーザ削除処理 実行終了 *****');
    }


    /*
     * ユーザ情報テーブル: 退職者の削除フラグを立てる
     */
    public function users($year, $month, $day){
        $this->loadModel('Users');      // モデルを読み込む
//        $this->out(print_r($data->toArray()));    // DEBUG用

        // where句生成
        $where = 'retire_date IS NOT NULL';
        $date = $year . "-" . $month . "-" . $day;
        if (!empty($year) && !empty($month) && !empty($day)) {
            $this->info('[INFO] 退職日: ' .$date. 'の削除フラグを1にします。');
            $where = ['retire_date = ' => $date];
//            $this->out("[DEBUG] where: " . $where['retire_date = ']);
        } else {
//            $this->out("[DEBUG] where: ". $where);
        }

        $retuireUsers = $this->Users->find('all')->where($where);
//        $this->out("[DEBUG] 取得レコード数: " . $retuireUsers->count());
        if ($retuireUsers->count() == 0) {      //  該当レコードなし
            $this->out("自動削除対象なし\n");
            return;
        }

        $this->hr();
        // 退職日が存在するレコードのdelete_fを1にする
        foreach ($retuireUsers as $retuireUser) {
//            $this->out("[DEBUG] id: " . $retuireUser['id']);
            $condition = ['id' => $retuireUser['id']];
            $updatefield = ['delete_f' => '1'];
            $this->Users->updateAll($updatefield, $condition);
            $this->out($retuireUser['user_code']. "：" . $retuireUser['user_name'] . "　自動削除");
        }
        $this->hr();
    }
}