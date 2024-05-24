<?php
// Database connection variables
// $db_host = 'localhost';
// $db_user = 'root';
// $db_pass = '';
// $db_name = 'renit';

$db_host = 'localhost';
$db_user = 'u343427306_demo';
$db_pass = 'Renit@123';
$db_name = 'u343427306_demo';
// $dbServername = "localhost";
// $dbUsername = "u343427306_demo";
// $dbPassword = "Renit@123";
// $dbName = "u343427306_demo";
// Attempt to connect to database
try {
    // Connect to the MySQL database using PDO...
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Could not connect to the MySQL database, if this error occurs make sure you check your db settings are correct!
    exit('Failed to connect to database!');
}
// Initialize the session
session_start();
// Update the following variables
$jsonFilePath = '../google_client.json';
$jsonData = file_get_contents($jsonFilePath);

if ($jsonData === false) {
    die('Error reading the JSON file');
}

// Step 2: Decode the JSON data to a PHP array
$data = json_decode($jsonData, true);

if ($data === null) {
    die('Error decoding JSON data');
}

// Step 3: Access the data as needed
$google_oauth_client_id = $data['web']['client_id'];
$projectId = $data['web']['project_id'];
$authUri = $data['web']['auth_uri'];
$tokenUri = $data['web']['token_uri'];
$authProviderCertUrl = $data['web']['auth_provider_x509_cert_url'];
$google_oauth_client_secret = $data['web']['client_secret'];
$google_oauth_redirect_uri = $data['web']['redirect_uris'];
$google_oauth_version = 'v3';

// If the captured code param exists and is valid
if (isset($_GET['code']) && !empty($_GET['code'])) {
    // Execute cURL request to retrieve the access token
    $params = [
        'code' => $_GET['code'],
        'client_id' => $google_oauth_client_id,
        'client_secret' => $google_oauth_client_secret,
        'redirect_uri' => $google_oauth_redirect_uri,
        'grant_type' => 'authorization_code'
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    // Make sure access token is valid
    if (isset($response['access_token']) && !empty($response['access_token'])) {
        // Execute cURL request to retrieve the user info associated with the Google account
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/' . $google_oauth_version . '/userinfo');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);
        $response = curl_exec($ch);
        curl_close($ch);
        $profile = json_decode($response, true);
        // Make sure the profile data exists
        if (isset($profile['email'])) {
            $google_name_parts = [];
            $google_name_parts[] = isset($profile['given_name']) ? preg_replace('/[^a-zA-Z0-9]/s', '', $profile['given_name']) : '';
            $google_name_parts[] = isset($profile['family_name']) ? preg_replace('/[^a-zA-Z0-9]/s', '', $profile['family_name']) : '';
            // Check if the account exists in the database
            $stmt = $pdo->prepare('SELECT * FROM user_data WHERE user_email = ?');
            $stmt->execute([$profile['email']]);
            $account = $stmt->fetch(PDO::FETCH_ASSOC);
            $register = false;
            // If the account does not exist in the database, insert the account into the database
            if (!$account) {
                $stmt = $pdo->prepare('INSERT INTO user_data (user_email, user_name, profile_picture, created_at, login_method) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$profile['email'], implode(' ', $google_name_parts), isset($profile['picture']) ? $profile['picture'] : '', date('Y-m-d H:i:s'), 'google']);
                $id = $pdo->lastInsertId();
                $register = true;
            } else {
                $id = $account['id'];
            }
            // Authenticate the account
            session_regenerate_id();
            $_SESSION['google_loggedin'] = TRUE;
            $_SESSION['user_email'] = $profile['email'];
            $_SESSION['id'] = $account['id'];
            $_SESSION['username'] = implode(' ', $google_name_parts);
            $_SESSION['google_picture'] = isset($profile['picture']) ? $profile['picture'] : '';
            // Redirect to profile page
            if ($register == true) {
                header('Location: ./update_username');
            } else {
                header('Location: ../');
            }
            exit;
        } else {
            exit('Could not retrieve profile information! Please try again later!');
        }
    } else {
        exit('Invalid access token! Please try again later!');
    }
} else {
    // Define params and redirect to Google Authentication page
    $params = [
        'response_type' => 'code',
        'client_id' => $google_oauth_client_id,
        'redirect_uri' => $google_oauth_redirect_uri,
        'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
        'access_type' => 'offline',
        'prompt' => 'consent'
    ];
    header('Location: https://accounts.google.com/o/oauth2/auth?' . http_build_query($params));
    exit;
}
