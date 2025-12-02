<?php
// logout.php: 로그아웃 처리
session_start(); // 세션을 시작해야 삭제도 할 수 있습니다.

// 1. 모든 세션 변수 해제
$_SESSION = array();

// 2. 세션 쿠키 삭제 (더 확실한 로그아웃을 위해)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. 세션 파괴
session_destroy();

// 4. 메인 페이지로 이동 (로그아웃 되었으니 로그인 버튼이 보여야 함)
echo "<script>
    alert('로그아웃 되었습니다.');
    window.location.href = 'index.php';
</script>";
?>