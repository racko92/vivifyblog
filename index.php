<?php include 'header.php'; ?>
<?php 
    // pripremamo upit
    $sql = "SELECT * FROM post INNER JOIN users WHERE post.user_id = users.id ORDER BY created_at";
    $statement = $conn->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita
    $posts = $statement->fetchAll();

?>
<main>
	<?php 
		foreach($posts as $key => $value){ 
	?>
	<section class="mainContainer">
		<a href="post.php"><h2><?php echo $value['title']; ?></h2></a>
		<p class="postedBy"><?php echo $value['name'] . " " . $value['created_at'];?></p>
		<p class="postContent"><?php echo $value['text']; ?></p>
	</section>
	<?php
		}
	?>
	<section class="postLinks">
		<a href="#">Older</a>
		<a href="#">Newer</a>
	</section>
</main>



<?php include 'footer.php'; ?>