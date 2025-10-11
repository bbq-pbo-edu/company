<?php

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
if ($entity === 'department' && $method === 'create') {
    require_once '../src/department/processCreate.php';
}
else if ($entity === 'department' && $method === 'read') {
    require_once '../src/department/index.php';
}
else if ($entity === 'department' && $method === 'update') {
    require_once '../src/department/processUpdate.php';
}
else if ($entity === 'department' && $method === 'delete') {
    require_once '../src/department/processDelete.php';
}

// === EMPLOYEE ===
else if ($entity === 'employee' && $method === 'create') {
    require_once '../src/employee/processCreate.php';
}
else if ($entity === 'employee' && $method === 'read') {
    require_once '../src/employee/index.php';
}
else if ($entity === 'employee' && $method === 'update') {
    var_dump($id);
    require_once '../src/employee/index.php';
}
else if ($entity === 'employee' && $method === 'delete') {
    require_once '../src/employee/processDelete.php';
}

// === MISC ===
else if ($entity === 'start') {
    require_once '../public/homepage.html';
}
else if ($entity === 'table') {
    require_once './assets/css/components/databaseTable/departmentTableOnUpdate.php';
}
else if ($entity === 'button') {
    require_once './assets/css/components/button/button.html';
}
else if ($entity === 'checkbox') {
    require_once './assets/css/components/checkbox/checkbox.html';
}
else if ($entity === 'radio') {
    require_once './assets/css/components/radiobutton/radiobutton.html';
}
else if ($entity === '404') {
    echo '404';
}
else {
    header('Location: /404');
}