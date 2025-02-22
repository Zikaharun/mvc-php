<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $data['judul'] ?></title>
</head>
<body>
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>">PHP-MVC</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= BASEURL ?>">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= BASEURL . 'about'?>">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="<?= BASEURL . 'task' ?>" tabindex="-1" aria-disabled="false">list-tasks</a>
  </li>
</ul>