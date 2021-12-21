<!DOCTYPE html>
<html lang="zh-CN">

    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="./css/css.css">
        <link rel="stylesheet" href="./css/ban.css">

        <?php
            $con = mysqli_connect( "localhost", "123", "asd123" );
            mysqli_select_db( $con, "bans" );
            mysqli_query( $con, "set names utf8" );
            $sql = "SELECT reason, name, server_origin FROM litebans_bans";
            $ret = mysqli_query( $con, $sql );
        ?>

        <title>公开处刑</title>
    </head>

    <body class="body">
        
		<!---导航条--->
        <div class="bootstrap">

            <a href="./index.html" class="bootstrap-left">
                <h4>HDTspace</h4>
            </a>

            <a href="./making.html" class="bootstrap-right">
                历史档案
            </a>

            <a href="./making.html" class="bootstrap-right">
                最新动态
            </a>

            <a href="./making.html" class="bootstrap-right">
                将来规划
            </a>

        </div>

        <!---简述--->
		<div class="div1">
			<p>开挂一时爽</p>
			<p>明日封神榜</p>
		</div>

        <!---封禁表--->
		<div class="div2">

			<table class="table">

				<tr class="tr">
					<td class="td1">
						<h4>玩家ID</h4>
					</td>
					<td class="td2">
						<h4>处理服务器</h4>
					</td>
					<td class="td3">
						<h4>处理理由</h4>
					</td>
				</tr>

                <?php
                while($row = mysqli_fetch_array( $ret, MYSQLI_ASSOC ))
                {
                    echo "<tr class=\"tr\">";
                        echo "<td>          {$row['name']} </td>";
                        echo "<td> {$row['server_origin']} </td>";
                        echo "<td>        {$row['reason']} </td>";
                    echo "</tr>";
                }
                ?>

            </table>

        </div>

        <!---网页底--->
		<div class="div-footer">

			<footer class="footer">made by bakahdt</footer>

		</div>

    </body>

</html>