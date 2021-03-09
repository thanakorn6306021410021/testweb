<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php

         
         $con = mysqli_connect("localhost","root","","bookstore");

          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }
            $sqltxt = "SELECT * FROM book";
            $result = mysqli_query($con,$sqltxt);
            echo "<html><head><title>Test database</title></head>";
            echo "<body><CENTER><H3>รายชื่อหนังสือ</H3></CENTER>";
            echo "<table width='100%' border='1' align='center'>";
            echo "<tr><td>ล าดับที่ </td> <td>รหัสหนังสือ</td><td>ชื่อหนังสือ</td>";
            echo "<td>ประเภทหนังสือ </td> <td>สถานะหนังสือ</td><td>ส านักพิมพ์</td>";
            echo "<td>ราคาหนังสือ </td> <td>ราคาเช่าหนังสือ</td><td>จ านวนวัน</td>";
            echo "<td>รูปภาพ </td> <td>วันที่ซื้อ</td></tr>";


            $a=1;
            while ( $rs = mysqli_fetch_array ( $result ) )
            {
            echo "<tr><td> $a </td>";
            for($n = 0; $n < 10 ; $n++) {
            if ($n == 2) echo "<td>" . CheckType( $con, $rs[ $n ]) .

            "</td>";

            else if ($n == 3) echo "<td>" . CheckStatus( $con, $rs[ $n ])

            . "</td>";

            else echo "<td>" . $rs[ $n ] . "</td>";
            }
            echo "</tr>";
            $a++;
            }
            echo "</table></body></html>";
            mysqli_close ( $con );
            function CheckType( $con, $code) {
            $sqltxt = "SELECT * FROM typebook";
            $result1 = mysqli_query($con,$sqltxt);
            while ( $rs1 = mysqli_fetch_array ( $result1 ) )
            {
            if ($rs1[0] == $code) return $rs1[1];
            }
            return "";
            }
            function CheckStatus( $con, $code) {
            $sqltxt = "SELECT * FROM statusbook";
            $result2 = mysqli_query ($con,$sqltxt);
            while ( $rs2 = mysqli_fetch_array ( $result2 ) )
            {
            if ($rs2[0] == $code) return $rs2[1];
            }
            return "";
            }
            ?>