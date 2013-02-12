<?php

include_once '../data_base_access/ponudeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
 
if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = prikaziPonudu($id);
} 
                     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
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
				<li><a href="spisak_stanova.php">Spisak stanova</a></li>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="current"><li><a href="spisak_ponuda.php"><b>Ponude</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
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

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="#nogo"><b>News</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

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

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Izmeni Podatke</h1>
	</div>
	<!-- end page-heading -->
        <form id="izmeni_ponudu" action="ponuda_update.php" method="post">
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
	<!--  start content-table-inner -->
	<div id="content-table-inner">

	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>


		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="#">Podaci o ponudi</a></div>
			
		</div>
		<!--  end step-holder -->

		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Id:</th>
			<td><input type="hidden" class="inp-form" name="id" value="<?php echo $stan[0];?>" /><?php echo $stan[0];?></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Vlasnik:</th>
			<td><input type="text" class="inp-form" name="vlasnik" value="<?php echo $stan['vlasnik'];?>"/></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Telefon:</th>
			<td><input type="text" class="inp-form" name="telefon" value="<?php echo $stan['telefon'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">E-mail:</th>
			<td><input type="text" class="inp-form" name="email" value="<?php echo $stan['email'];?>"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Kategorija:</th>
			<td><?php echo $stan['kategorija'];?></td>
			<td></td>
		</tr>   
			<th valign="top">Tip:</th>
			<td><?php echo $stan['tip'];?></td>
			<td></td>
		</tr>    
			<th valign="top"></th>
			<td><?php echo $stan['stan_tip'];?></td>
			<td></td>
		</tr>              
		<tr>
			<th valign="top">Ulica i broj:</th>
			<td><input type="text" class="inp-formV" name="ulica" value="<?php echo $stan['ulica'];?>"/><input type="text" class="inp-formM" name="br" value="<?php echo $stan['br'];?>"/></td>
			<td>
			
			</td>
		</tr>
        <tr>
			<th valign="top">Sprat:</th>
			<td><?php echo $stan['sprat'];?>"</td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Lokacija:</th>
		<td>
          <?php echo $stan['opstina'];?>     
		
		</td>
		<td></td>
		</tr>
                <tr>
			<th valign="top">Grejanje:</th>
			<td><?php echo $stan['grejanje'];?></td>
			<td></td>
		</tr>   
                <tr>
			<th valign="top">Nameštenost:</th>
			<td><?php echo $stan['namestenost'];?></td>
			<td></td>
		</tr>                            
                <tr>
			<th valign="top">Kvadratura:</th>
			<td><input type="text" class="inp-form" name="kvadratura" value="<?php echo $stan['kvadratura'];?>"/></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Cena:</th>
			<td><input type="text" class="inp-form" name="cena" value="<?php echo $stan['cena'];?>"/></td>
			<td></td>
		</tr>
		<!--<tr>
		<th valign="top">Select a date:</th>
		<td class="noheight">

			<table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<form id="chooseDateForm" action="#">

				<select id="d" class="styledselect-day">
					<option value="">dd</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				</td>
				<td>
					<select id="m" class="styledselect-month">
						<option value="">mmm</option>
						<option value="1">Jan</option>
						<option value="2">Feb</option>
						<option value="3">Mar</option>
						<option value="4">Apr</option>
						<option value="5">May</option>
						<option value="6">Jun</option>
						<option value="7">Jul</option>
						<option value="8">Aug</option>
						<option value="9">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
				</td>
				<td>
					<select  id="y"  class="styledselect-year">
						<option value="">yyyy</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2010</option>
					</select>
					</form>
				</td>
				<td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table>

		</td>
		<td></td>
	</tr>-->
	<tr>
		<th valign="top">Opis:</th>
		<td><textarea rows="" cols="" class="form-textarea" name="opis"><?php echo $stan['opis'];?></textarea></td>
		<td></td>
	</tr>
        
	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="slika1" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
	<tr>
	<th>Image 2:</th>
	<td>  <input type="file" class="file_1" name="slika2" /></td>
	<td><div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div></td>
	</tr>
	<tr>
	<th>Image 3:</th>
	<td><input type="file" class="file_1" name="slika3" /></td>
	<td><div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div></td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
                        <!--<input type="submit" value="Dodaj" name="dodaj_stan" id="dodaj_stan" />-->
                        <input type="submit" value="Izmeni" class="form-submit" name="izmeni_ponudu" id="izmeni_ponudu" />
			<input type="reset" value="reset" class="form-reset" />
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>
        <!--  start related-activities -->
	<div id="related-activities">

		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->

		<!--  start related-act-bottom -->
		<div id="related-act-bottom">

			<!--  start related-act-inner -->
			<div id="related-act-inner">

				<div class="left"><a href=""></a></div>
				<div class="right">
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
									
                                        <tr>
                                        <td>
                                            <?php
                                            if ($stan['t_interfon']) { echo "<input type='checkbox' name='interfon' checked>Interfon"; }
                                            else { echo "<input type='checkbox' name='interfon'>Interfon"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_kablovska']) { echo "<input type='checkbox' name='kablovska' checked>Kablovska"; }
                                            else { echo "<input type='checkbox' name='kablovska'>Kablovska"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>                                        
                                        <td>
                                            <?php
                                            if ($stan['t_tv']) { echo "<input type='checkbox' name='tv' checked>TV"; }
                                            else { echo "<input type='checkbox' name='tv'>TV"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_klima']) { echo "<input type='checkbox' name='klima' checked>Klima"; }
                                            else { echo "<input type='checkbox' name='klima'>Klima"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>
                                        <td>
                                            <?php
                                            if ($stan['t_internet']) { echo "<input type='checkbox' name='internet' checked>Internet"; }
                                            else { echo "<input type='checkbox' name='internet'>Internet"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_telefon']) { echo "<input type='checkbox' name='ima_telefon' checked>Telefon"; }
                                            else { echo "<input type='checkbox' name='ima_telefon'>Telefon"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>                                        
                                         <td>
                                            <?php
                                            if ($stan['t_frizider']) { echo "<input type='checkbox' name='frizider' checked>Frižider"; }
                                            else { echo "<input type='checkbox' name='frizider'>Frižider"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_sporet']) { echo "<input type='checkbox' name='sporet' checked>Šporet"; }
                                            else { echo "<input type='checkbox' name='sporet'>Šporet"; }
                                            ?>
                                        </td>            
                                        </tr>
                                        <tr>
                                        <td>
                                            <?php
                                            if ($stan['t_vesmasina']) { echo "<input type='checkbox' name='vesmasina' checked>Veš mašina"; }
                                            else { echo "<input type='checkbox' name='vesmasina'>Veš mašina"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_kuhinjskielementi']) { echo "<input type='checkbox' name='kuhinjskielementi' checked>Kuhinjski elementi"; }
                                            else { echo "<input type='checkbox' name='kuhinjskielementi'>Kuhinjski elementi"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>                                        
                                        <td>
                                            <?php
                                            if ($stan['t_plakari']) { echo "<input type='checkbox' name='plakari' checked>Plakari"; }
                                            else { echo "<input type='checkbox' name='plakari'>Plakari"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_lift']) { echo "<input type='checkbox' name='lift' checked>Lift"; }
                                            else { echo "<input type='checkbox' name='lift'>Lift"; }
                                            ?>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <?php
                                            if ($stan['t_bazen']) { echo "<input type='checkbox' name='bazen' checked>Bazen"; }
                                            else { echo "<input type='checkbox' name='bazen'>Bazen"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_garaza']) { echo "<input type='checkbox' name='garaza' checked>Garaža"; }
                                            else { echo "<input type='checkbox' name='garaza'>Garaža"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>                                        
                                        <td>
                                            <?php
                                            if ($stan['t_parking']) { echo "<input type='checkbox' name='parking' checked>Parking"; }
                                            else { echo "<input type='checkbox' name='parking'>Parking"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_dvoriste']) { echo "<input type='checkbox' name='dvoriste' checked>Dvorište"; }
                                            else { echo "<input type='checkbox' name='dvoriste'>Dvoritšte"; }
                                            ?>
                                        </td>               
                                        </tr>
                                        <tr>
                                        <td>
                                            <?php
                                            if ($stan['t_potkrovlje']) { echo "<input type='checkbox' name='potkrovlje' checked>Potkrovlje"; }
                                            else { echo "<input type='checkbox' name='potkrovlje'>Potkrovlje"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_terasa']) { echo "<input type='checkbox' name='terasa' checked>Terasa"; }
                                            else { echo "<input type='checkbox' name='terasa'>Terasa"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>                                        
                                        <td>
                                            <?php
                                            if ($stan['t_novogradnja']) { echo "<input type='checkbox' name='novogradnja' checked>Novogradnja"; }
                                            else { echo "<input type='checkbox' name='novogradnja'>Novgradnja"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_renovirano']) { echo "<input type='checkbox' name='renovirano' checked>Renovirano"; }
                                            else { echo "<input type='checkbox' name='renovirano'>Renovirano"; }
                                            ?>
                                        </td>               
                                        </tr>
                                        <tr>
                                        <td>
                                            <?php
                                            if ($stan['t_lux']) { echo "<input type='checkbox' name='lux' checked>Lux"; }
                                            else { echo "<input type='checkbox' name='lux'>Lux"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_penthaus']) { echo "<input type='checkbox' name='penthaus' checked>Penthaus"; }
                                            else { echo "<input type='checkbox' name='penthaus'>Pentahus"; }
                                            ?>
                                        </td>
                                        </tr>    
                                        <tr>                                        
                                        <td>
                                            <?php
                                            if ($stan['t_salonski']) { echo "<input type='checkbox' name='salonski' checked>Salonski"; }
                                            else { echo "<input type='checkbox' name='salonski'>Salonski"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($stan['t_lodja']) { echo "<input type='checkbox' name='lodja' checked>Lođa"; }
                                            else { echo "<input type='checkbox' name='lodja'>Lođa"; }
                                            ?>
                                        </td>
                                        </tr>
                                    </table>
				</div>

				<div class="clear"></div>
				

				

				<div class="clear"></div>
				

				
				

			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>

		</div>
		<!-- end related-act-bottom -->

	</div>
	<!-- end related-activities -->
	

		

		

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>

<div class="clear"></div>


</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>


			</div>
			<!--  end table-content  -->

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
        </form>
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
