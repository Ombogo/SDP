<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table class="striped">
        <tr class="header">
            <td>User Id </td>
            <td>Text </td>
            <td>Sender</td>
            <td>Service</td>
            <td>Status</td>
            <td>Time Sent</td>
        </tr>
        <?php
         $dbhost = '192.168.1.229';
   $dbuser = 'conn';
   $dbpass = '*furahiamobiledb#';
   $dbname='sdp';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname);
   if(! $conn )
   {
     die('Could not connect: ' . mysql_error());
     
   }
   $sql="select * from outgoing_sms_parking_bulk where send_time between UNIX_TIMESTAMP('2015-01-01 00:00:00') and UNIX_TIMESTAMP('2015-01-31 23:29:59')";
   echo 'Connected successfully';
  mysql_select_db('sdp');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    
    $name=  $row['user_id'];
       $text=  $row['text_message'];
       $sender=$row['sender_name'];
       $service=$row['service_id'];
       $status=$row['delivery_status'];
       $time=$row['timestamp'];
         
} 
echo "<tr><td style='width: 200px; border:2px;'>".$name."</td><td style='width: 600px;'>".$text."</td><td>".$sender."</td><td>".$service."</td><td>".$status."</td><td>".$time."</td></tr>";
 

echo "Fetched data successfully\n";
mysql_close($conn);
?>
    </body>
</html>
