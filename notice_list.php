<?php
session_start();

if(!$_SESSION['admin_name']){
	header('location:index.php?error=You are not an Administrator..!');
}
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/body.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/list_sheet.css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/upperCase.js"></script>
	</head>
<body>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation_lock.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content'>
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
		
		<!--content_body part start-->
		<section class="section2">
		<form action="student_list.php" method="post">
			
				<div class="top">
					<section>
						<label><a href="student_list.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['update']; ?></center></a></label>
						<label><p id="ht">All Notice List</p></label>
						
						<form action="" method="post">
							<label><p id="sb"><input type="text" id="s" name="search" title="insert student name">
							<input type="button" name="searchb" id="b" title="Search Here" value="Search"></p></label>
						</form>
						
				 </section>
				</div>
			<div>
				<table class="table">				
				<tr>
					<th>S.N.</th>
					<th>Document Title Name</th>
					<th>Document Name</th>
					<th>View</th>
				</tr>

				<tr>
					<?php 
					include("php/connect_db.php");

					$que ="select *from document order by 1 DESC";
					$run =mysql_query($que);
					$i=1;
					while($row=mysql_fetch_array($run))
					{
						$id = $row['id'];
						$title = $row['title'];
						$doc_name = $row['doc_name'];
						$path = $row['path'];
					?>
					<td style="color:#FF0000;"><?php echo $i; $i++;?></td>
					<td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $title; ?></td>
					<td style="text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $doc_name ?></td>
					<td style="text-align:left;"><a href='document/<?php echo $path; ?>/<?php echo $doc_name; ?>' target=_blank><b style="color:#0000FF"><img src="icon/pdf.gif"width="20px" height="20px">&nbsp;&nbsp;&nbsp;View</b></a><td>
					
				</tr>
					<?php } ?>
				</table>
			</div>

		</form>
		</section>		
	</div>
</body>
</html>