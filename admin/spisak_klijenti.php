<?php

include_once '../data_base_access/klijentiDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
	
}
else{

	if(isset ($_GET['pretrazi'])){
		$ime = isset($_GET['ime']) ? $_GET['ime'] : null;
        $telefon = isset($_GET['telefon']) ? $_GET['telefon'] : null;
        $email = isset($_GET['email']) ? $_GET['email'] : null;

        $stanovi = pretraziKlijente($ime, $telefon, $email);
        $page = 1;
        $page_amount = 1;
	}

	else{
		$broj = ukupanBrojKlijenata();
		$num_rows = $broj['broj'];
		$items = 20;
		
		$nrpage_amount = $num_rows/$items;
		$page_amount = ceil($num_rows/$items);
		
		//$page_amount = $page_amount-1;
		//die($page_amount);
		$page = isset($_GET['stranica']) ? $_GET['stranica'] : 1;
		if($page < "1"){
			$page = "1";
		}
		$p_num = $items*($page - 1);
		
		$stanovi = prikaziSveKlijente($p_num, $items);
	}
}
                        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jevtić Nekretnine</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link rel="icon" href="images/kuca.png" type="image/x-icon" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>


<![endif]>

<!--  styled select box script version 2 -->
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 -->
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script -->
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true,
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script>


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);

var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<script language="javascript">
function brisanje(id) {

   var answer = confirm("Da li ste sigurni da želite da obrišete ovog klijenta?");

   if (answer){

      window.location = "izbrisi_klijenta.php?id=" + id;

   }
}
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/shared/logo2.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->

	
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
<!--  start nav-outer -->
<div class="nav-outer">

		<!-- start nav-right -->
		<div id="nav-right">

			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>

			<!--  start account-content -->
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a>
			</div>
			</div>
			<!--  end account-content -->

		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">

		<ul class="select"><li><a href="admin.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="dodaj_stan.php"><b>Stanovi</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_stan.php">Dodaj stan</a></li>
				<li class="sub_show"><a href="spisak_stanova.php">Spisak stanova</a></li>
				<!--<li><a href="#nogo">Nesto</a></li>-->
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="spisak_ponuda.php"><b>Ponude</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>      

		<div class="nav-divider">&nbsp;</div>

		<ul class="current"><li><a href="spisak_klijenti.php"><b>Klijenti</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_klijenta.php">Dodaj klijenta</a></li>
				<li class="sub_show"><a href="spisak_klijenti.php">Spisak klijenata</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</ul>    
                
		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="podsetnik.php"><b>Podsetnik</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="dodaj_podsetnik.php">Dodaj podsetnik</a></li>
				<li class="sub_show"><a href="podsetnik.php">Spisak poruka</a></li>
				<li><a href="danasnji_podsetnici.php">Danasnji Podsetnici</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="imenik.php"><b>Imenik</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="spisak_agencija.php">Spisak agencija</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">
    <div id="admin-pretraga">
    <form id="pretrazi" action="spisak_klijenti.php" method="get">
	<!--  start page-heading -->
	<div id="page-heading">
            <div id="pozicija1">
	            <table>
	                <tr>
	                    <th>Ime:</th>
	                    <td><input class="admin-input-select" type="text" name="ime" value="<?php if(isset($_GET['ime'])){ echo $_GET['ime'];} ?>" /></td>
	                </tr>
	            </table>
            </div>
            <div id="pozicija2">
                <table>
                    <tr>
	                    <th>Telefon:</th>
	                    <td><input class="admin-input-select" type="text" name="telefon" value="<?php if(isset($_GET['telefon'])){ echo $_GET['telefon'];} ?>" /></td>
                    </tr>
                </table>
            </div>
            <div id="pozicija3">
                <table>
                    <tr>
	                    <th>Email:</th>
	                    <td><input class="admin-input-select" type="text" name="email" value="<?php if(isset($_GET['email'])){ echo $_GET['email'];} ?>" /></td>
                    </tr>
                </table>
            </div>
            <div style="clear:both; float:right;  margin:10px 10px 10px 0;">
                <input type="submit" value="Pretrazi" name="pretrazi" id="pretrazi" style="width:55px; height:25px;" />
		<input type="reset" value="Reset" style="width:55px; height:25px;" />
            </div>
	</div>
