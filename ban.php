<?php
    $conn = mysqli_connect('localhost', '123', 'asd123');
    echo    "<meta charset=\"utf-8\">";

    echo    "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";

    echo    "<link rel=\"stylesheet\" href=\"./css/ban.css\">";
	echo	"<link rel=\"stylesheet\" href=\"./css/css.css\">";

    echo    "<title>公开处刑</title>";

    $nav=<<<EOT
    <body class="body">

        <!--导航条-->
        <div class="bootstrap">

            <a href="./index.html" class="bootstrap-left">
                <h4>HDTspace</h4>
            </a>

            <a href="" class="bootstrap-right">
                历史档案
            </a>

            <a href="" class="bootstrap-right">
                最新动态
            </a>

            <a href="" class="bootstrap-right">
                将来规划
            </a>

        </div>

		<!---简述--->
		<div class="div1">
			<p>开挂一时爽</p>
			<p>明日封神榜</p>
		</div>
    EOT;
    
echo $nav;
        if(! $conn )
        {
            die('Could not connect: ' . mysqli_error());
        }
        //echo '数据库连接成功！';

        // 设置编码，防止中文乱码
        mysqli_query($conn , "set names utf8");

        $sql = 'SELECT reason, name, server_origin FROM litebans_bans';
        mysqli_select_db($conn,'bans');
        $retval = mysqli_query( $conn, $sql );
        if(! $retval )
        {
            die('无法读取数据: ' . mysqli_error($conn));
        }
        
        echo '<div class="div3">';
        echo '<table class="table">
            <thead>
                <tr class="tr1">
                    <td class="td1">玩家ID</td>
                    <td class="td2">处理服务器</td>
                    <td class="td3">封禁理由</td>
                </tr>
            </thead>';
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
        {
            echo "<tr class=\"tr2\">
                <td class=\"td1\">{$row['name']} </td> 
                "."
                <td class=\"td2\">{$row['server_origin']} </td> 
                "."
                <td class=\"td3\">{$row['reason']} </td>
            </tr>";
        }
        echo '</table>';
        echo '</div>';
        mysqli_close($conn);
        
        $footer=<<<EOT
        <div class="div-footer">

        <footer class="footer">made by bakahdt</footer>

        </div>
        
EOT;
    echo $footer;
    echo '</body>';

?>