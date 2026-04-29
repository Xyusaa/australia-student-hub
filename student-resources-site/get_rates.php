<?php
// get_rates.php — 放在网站根目录
// 浏览器请求这个文件，PHP服务器去取汇率再返回给前端

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$currencies = 'CNY,KRW,JPY,USD,HKD,TWD,MYR,EUR,GBP,INR';
$url = "https://api.frankfurter.app/latest?from=AUD&to={$currencies}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response && $httpCode === 200) {
    echo $response;
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch rates']);
}
?>
