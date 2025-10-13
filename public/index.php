<?php

require_once '../config/config.php';

/**
 * Example:
 *
 * URL: http://www.company.xyz.web.bbq/department/delete/2
 *
 * =>   $_SERVER['REQUEST_URI'] == '/department/delete/2'
 *
 * =>   $request[0]         ==      'department'    ==     $entity
 *      $request[1]         ==      'delete'        ==     $method
 *      $request[2]         ==      '2'             ==     $id
 */

$request = explode('/', trim(strtolower($_SERVER['REQUEST_URI']), '/'));

$entity = $request[0] ?? null;
$method = $request[1] ?? null;
$id = $request[2] ?? null;

// === DEPARTMENT ===
if ($entity === 'department' && $method === 'read' && !empty($id)) {
    require_once '../src/department/read_single_record.php';
}
else if ($entity === 'department' && $method === 'create') {
    require_once '../src/department/create.php';
}
else if ($entity === 'department' && $method === 'read') {
    require_once '../src/department/read.php';
}
else if ($entity === 'department' && $method === 'update') {
    require_once '../src/department/update.php';
}
else if ($entity === 'department' && $method === 'delete') {
    require_once '../src/department/delete.php';
}
else if ($entity === 'department' && $method === 'edit' && !empty($id)) {
    require_once '../src/department/edit_single_record.php';
}
else if ($entity === 'department' && $method === 'edit') {
    require_once '../src/department/edit.php';
}

// === EMPLOYEE ===
else if ($entity === 'employee' && $method === 'read' && !empty($id)) {
    require_once '../src/employee/read_single_record.php';
}
else if ($entity === 'employee' && $method === 'create') {
    require_once '../src/employee/create.php';
}
else if ($entity === 'employee' && $method === 'read') {
    require_once '../src/employee/read.php';
}
else if ($entity === 'employee' && $method === 'update') {
    require_once '../src/employee/update.php';
}
else if ($entity === 'employee' && $method === 'delete') {
    require_once '../src/employee/delete.php';
}
else if ($entity === 'employee' && $method === 'edit' && !empty($id)) {
    require_once '../src/employee/edit_single_record.php';
}
else if ($entity === 'employee' && $method === 'edit') {
    require_once '../src/employee/edit.php';
}

// === MISC ===
else if (empty($entity)) {
    header('Location: /start');
    exit();
}
else if ($entity === 'start') {
    require_once '../view/homepage.html';
}

else if ($entity === '404') {
    http_response_code(404);
    echo '404';
}
else {
    header('Location: /404');
    exit();
}