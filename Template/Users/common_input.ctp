<?php
/*
 * ユーザ情報 入力（登録・更新）画面 view 共通
 */
?>
<div class="nonboder_table01">
    <table style="width: 860px; font-size: 14px;">
        <tr>
            <th style="width: 180px; text-align: right;">サービス名: </th>
            <td style="width: 250px;">
            <?php
            echo $form->text('service_name', array('size' => '30', 'maxlength' => '32', 'id' => 'service_name' ));
            echo $form->error('service_name', null, array('class' => 'error-message-box'));
            ?>
            </td>
            <th style="width: 180px; text-align: right;">サービス名(略称): </th>
            <td style="width: 250px;">
            <?php
            echo $form->text('service_short_name', array('size' => '10', 'maxlength' => '8', 'id' => 'service_name' ));
            echo $form->error('service_short_name', null, array('class' => 'error-message-box'));
            ?>
            </td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">契約番号Prefix: </th>
            <td style="width: 250px;">
            <?php
            echo $form->select('kei_no_prefix', ($this->data['OtService']['flow_f'] == '2' ? $otCorpKeiNoPrefix : $otKeiNoPrefix), $this->data['OtService']['kei_no_prefix'], array(), false);
            echo $form->error('kei_no_prefix', null, array('class' => 'error-message-box'));
            ?>
            </td>
            <th style="width: 180px; text-align: right;">採番パターン: </th>
            <td style="width: 250px;">
            <?php
            echo $form->select('numbering_pattern', $numberingPattern, $this->data['OtService']['numbering_pattern'], array(), false);
            echo $form->error('numbering_pattern', null, array('class' => 'error-message-box'));
            ?>
            </td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">フロー選択: </th>
            <td style="width: 250px;">
            <?php
            echo $form->select('flow_f', $flow, $this->data['OtService']['flow_f'], array(), false);
            echo $form->error('flow_f', null, array('class' => 'error-message-box'));
            ?>
            </td>
            <th style="width: 180px; text-align: right;">ISPサービスID: </th>
            <td style="width: 250px;">
            <?php
            echo $form->select('isp_service_id', $ispServiceId, $this->data['OtService']['isp_service_id'], array(), false);
            echo $form->error('isp_service_id', null, array('class' => 'error-message-box'));
            ?>
            </td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">有効／無効: </th>
            <td style="width: 250px;">
            <?php
            echo $form->select('enable_f', $yukouMukou, $this->data['OtService']['enable_f'], array(), false);
            ?>
            </td>
            <th style="width: 180px; text-align: right;">KDDI請求サービス連携: </th>
            <td style="width: 250px;">
                <?php
                echo $form->checkbox('kddi_request_service_sync_f', array('value' => '1'));
                echo $form->error('kddi_request_service_sync_f', null, array('class' => 'error-message-box'));
                ?>
            </td>
        </tr>
    </table>
