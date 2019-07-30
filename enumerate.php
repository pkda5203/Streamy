<?php
/*connection with database*/
$con =mysqli_connect("localhost","id10335721_streamy_admin","Mysql.5650","id10335721_streamydb");

//handle error
if (mysqli_connect_errno())
{
    printf("The connection failed! : %s\n",mysqli_connect_error());
    exit();
}

/*scan directory for files*/
$files = glob('*.mp3');


//function to sort the files
usort($files, function ($a, $b)
{
    return filemtime($a)< filemtime($b);
});
/*update needed change to the database*/
$i =0;

while ($files[$i]){
    $trackname= basename($files[$i]);
    echo $trackname;
    $addquery = "INSERT INTO StreamyDB (id, Title, Genre, Listens) VALUES (default, '$trackname', '0','0')";
    mysqli_query($con,$addquery);
    $i++;
};

?>
