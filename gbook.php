<?php
header("Content-type:text/html;charset=utf-8");
//预先定义数据库链接参数
$host = '127.0.0.1';
$dbuser = 'root';
$pwd = 'wangdong.1996';
$dbname = 'php10';
$db = new mysqli($host, $dbuser, $pwd, $dbname);
//检查是否成功
$db = new mysqli($host, $dbuser, $pwd, $dbname);
if ($db->connect_errno <> 0) {
    die("链接数据库失败");
}

$db->query("SET NAMES UTF8");

$sql = "SELECT * FROM msg ORDER BY id DESC";
$mysqli_result = $db->query($sql);
if ($mysqli_result===false){
    echo "SQL错误";
    exit;
}
$rows=[];
while ($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>留言本</title>
    <link rel="stylesheet" href="css.css" />
</head>
<body>
<div class="wrap">
    <!-- 发表留言 -->
    <h2 class="tit">留言本</h2>
    <div class="add">
        <form action="save.php" method="post">
            <textarea name="content" class="content" cols="50" rows="5" placeholder="请在此输入您的留言"></textarea>
            <input name="user" class="user" type="text" placeholder="如何称呼您？">
            <input class="btn" type="submit" value="发表留言">
        </form>
    </div>
                    <!-- 查看留言 -->
                    <div class="ms">
                        <?php
                        foreach($rows as $row) {
                        ?>
                        <div class="msg">
                            <div class="info">
                                <span class="user"><?php echo $row['user'];?></span>
                                <span class="time"><?php date_default_timezone_set('PRC');
                                                    echo date("Y-m-d H-i-s",$row['intime']);?></span>
                            </div>
                            <div class="content">
                                <?php echo $row['content'];?>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </div>

</div>
</body>
</html>