</div>
<div>
<h3>個別品目</h3>
</div>
<div class="nonboder_table01">
    <table style="width: 860px; font-size: 14px;">
        <tr>
            <th style="width: 180px; text-align: right;">接続(PPPoE):</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('connect_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['connect_f']) ? 0 : $this->data['OtService']['connect_f']));
            echo '　';
            echo $form->radio('connect_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['connect_f']) ? 0 : $this->data['OtService']['connect_f']));
            echo '　';
            echo $form->radio('connect_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['connect_f']) ? 9 : $this->data['OtService']['connect_f']));
            echo $form->error('connect_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px; text-align: right;">メール: </th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('mail_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['mail_f']) ? 0 : $this->data['OtService']['mail_f']));
            echo '　';
            echo $form->radio('mail_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['mail_f']) ? 0 : $this->data['OtService']['mail_f']));
            echo '　';
            echo $form->radio('mail_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['mail_f']) ? 9 : $this->data['OtService']['mail_f']));
            echo $form->error('mail_f', null, array('class' => 'error-message-box'));
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">Web: </th>
            <td style="width: 250px;">
            <?php
            //echo $form->radio('web_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['web_f']) ? 0 : $this->data['OtService']['web_f']));
            echo '　　　　　　';
            echo $form->radio('web_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['web_f']) ? 0 : $this->data['OtService']['web_f']));
            echo '　';
            echo $form->radio('web_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['web_f']) ? 9 : $this->data['OtService']['web_f']));
            echo $form->error('web_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px;"></th>
            <td style="width: 250px;">
            </td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">ホスティング:</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('hosting_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['hosting_f']) ? 0 : $this->data['OtService']['hosting_f']));
            echo '　';
            echo $form->radio('hosting_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['hosting_f']) ? 0 : $this->data['OtService']['hosting_f']));
            echo '　';
            echo $form->radio('hosting_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['hosting_f']) ? 9 : $this->data['OtService']['hosting_f']));
            echo $form->error('hosting_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px; text-align: right;">ドメイン: </th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('domain_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['domain_f']) ? 0 : $this->data['OtService']['domain_f']));
            echo '　';
            echo $form->radio('domain_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['domain_f']) ? 0 : $this->data['OtService']['domain_f']));
            echo '　';
            echo $form->radio('domain_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['domain_f']) ? 9 : $this->data['OtService']['domain_f']));
            echo $form->error('domain_f', null, array('class' => 'error-message-box'));
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">複数固定IPv4割当:</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('static_ip_v4_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['static_ip_v4_f']) ? 0 : $this->data['OtService']['static_ip_v4_f']));
            echo '　';
            echo $form->radio('static_ip_v4_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['static_ip_v4_f']) ? 0 : $this->data['OtService']['static_ip_v4_f']));
            echo '　';
            echo $form->radio('static_ip_v4_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['static_ip_v4_f']) ? 9 : $this->data['OtService']['static_ip_v4_f']));
            echo $form->error('static_ip_v4_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px; text-align: right;">複数固定IPv6割当:</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('static_ip_v6_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['static_ip_v6_f']) ? 0 : $this->data['OtService']['static_ip_v6_f']));
            echo '　';
            echo $form->radio('static_ip_v6_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['static_ip_v6_f']) ? 0 : $this->data['OtService']['static_ip_v6_f']));
            echo '　';
            echo $form->radio('static_ip_v6_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['static_ip_v6_f']) ? 9 : $this->data['OtService']['static_ip_v6_f']));
            echo $form->error('static_ip_v6_f', null, array('class' => 'error-message-box'));
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">収容機器(PEルーター):</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('housing_router_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['housing_router_f']) ? 0 : $this->data['OtService']['housing_router_f']));
            echo '　';
            echo $form->radio('housing_router_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['housing_router_f']) ? 0 : $this->data['OtService']['housing_router_f']));
            echo '　';
            echo $form->radio('housing_router_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['housing_router_f']) ? 9 : $this->data['OtService']['housing_router_f']));
            echo $form->error('housing_router_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px; text-align: right;">収容機器(VPN親機):</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('housing_vpn_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['housing_vpn_f']) ? 0 : $this->data['OtService']['housing_vpn_f']));
            echo '　';
            echo $form->radio('housing_vpn_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['housing_vpn_f']) ? 0 : $this->data['OtService']['housing_vpn_f']));
            echo '　';
            echo $form->radio('housing_vpn_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['housing_vpn_f']) ? 9 : $this->data['OtService']['housing_vpn_f']));
            echo $form->error('housing_vpn_f', null, array('class' => 'error-message-box'));
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">設置機器(CEルーター):</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('office_router_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['office_router_f']) ? 0 : $this->data['OtService']['office_router_f']));
            echo '　';
            echo $form->radio('office_router_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['office_router_f']) ? 0 : $this->data['OtService']['office_router_f']));
            echo '　';
            echo $form->radio('office_router_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['office_router_f']) ? 9 : $this->data['OtService']['office_router_f']));
            echo $form->error('office_router_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px; text-align: right;">設置機器(VPN子機):</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('office_vpn_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['office_vpn_f']) ? 0 : $this->data['OtService']['office_vpn_f']));
            echo '　';
            echo $form->radio('office_vpn_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['office_vpn_f']) ? 0 : $this->data['OtService']['office_vpn_f']));
            echo '　';
            echo $form->radio('office_vpn_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['office_vpn_f']) ? 9 : $this->data['OtService']['office_vpn_f']));
            echo $form->error('office_vpn_f', null, array('class' => 'error-message-box'));
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">ONU:</th>
            <td style="width: 250px;">
            <?php
            echo $form->radio('onu_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['onu_f']) ? 0 : $this->data['OtService']['onu_f']));
            echo '　';
            echo $form->radio('onu_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['onu_f']) ? 0 : $this->data['OtService']['onu_f']));
            echo '　';
            echo $form->radio('onu_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['onu_f']) ? 9 : $this->data['OtService']['onu_f']));
            echo $form->error('onu_f', null, array('class' => 'error-message-box'));
            ?></td>
            <th style="width: 180px; text-align: right;"></th>
            <td style="width: 250px;">
            </td>
        </tr>
        <!--
        <tr>
            <th style="width: 180px; text-align: right;">ONU(POASON連携):</th>
            <td style="width: 250px;">
            <?php
            /*
            echo $form->radio('onu_poason_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['onu_poason_f']) ? 0 : $this->data['OtService']['onu_poason_f']));
            echo '　';
            echo $form->radio('onu_poason_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['onu_poason_f']) ? 0 : $this->data['OtService']['onu_poason_f']));
            echo '　';
            echo $form->radio('onu_poason_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['onu_poason_f']) ? 9 : $this->data['OtService']['onu_poason_f']));
            echo $form->error('onu_poason_f', null, array('class' => 'error-message-box'));
            */
            ?></td>
            <th style="width: 180px; text-align: right;">ONU(情報管理のみ):</th>
            <td style="width: 250px;">
            <?php
            /*
            echo $form->radio('onu_normal_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['onu_normal_f']) ? 0 : $this->data['OtService']['onu_normal_f']));
            echo '　';
            echo $form->radio('onu_normal_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['onu_normal_f']) ? 0 : $this->data['OtService']['onu_normal_f']));
            echo '　';
            echo $form->radio('onu_normal_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['onu_normal_f']) ? 9 : $this->data['OtService']['onu_normal_f']));
            echo $form->error('onu_normal_f', null, array('class' => 'error-message-box'));
            */
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">監視:</th>
            <td style="width: 250px;">
            <?php
            /*
            echo $form->radio('monitoring_f', array('1' => ' 必須'), array('value' => empty($this->data['OtService']['monitoring_f']) ? 0 : $this->data['OtService']['monitoring_f']));
            echo '　';
            echo $form->radio('monitoring_f', array('5' => ' 利用可'), array('value' => empty($this->data['OtService']['monitoring_f']) ? 0 : $this->data['OtService']['monitoring_f']));
            echo '　';
            echo $form->radio('monitoring_f', array('9' => ' 利用不可'), array('value' => empty($this->data['OtService']['monitoring_f']) ? 9 : $this->data['OtService']['monitoring_f']));
            echo $form->error('monitoring_f', null, array('class' => 'error-message-box'));
            */
            ?></td>
            <th style="width: 180px;"></th>
            <td style="width: 250px;">
            </td>
        </tr>
        -->
        <tr>
            <th style="width: 180px; text-align: right;">POASON連携: </th>
            <td style="width: 250px;" id="poason_f_text">
            <?php
            //echo $form->select('poason_f', $ot_poason, $this->data['OtService']['poason_f'], array(), false);
            // todo: 新規作成時、flow_f='1:顧客フロー' => 2:無 表示後は、flow_f の 値で切替(javascript:selectflow_f())
            echo h($poason[empty($this->data['OtService']['poason_f']) ? 2 : $this->data['OtService']['poason_f']]);
            ?>
            </td>
            <th style="width: 180px; text-align: right;">CIMS連携: </th>
            <td style="width: 250px;" id="cims_f_text">
            <?php
            //echo $form->select('cims_f', $ot_cims, $this->data['OtService']['cims_f'], array(), false);
            // todo: 新規作成時、flow_f='1:顧客フロー' => 2:無 表示後は、flow_f の 値で切替(javascript:selectflow_f())
            echo h($cims[empty($this->data['OtService']['cims_f']) ? 2 : $this->data['OtService']['cims_f']]);
            ?>
            </td>
        </tr>
    </table>
</div>
<div>
<h3>法人サービス</h3>
</div>
<div class="nonboder_table01">
    <table style="width: 860px; font-size: 14px;">
        <tr>
            <th style="width: 180px; text-align: right;">網事業者コード:</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('net_biz_cd', $netBizCd, (isset($this->data['OtService']['net_biz_cd']) ? $this->data['OtService']['net_biz_cd'] : '00'), array(), false);
            ?></td>
            <th style="width: 180px; text-align: right;">網ID:</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('net_id', $netId, (isset($this->data['OtService']['net_id']) ? $this->data['OtService']['net_id'] : '01'), array(), false);
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">回線タイプ:</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('line_type', $lineType, (isset($this->data['OtService']['line_type']) ? $this->data['OtService']['line_type'] : 'S01'), array(), false);
            ?></td>
            <th style="width: 180px; text-align: right;">サービス内容パターン:</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('service_content_pattern', $serviceContentPattern, (isset($this->data['OtService']['service_content_pattern']) ? $this->data['OtService']['service_content_pattern'] : '1'), array(), false);
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">回線速度(初期値):</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('default_line_speed', $lineSpeed, (isset($this->data['OtService']['default_line_speed']) ? $this->data['OtService']['default_line_speed'] : '2'), array(), false);
            ?></td>
            <th style="width: 180px; text-align: right;">設置先電柱:</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('setup_pole_f', $uMu, (isset($this->data['OtService']['setup_pole_f']) ? $this->data['OtService']['setup_pole_f'] : '1'), array(), false);
            ?></td>
        </tr>
        <tr>
            <th style="width: 180px; text-align: right;">ユーザー認証:</th>
            <td style="width: 250px;">
            <?php
            echo $form->select('user_auth_type', $userAuthType, (isset($this->data['OtService']['user_auth_type']) ? $this->data['OtService']['user_auth_type'] : 2), array(), false);
            ?></td>
            <th style="width: 180px; text-align: right;"></th>
            <td style="width: 250px;">
            </td>
        </tr>
    </table>
</div>
<div class="nonboder_table01">
    <table style="width: 860px; font-size: 14px;">
        <tr>
            <th style="width: 180px; text-align: right;">備考: </th>
            <td colspan="3">
            <?php
            echo $form->textarea('biko', array('cols' => '80', 'rows' => '3'));
            ?>
            </td>
        </tr>
    </table>
</div>
<br />
<?php if (!empty($this->data['OtService']['id'])) : ?>
<!-- 接続申込 -->
<div id="ot_service_applications_info_title" class="titleContents01-2" style="display: none;">
    <a href="javascript:;" class="titleBar01-2" onclick="javascript: document.getElementById('ot_service_applications_info').style.display='block';document.getElementById('ot_service_applications_info_title').style.display='none'; return false;"> 接続申込</a>
</div>
<div id="ot_service_applications_info" class="titleContents01-2" style="display: block; height: 190px;">
    <a href="javascript:;" class="titleBar01-2" onclick="javascript: document.getElementById('ot_service_applications_info_title').style.display='block';document.getElementById('ot_service_applications_info').style.display='none'; return false;"> 接続申込</a>
<?php
// 登録済データの場合、顧客サービス接続申込が可能
$service_id = $this->data['OtService']['id'];
$ot_service_application_path = $html->url(array('controller' => CONTROLLER_OT_SERVICE_APPLICATIONS, 'action' => 'add', $service_id));
$onclick = " onclick=\"javascript: window.open('{$ot_service_application_path}', '', 'width=860,height=280,top=200,left=400'); return false;\" ";
?>
<div class="syousai_table01">
    <a href="#" <?php echo $onclick ?> >[+]追加</a>
    <div class="boxJyouhouContents" style="height: 9.5em">
    <table style="width: 830px; font-size: 12px;">
        <tr class="search_kekka01">
            <th style="width: 30px;">No</th>
            <th style="width: 220px;">接続申込名</th>
            <th>備考</th>
            <th style="width: 100px;">有効／無効</th>
        </tr>
        <tbody>
    <?php
    // 顧客サービス接続申込情報
    $i = 1;
    foreach ($ot_service_applications as $value) {

        echo '<tr class="search_kekka01">';
        // No
        $ot_service_application_path = $html->url(array('controller' => CONTROLLER_OT_SERVICE_APPLICATIONS, 'action' => 'edit', $value['OtServiceApplication']['id']));
        $onclick = " onclick=\"javascript: window.open('{$ot_service_application_path}', '', 'width=860,height=280,top=200,left=400'); return false;\" ";
        echo '<td><a href="#"' .$onclick . ' class="block_link">' .h($i).'</a></td>';
        // 接続申込名
        echo '<td>' . h($value['OtServiceApplication']['application_name']) . '</td>';
        // 備考
        echo '<td>' . h($value['OtServiceApplication']['biko']) . '</td>';
        // 有効／無効
        $enable_f = '';
        if (array_key_exists($value['OtServiceApplication']['enable_f'], $yukouMukou)) {
            $enable_f = $yukouMukou[$value['OtServiceApplication']['enable_f']];
        }
        echo '<td>' . h($enable_f) . '</td>';
        echo '</tr>';

        $i++;
    }
    ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<!-- 接続申込ここまで -->
<?php endif; ?>
<br />
<?php if (!empty($this->data['OtService']['id']) && !empty($ot_service_applications)) : ?>
<!-- 接続 -->
<div id="ot_service_connects_info_title" class="titleContents01-2" style="display: none;">
    <a href="javascript:;" class="titleBar01-2" onclick="javascript: document.getElementById('ot_service_connects_info').style.display='block';document.getElementById('ot_service_connects_info_title').style.display='none'; return false;"> 接続</a>
</div>
<div id="ot_service_connects_info" class="titleContents01-2" style="display: block; height: 230px;">
    <a href="javascript:;" class="titleBar01-2" onclick="javascript: document.getElementById('ot_service_connects_info_title').style.display='block';document.getElementById('ot_service_connects_info').style.display='none'; return false;"> 接続</a>
<?php
// 登録済データの場合、顧客サービス接続が可能
// todo:パス設定は、helperの場合 Html をロードしているが、個別のctpで設定する方法があるか？
$service_id = $this->data['OtService']['id'];
$ot_service_connect_path = $html->url(array('controller' => CONTROLLER_OT_SERVICE_CONNECTS, 'action' => 'add', $service_id));
$onclick = " onclick=\"javascript: window.open('{$ot_service_connect_path}', '', 'width=860,height=280,top=200,left=400'); return false;\" ";
?>
<div class="syousai_table01">
    <a href="#" <?php echo $onclick ?> >[+]追加</a>
    <div class="boxJyouhouContents">
    <table style="width: 830px; font-size: 12px;">
        <tr class="search_kekka01">
            <th style="width: 30px;">No</th>
            <th style="width: 200px;">接続申込名</th>
            <th style="width: 60px;">接続種別</th>
            <th style="width: 180px;">接続識別子</th>
            <th>備考</th>
        </tr>
        <tbody>
    <?php
    // 顧客サービス接続情報
    $i = 1;
    foreach ($ot_service_connects as $value) {

        echo '<tr class="search_kekka01">';
        // No
        $ot_service_connect_path = $html->url(array('controller' => CONTROLLER_OT_SERVICE_CONNECTS, 'action' => 'edit', $value['OtServiceConnect']['id']));
        $onclick = " onclick=\"javascript: window.open('{$ot_service_connect_path}', '', 'width=860,height=280,top=200,left=400'); return false;\" ";
        echo '<td><a href="#"' .$onclick . ' class="block_link">' .h($i).'</a></td>';
        // 接続申込名
        echo '<td>' . h($value['OtServiceApplication']['application_name']) . '</td>';
        // 接続種別
        $connect_type = '';
        if (array_key_exists($value['OtServiceConnect']['connect_type'], $connectType)) {
            $connect_type = $connectType[$value['OtServiceConnect']['connect_type']];
        }
        echo '<td>'.h($connect_type).'</td>';
        // 接続識別子
        $connect_identifier = '';
        if (array_key_exists($value['OtServiceConnect']['ot_connect_identifier_id'], $otConnectIdentifier)) {
            $connect_identifier = $otConnectIdentifier[$value['OtServiceConnect']['ot_connect_identifier_id']];
        }
        echo '<td>' . h($connect_identifier) . '</td>';
        // 備考
        echo '<td>' . h($value['OtServiceConnect']['biko']) . '</td>';
        echo '</tr>';

        $i++;
    }
    ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<!-- 接続ここまで -->
<?php endif; ?>
<br />
<div class="syousai_table01" style="width: 800px;">
    <div style="text-align: center;">
    <?php echo $form->button('確認画面へ', array('type' => 'submit', 'name' => 'OtService.confirm')); ?>
    <?php echo $form->button('リセット', array('type' => 'reset', 'name' => 'OtService.reset')); ?>
    <?php echo $form->hidden('updated'); ?>
    </div>
</div>
