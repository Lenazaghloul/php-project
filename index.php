<?php

include('./config/db.php');

$sql = 'SELECT ID, Name, Email, Courses FROM student_account ORDER BY Created_at';
$result = mysqli_query($conn, $sql);

$account = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

// print_r($account);

// print_r(explode(',', $account[0]['Courses']));
?>


    <?php
    include('./templates/header.php')
    ?>

<h4 class="center grey-text">account</h4>
<div class="container">
  <div class="row">
  <?php foreach($account as $a): ?>
    <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <h6><?php echo htmlspecialchars($a['Name']);?></h6>
          <h6><?php echo htmlspecialchars($a['Email']);?></h6>
          <ul>
            <?php foreach(explode(',', $a['Courses']) as $cor):?>
              <li>
                <?php echo htmlspecialchars($cor);?>
              </li>
              <?php endforeach ?>
          </ul>
        </div>
        <div class="card-action right-align">
          <a class="brand-text" href="details.php?id=<?php echo $a['ID']?>">more info</a>
        </div>
      </div>
    </div>

   <?php endforeach?>

  </div>
</div>


<?php
    include('./templates/footer.php')
    ?>
<h1>
<?php
// echo "hello world";

?>
</h1>

<div>
  <?php 
//   define('NAME', 'hala');

// echo NAME;
  // $name = 'lena';
//   $name = 'lama';

//   $age = 23;
//   echo $name , $age;

// $stringOne = 'lena@gmail.com ';
// $stringTwo = 'lena@gmail.com';
// echo $stringOne , $stringTwo;
// echo "my email ", $stringTwo;

// echo "my name is $name";
// echo $name[1];

// echo strlen($name);
// echo strtoupper($name);
// echo strtolower($name);
// echo str_replace('n', 'r' , $name);

$x=12;
$r=3.14;

// echo $x / $r * 2;

//  $x--;
// echo $x;

// $r += $x;
// echo floor ($r);
// echo pi();

$people = ['John', 'lena', 'lama', 60];
// echo $people[1];
$name= array('lena');
// print_r($name);
// print_r($people);
// echo count($people);
array_pop($people);
// print_r($people);
array_push($people, 50);
$name[] =20;
// print_r($name);
// print_r($people);
$three=array_merge($name, $people);
// print_r($three);

$peoples = ['John'=>'lena', 'lama'=> 60];
// print_r($peoples);
// echo count($peoples);
// echo $peoples['John']
 ?>
 <?php 

$peoples = [ 
['name'=>'lena', 'price'=> 60],
 ['name'=>'lama', 'price'=> 70],
 ['name'=>'amr', 'price'=> 40],
['name'=>'yousef', 'price'=> 10],
 ['name'=>'hala', 'price'=> 80]
];

// foreach($peoples as $p){
//   echo $p['name']. '</br>';
// }

 ?>
 <!-- <h1>People</h1> -->
<!-- <ul>
 <h3>
  <?php
foreach($peoples as $p){?>
  <h3> <?php echo $p['name'] . '-';?> </h3> 
  <h5> <?php echo $p['price']. '</br>'; ?> </h5> 

<?php } ?>
 
 </h3>
 </ul> -->
</div>


</html>