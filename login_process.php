<?php
// login_process.php: 로그인 처리 및 세션 생성
session_start(); // 중요: 세션을 시작합니다 (로그인 상태 유지용)
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. 해당 이메일의 유저 정보 가져오기
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // 2. 유저가 존재하고, 비밀번호가 맞는지 확인 (password_verify 사용)
    if ($user && password_verify($password, $user['password'])) {
        
        // 3. 로그인 성공! -> 세션에 정보 저장 (서버가 이 사람을 기억하게 함)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // 메인 페이지로 이동
        echo "<script>
            alert('반갑습니다, " . $user['username'] . "님!');
            window.location.href = 'index.php';
        </script>";
        
    } else {
        // 로그인 실패
        echo "<script>
            alert('이메일 또는 비밀번호가 올바르지 않습니다.');
            history.back();
        </script>";
    }
} else {
    echo "잘못된 접근입니다.";
}
?>