</form>
    </div>
	<!-- end page-heading -->
        
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a href="">Vlasnik</a></th>
                    <th class="table-header-repeat line-left"><a href="">Kategorija</a></th>
                    <th class="table-header-repeat line-left"><a href="">Tip</a></th>
                    <th class="table-header-repeat line-left"><a href="">Struktura</a></th>
					<th class="table-header-repeat line-left"><a href="">Opstina</a></th>
					<th class="table-header-repeat line-left"><a href="">Kvadratura</a></th>
                    <th class="table-header-repeat line-left" style="min-width:120px;"><a href="">Cena</a></th>
					<th class="table-header-repeat line-left"><a href="">Datum</a></th>
					<th class="table-header-repeat line-left"><a href="">Agent</a></th>
					<th class="table-header-repeat line-left"><a href="">Sekretarica</a></th>
					<th class="table-header-options line-left"><a href="">Opcije</a></th>
				</tr>
				<?php
					if(isset($stanovi)){
					
					foreach($stanovi as $stan){
                          
                     $datetime = explode(" ",$stan['timestamp']);
				?>
				<tr>
					<td><input  type="checkbox"/></td>
                    <td><?php echo $stan['ime'];?></td>
                    <td><?php echo $stan['kategorija'];?></td>
					<td><?php echo $stan['tip'];?></td>
					<td><?php echo $stan['stan_tip'];?></td>
					<td><?php echo $stan['opstina'];?></td>
                    <td><?php echo $stan['kvadratura_od'] . ' - ' . $stan['kvadratura_do'];?></td>
					<td><?php echo $stan['cena_od'] . ' - ' . $stan['cena_do'];?></td>
					<td><?php echo $datetime[0];?></td>
					<td><?php echo $stan['agent'];?></td>
					<td><?php echo $stan['sekretarica'];?></td>
                    <td class="options-width">
					<a href="izmeni_klijenta.php?id=<?php echo $stan[0];?>" title="Izmeni" class="icon-1 info-tooltip"></a>
                    <a href="spisak_stanova.php?<?php echo 'kategorija[]=' . $stan['kategorija'] . '&tip[]=' . $stan['tip'] . '&stan_tip[]=' . $stan['stan_tip'] . '&opstina[]=' . $stan['lokacija_id'] . '&povOD=' . $stan['kvadratura_od'] . '&povDO=' . $stan['kvadratura_do'] . '&cenaOD=' . $stan['cena_od'] . '&cenaDO=' . $stan['cena_do'] . '&grejanje=' . $stan['grejanje'] . '&namestenost=' . $stan['namestenost']; ?>&pretrazi=Pretrazi" target="_blank" title="Pretrazi" class="icon-4 info-tooltip"></a>
                    <a href="#" onclick="brisanje(<?php echo $stan[0]; ?>);" title="Obrisi" class="icon-2 info-tooltip"></a>
					<!-- <a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				</tr>
								
				<?php
						}
					}
				?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
			<?php
			if($page_amount != "0"){
				if($page != "0"){
					$prev = $page-1;
					//echo "<a href=\"spisak_stanova.php?q=$section&p=$prev\">Prev</a>";
					echo '<a href="spisak_klijenti.php?stranica='.$prev.'" class="page-left"></a>';
				}
				 	 
					  
					  echo '<div id="page-info">Page <strong>'.$page.'</strong> / '.$page_amount.'</div>';
					 
				 
				?>
				
				<?php
				
				if($page < $page_amount){
					$next = $page+1;
					//echo "<a href=\"spisak_stanova.php?q=$section&p=$next\">Next</a>";
					echo '<a href="spisak_klijenti.php?stranica='.$next.'" class="page-right"></a>';
				}
				
				
			}
			?>
			<!--<td>
				<a href="spisak_stanova.php?stranica=" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="spisak_stanova.php?stranica=" class="page-right"></a>
			</td>
			-->
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
		
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>

<!-- start footer -->
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
	Admin Skin &copy; Copyright Jevtic Nekretnine <a href="">www.jevticnekretnine.rs</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

</body>
</html>
