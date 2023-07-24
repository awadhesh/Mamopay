<?php 
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://staging.business.mamopay.com/pay/mamosandbox-baa04f",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    //'cc-number' => '4111111111111111111111',    
  ]),
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
die;
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://sandbox.business.mamopay.com/manage_api/v1/links",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'name' => 'Chocolate Box - Small',
    'amount' => 119.99,
    'enable_message' => false,
    'enable_tips' => false,
    'enable_customer_details' => false
  ]),
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
die;
// Data to be sent to the API
$data_to_send = array(
    'name' => 'Recharge Account',
    'description' => '',
	'capacity' =>1,
	'active' => true,
	'return_url' => 'https://clicksms.net/funds/paymentSuccess',
	'processing_fee_percentage' => 3,
	'amount' =>10,
	'amount_currency' =>'USD',
	'is_widget' => true,
	'email' => 'lovelyme.awadhesh@gmail.com',
	'first_name' => 'Meera',
	'last_name'=>'Yadav',
	'cc-number'=>'4111111111111111111111',
	'enable_tabby'=>false,
	'enable_message'=>false,
	'enable_tips'=>false,
	'enable_customer_details'=>false,
	'enable_quantity'=>false,
	'enable_qr_code'=>false,
	'send_customer_receipt'=>false,
);
$json_data = json_encode($data_to_send);
// Initialize cURL session
$ch = curl_init();

// Set the API endpoint URL
$api_url = 'https://sandbox.business.mamopay.com/manage_api/v1/links'; // Replace with the actual API URL

// Set cURL options for POST request
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'accept' => 'application/json',
    'Authorization: Bearer sk-1d70d209-d853-401d-b394-a8623b99ee1f',
	'content-type' => 'application/json',
	'Content-Length: ' . strlen($json_data) // Specify content length
));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

// Execute the cURL session and store the response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Process the response (it might be in JSON format)
$result = json_decode($response, true);
print_r($result);
// Now you can work with the $result array
?>
