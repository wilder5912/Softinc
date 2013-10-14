 <?php
 include 'cnx.php';
$id = $_GET['id']; 
$qry = "SELECT problema_archivo FROM archivo WHERE id_archivo =$id;";
$res = pg_query($entrada,$qry);
while($nombreArchivo = pg_fetch_array($res))
{
 $dato=$nombreArchivo['problema_archivo'];
}
//echo $dato;
header("Content-Disposition: attachment; filename=../archivo/problema/.$dato");
header("Content-Type: application/force-download");    
header ("Content-Length: ".filesize("../archivo/problema/$dato"));
readfile("../archivo/problema/$dato");
 ?> 