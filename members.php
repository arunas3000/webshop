<?php include("includes/header.php"); ?>


<?php 

//Create new instance of a View class
$view = new View();
$members = new Members();





// Sse the "ternary" operator to check if page param is set
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 0;

// Use "ternary" operator to check to see if page is 0
$prev = ($page == 0) ? 0 : $page - 1;
$next = $page + 1;
?>
		
	<div class="content">

<br/>
<div class="member-list product-list">
	<h2>Our Members</h2>
	<br/>
	<a class="pages" href="members.php?page=<?php echo $prev; ?>">&lt;prev</a>
	&nbsp;|&nbsp;
	<a class="pages" href="members.php?page=<?php echo $next; ?>">next&gt;</a>
        <table class="members">
		<tr>
			<th>Member ID</th><th>Name</th><th>City</th><th>Email</th>
		</tr>
				
				<?php echo $view->displayMembers($page, $members->memberCount, $members->getMembers()); ?>
			</table>
	<br/>
	<a href="addmember.php" class="abutton">&nbsp;&nbsp;&nbsp;Member Sign Up&nbsp;&nbsp;&nbsp;</a>

</div>
<br class="clear-all"/>
</div><!-- content -->
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>
