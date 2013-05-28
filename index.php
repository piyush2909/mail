<?php include("connect.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<style>
ul {
	padding:0px;
	margin: 0px;
}
#response {
	padding:10px;
	background-color:#9F9;
	border:2px solid #396;
	margin-bottom:20px;
}
#list li {
	margin: 0 0 3px;
	padding: 7px 0 26px 2px;
	border:1px solid #000;
	color:#000;
	list-style: none;
}
.prodclr{
	background-color:#87B888;
	float:left;
	margin-left:10px;
	}
.disclor{
	background-color:#FFFF00;
	float:left;
	margin-left:10px;	
	}	
.txtclor{
	background-color:#87B888;
	float:left;
	margin-left:10px;
	}	
.idcolre{
	float:left;
	}	
.mailclss{
 
	margin-top:10px;
	}
.mailscnd{
	width:100px;
	 
	float:left;
	}	
.clr{
	clear:both;
	}
.editcls{
	float:left;
	}	
.dltcls{
	flaot:left;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){ 	
	  function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
      });
    
}, 2000);}
	
    $("#response").hide();
	$(function() {
	$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&update=update'; 
			$.post("updateList.php", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});
	});

});	
</script>
</head>
<?php if(isset($_POST['mailsubmit'])){
	   $maxquery="SELECT MAX(listorder) as max FROM dragdrop";
		$maxval=mysql_query($maxquery) or die(mysql_error()); 
		$maxrowval=mysql_fetch_array($maxval);
		$max=$maxrowval[max]+1;
		$query="insert into  dragdrop (maildescription,productname,discount,listorder) values('".$_POST['maildesc']."','".$_POST['productname']."','".$_POST['discount']."',$max)";
		mysql_query($query) or die('Error, insert query failed');
		header('index.php?action=list');
	}?>
   <?php 
   if(isset($_GET['delete']) || $_GET['delete']!=''){
   $query="DELETE FROM dragdrop WHERE id=".$_GET['delete'];
		mysql_query($query) or die('Error, insert query failed');
	   }
   ?> 
<body>
<div id="header"><a href="http://www.papermashup.com/"><img src="../images/logo.png" width="348" height="63" border="0" /></a></div>
<div id="container">
 
<?php if($_GET['action']=="add" || $_GET['edit']!=''){
	if($_GET['edit']!=''){
$query="select * from  dragdrop  where id=".$_GET['edit'];
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
		}
		?>
<form name="mailcron" id="mailcron" method="post" action=""/>
<div class="mailclss">
<div class="mailscnd">Product name</div>
<div class="mailscnd"><input type="text" name="productname" id="productname"  value="<?php echo $row['productname'];?>"/></div>
<div class="clr"></div>
</div>
<div class="mailclss">
<div class="mailscnd">discount</div>
<div class="mailscnd"><input type="text" name="discount" id="discount"  value="<?php echo $row['discount'];?>"/></div>
<div class="clr"></div>
</div>
<div class="mailclss">
<div class="mailscnd">mail description</div>
<div class="mailscnd"><textarea  name="maildesc" id="maildesc" /><?php echo $row['maildescription'];?></textarea></div>
<div class="clr"></div>
</div>
<div class="mailclss">
<div class="mailscnd"></div>
<div class="mailscnd"><input type="submit" name="mailsubmit" id="submit"  value="submit"/> </div>
<div class="clr"></div>
</div>
</form>
<?php }?>
<?php if($_GET['action']=="list"){?>
  <div id="list">

    <div id="response"> </div>
    <ul>
      <?php
                include("connect.php");
				$query  = "SELECT * FROM dragdrop ORDER BY listorder ASC";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
				$id=stripslashes($row['id']);	
				$id1 = stripslashes($row['listorder']);
				$productname = stripslashes($row['productname']);
				$discount = stripslashes($row['discount']);
				$text = stripslashes($row['maildescription']);
				?>
      <li id="arrayorder_<?php echo $id ?>">
	 	<div class="idcolre"><?php echo $id1 ?></div>
       <div class="prodclr"><?php echo $productname ?> </div>
	  <div class="disclor"> <?php echo $discount?>  </div>
      <div class="txtclor"> <?php echo $text; ?>  </div>
      <div class="editcls"><a href="index.php?edit=<?php echo $id;?>" >edit</a></div>
      <div class="dltcls"><a href="index.php?delete=<?php echo $id;?>" >delete</a></div>
        <div class="clear"></div>
      </li>
      <?php } ?>
    </ul>
  </div>
<?php }?>
</div>
</body>
</html>
