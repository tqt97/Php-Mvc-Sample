<?php

declare(strict_types=1);

require_once './Core/Classes/Logger.php'; // Sử dụng để ghi log cho ứng dụng
require_once './Core/Classes/Database.php'; // Kết nối với Database
require_once './Models/BaseModel.php'; // Tạo ra 1 lớp cha để cho tất cả các Model sử dụng chung
require_once './Controllers/BaseController.php'; // Tạo ra 1 lớp cha để cho tất cả các Controller sử dụng chung
require_once './Core/Classes/Auth.php';

require_once dirname(__DIR__) . "/Core/Config.php";

if (session_id() === '')
    session_start();
