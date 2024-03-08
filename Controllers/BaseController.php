<?php

declare(strict_types=1);

class BaseController
{
    
    protected function view(string $path, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $path = str_replace('.', '/', $path); // thay đổi dấu . thành /

        $pathView = './Views/' . $path . '.php'; // đường dẫn đến file view

        if (!file_exists($pathView)) {
            logger('File not found: ' . $pathView);
            return;
        }
        require_once './Views/' . $path . '.php';
    }

    protected function loadModel(string  $model)
    {
        $model = ucfirst($model);
        $modelPath =  './Models/' . $model . '.php';

        if (!file_exists($modelPath)) {
            logger('File not found: ' . $modelPath);
            return;
        }
        require_once $modelPath;
    }
    protected function redirectLogin()
    {
        header('Location: ' . './Views/frontend/auth/login.php');
    }
    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    protected function redirectHome()
    {
        $this->redirect('/');
    }

    protected function redirect($path)
    {
        header('Location: ' . $path);
    }

    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    protected function error($message)
    {
        $this->view('error', ['message' => $message]);
    }

    protected function success($message)
    {
        $this->view('success', ['message' => $message]);
    }

    protected function notFound()
    {
        $this->view('error', ['message' => 'Not found']);
    }

    protected function forbidden()
    {
        $this->view('error', ['message' => 'Forbidden']);
    }

    protected function unauthorized()
    {
        $this->view('error', ['message' => 'Unauthorized']);
    }
}
