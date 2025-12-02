<?php
session_start(); // 세션을 사용하려면 모든 페이지 맨 위에 이게 있어야 함
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>LifeLog - 메인</title>
</head>
<body>
    <h1>📅 일상 기록 서비스 (LifeLog)</h1>
    <hr>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <h3>👋 안녕하세요, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>님!</h3>
        <p>오늘의 특별한 장소를 기록해보세요.</p>
        
        <button onclick="alert('게시글 작성 기능은 추후 구현 예정입니다.')">✏️ 새 기록 작성</button>
        <a href="logout.php"><button style="background:red; color:white;">로그아웃</button></a>
        
    <?php else: ?>
        <p>로그인이 필요합니다.</p>
        <a href="login.php"><button>로그인</button></a>
        <a href="register.php"><button>회원가입</button></a>
    <?php endif; ?>
    
    <hr>
    <h3>📋 나의 기록 캘린더</h3>
    <p>(여기에 캘린더가 들어갈 예정입니다 - Week 3)</p>
</body>
</html>