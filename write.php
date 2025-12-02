<?php
// ★ 여기가 핵심! 방금 만든 보안관을 불러옵니다.
// 로그인을 안 했다면 여기서 바로 튕겨져 나갑니다.
require_once 'auth_guard.php'; 

require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>새 글 작성</title>
</head>
<body>
    <h1>✏️ 새 기록 작성 (보안 구역)</h1>
    <hr>
    
    <p>이 화면이 보인다면 당신은 로그인한 사용자입니다!</p>
    <p><strong>현재 사용자:</strong> <?php echo $_SESSION['username']; ?></p>
    
    <form>
        <p>(여기는 소윤님이 게시글 작성 폼을 만들 공간입니다)</p>
        <textarea rows="5" cols="40" placeholder="오늘 무슨 일이 있었나요?"></textarea><br>
        <button type="button">저장(테스트)</button>
    </form>
    
    <br>
    <a href="index.php">메인으로 돌아가기</a>
</body>
</html>