<?php
include_once "dbc.php";
if(isset($_GET['q']))
{
$q=$_GET['q'];
$q=mysqli_real_escape_string($conn,$q);
$q=htmlentities($q);
$sql="select * from posts where title='$q' or title like '%$q' or title like '$q%' or title like '%$q%'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
    ?>
    <ul class="collection row">
    <?php
while($x=mysqli_fetch_assoc($res))
{
?>
<li class="collection-item col l12">
<!-- You can add here link to post -->
<p class='blue-text'><?php echo $x['title'];?></p>
<!-- Add here more field like author photo, views, comments -->
<span class='grey-text'>Added by <?php echo $x['author'];?> on <?php echo $x['publish_date'];?></span>
</li>
<?php
}
?>
</ul>
<?php
}
else
{
    echo "<p class='black-text'>Sorry, No data found</p>";
}
}
else
{
    echo "<p class='black-text'>Bad Request</p>";
}
?>
