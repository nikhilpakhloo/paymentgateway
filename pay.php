<?php


$product_name = $_POST['product_name'];
$price = $_POST['product_price'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_e70e341e2efafed535990ee06fc', 'test_7da6387086d26a5b241842a5656','https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        'purpose' => $product_name,
        'amount' => $price,
        'buyer_name' => $name,
        'email' => $email,
        'phone' => $phone,
        'redirect_url' => 'http://localhost/project/thankyou.php',
        'send_email' => true,
        'send_sms' => true,
        'allow_repeated_payments' => false
    ));

    $pay_url = $response['longurl'];
    header("Location: $pay_url");
    exit();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
