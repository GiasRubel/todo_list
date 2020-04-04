<?php
require_once realpath("vendor/autoload.php");
header('Content-type: application/json');

$new = new \App\data\job();

if (isset($_GET["action"]) && $_GET["action"] === 'index') {
    $result = $new->index();
    echo json_encode( $result );
}

if (isset($_GET["action"]) && $_GET["action"] === 'create') {
  $result = $new->create($_POST["title"]);
    echo json_encode( $result );
}

if (isset($_GET["action"]) && $_GET["action"] === 'changedTitle') {
  $result = $new->changeTitle($_POST["changedTitle"], $_GET["changeId"]);
    echo json_encode( $result );
}

if (isset($_GET["action"])  && $_GET["action"] === 'changeActive') {
    $int = (int)$_GET["id"];
    $result = $new->changeActive($int, 1);
    echo json_encode( $result );
}

if (isset($_GET["action"])  && $_GET["action"] === 'deleteJob') {
    $int = (int)$_GET["deleteId"];
    $result = $new->deleteJob($int);
    echo json_encode( $result );
}

if (isset($_GET["action"])  && $_GET["action"] === 'getActive') {
    $result = $new->getActive();
    echo json_encode( $result );
}

if (isset($_GET["action"])  && $_GET["action"] === 'getCompleted') {
    $result = $new->getCompleted();
    echo json_encode( $result );
}

if (isset($_GET["action"])  && $_GET["action"] === 'clearCompleted') {
    $result = $new->clearCompleted();
    echo json_encode( $result );
}


