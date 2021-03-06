<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

include('config/database.php');
include('config/core.php');
include('config/employer.php');
include('config/JWT.php');
include('config/BeforeValidException.php');
include('config/ExpiredException.php');
include('config/SignatureInvalidException.php');
include('config/Key.php');
include('config/jobPost.php');

$data = json_decode(file_get_contents("php://input"));
$database = new Database();
$db = $database->getConnection();

if (empty($data->jwt)) {
    http_response_code(401);
    echo json_encode(
        array(
            "message" => "Not Authorized.",
            "error" => "Token not found."
        )
    );
    return;
} else {
    $jwt = $data->jwt;
    try {
        $user = new Employer($db);
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $user->id = $decoded->data->id;
        $user->fName = $decoded->data->fName;
        $user->lName = $decoded->data->lName;
        $user->email = $decoded->data->email;

        if (!$user->isEmployer()) {
            http_response_code(401);
            // show error message
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => "Not an Employer!"
            ));
            return;
        }

        $post = new JobPost($db);
        $post->desc = $data->desc;
        $post->address = $user->companyAddress;
        $post->title = $data->title;
        $post->qualifications = $data->qualifications;
        $post->responsibilities = $data->responsibilities;
        $post->education = $data->education;
        $post->type = $data->type;
        $post->employer = $user->employerId;
        $post->experience = $data->experience;
        $post->salary = $data->salary;
        $post->benefits = $data->benefits;
        $post->endDate = $data->endDate;

        $post->postJob();
    } catch (Exception $e) {
        // set response code
        http_response_code(401);

        // show error message
        echo json_encode(array(
            "message" => "Access denied.",
            "error" => $e->getMessage()
        ));
    }
}