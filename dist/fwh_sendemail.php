<?php

// タイムゾーンを初期化
date_default_timezone_set('Asia/Tokyo');

//サンクスページの設定
$thanksPage = "./thanks.html";

// 自動返信メールの設定


// 送信者情報の設定
// 送信者とメールアドレス
$auto_reply_from = "水谷 <mizutani@fwh.co.jp>";//ここ
// 送信者の所属
$auto_reply_from_name = "株式会社FREEWEBHOPE";//ここ
// 返信先
$auto_reply_from_mail = "mizutani@fwh.co.jp";//ここ

$auto_reply_header = '';
$auto_reply_header .= "Content-Type: text/plain \r\n";
$auto_reply_header .= "Return-Path: " .  "-f".$auto_reply_from_mail . " \r\n";
$auto_reply_header .= "From: " . $auto_reply_from ." \r\n";
$auto_reply_header .= "Sender: " . $auto_reply_from ." \r\n";
$auto_reply_header .= "Reply-To: " . $from_mail . " \r\n";
$auto_reply_header .= "Organization: " . $auto_reply_from_name . " \r\n";
$auto_reply_header .= "X-Sender: " . $auto_reply_from_mail . " \r\n";
$auto_reply_header .= "X-Priority: 3 \r\n";

// 件名を設定
$auto_reply_subject = 'お問い合わせありがとうございます。';//ここ

// 本文を設定
$auto_reply_message .= "※このメールはシステムからの自動返信です\n";
$auto_reply_message .= $_POST['名前']."様\n\n";

$auto_reply_message  = <<<EOM

※このメールはシステムからの自動返信です

お世話になっております。株式会社FREEWEBHOPEでございます。お問い合わせいただきありがとうございました。
以下の内容でお問い合わせをお受けいたしました。
お問い合わせ内容は以下になります。

EOM;

$auto_reply_message .= "━━━━━━□■□　お問い合わせ内容　□■□━━━━━━\n\n";

// お問い合わせ内容を変数へ格納
foreach ($_POST as $key => $value) {
  $auto_reply_message .= "【".$key."】" . "\n" . $value . "\n\n";
}

$auto_reply_message .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━";

//【だいたい必須】 相手に届く自動返信メールの最後に付加される署名 -- EOMからEOM;までの間の文章を自由に変更してください。 --
$auto_reply_message .= <<<EOM

この度はお問い合わせを頂き、重ねてお礼申し上げます。
-----------------------------------------------------------------------------------

　　株式会社FREEWEBHOPE
　　〒***-**** ここに住所など
　　TEL : ***-***-****
　　Web Site URL : https://www.1-firststep.com
　　Blog URL : https://www.firstsync.net

-----------------------------------------------------------------------------------

EOM;

// メール送信
mb_send_mail($_POST['メールアドレス'], $auto_reply_subject, $auto_reply_message, $auto_reply_header);

// 通知メールの設定

//LPのタイトルを設定
$lp_title = "集客用LP";


// 送信者情報の設定
// 送信者とメールアドレス
$admin_reply_from = $lp_title."通知メール <mizutani@fwh.co.jp>";//ここ
// 送信者の所属
$admin_reply_from_name = $lp_title."通知メール";//ここ
// 返信先
$admin_reply_from_mail = "mizutani@fwh.co.jp";//ここ


$admin_reply_header = '';
$admin_reply_header .= "Content-Type: text/plain \r\n";
$admin_reply_header .= "Return-Path: " . $admin_reply_from_mail . " \r\n";
$admin_reply_header .= "From: " . $admin_reply_from ." \r\n";
$admin_reply_header .= "Sender: " . $admin_reply_from ." \r\n";
$admin_reply_header .= "Reply-To: " . $admin_reply_from_mail . " \r\n";
$admin_reply_header .= "Organization: " . $admin_reply_from_name . " \r\n";
$admin_reply_header .= "X-Sender: " . $admin_reply_from_mail . " \r\n";
$admin_reply_header .= "X-Priority: 3 \r\n";


// メールのタイトル
$admin_reply_subject = "「".$lp_title."」"."からメールが届きました\n\n";


// 通知メールの本文
$admin_reply_message .= "「".$lp_title."」"."からメールが届きました\n\n";
$admin_reply_message  .= "━━━━━━□■□　お問い合わせ内容　□■□━━━━━━\n\n";

// お問い合わせ内容を変数へ格納
foreach ($_POST as $key => $value) {
    $admin_reply_message .= "【".$key ."】"."\n" . $value . "\n";
}

$admin_reply_message  .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

$admin_reply_message .= "\n====================================================\n";
$admin_reply_message .= "【送信者のIPアドレス】".$_SERVER["REMOTE_ADDR"]."\n" ;
$admin_reply_message .= "【送信者のブラウザ】".$_SERVER['HTTP_USER_AGENT'];
$admin_reply_message .= "\n====================================================\n";

// メール送信
mb_send_mail($admin_reply_from, $admin_reply_subject, $admin_reply_message, $admin_reply_header);


header("Location: ".$thanksPage);

?>