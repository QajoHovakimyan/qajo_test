<?php defined('ISHOP') or die('Access denied'); ?>
<div id="content-zakaz">
	<h2>Պատվերի ձևակերպում</h2>
 	<?php if(isset($_SESSION['order']['res'])){ echo $_SESSION['order']['res']; } ?>
	<?php if($_SESSION['cart']): // ստուգում ենք արդյոք զամբյուղում ապրանքներ առկա են ?>
	<table class="zakaz-maiin-table" border="0" cellspacing="0" cellpadding="0">
	<form method="post" action="">
	  <tr>
		<td class="z_top">Ապրանքի անվանումը</td>
		<td class="z_top" align="center">Քանակը</td>
		<td class="z_top" align="center">Արժեք</td>
		<td class="z_top" align="center">&nbsp;</td>
	  </tr>
	 <?php foreach($_SESSION['cart'] as $key => $item): ?>
	  <tr>
		<td class="z_name">
			<a href="#"><img src="<?=PRODUCTIMG?><?=$item['img']?>" width="32" title="" /></a> 
			<a href="#"><br><?=$item['name']?></a>
		</td>
		<td class="z_kol"><input id="id<?=$key?>" class="kolvo" type="text" value="<?=$item['qty']?>" name="" /></td>
		<td class="z_price"><?=$item['price']?></td>
		<td class="z_del"><a href="?view=cart&delete=<?=$key?>"><img src="<?=TEMPLATE?>images/delete.jpg" title="Մաքրել ապրանքը զամբյուղից" /></a></td>
	  </tr>
<?php endforeach; ?>
	  <tr>
		<td class="z_bot">&nbsp;&nbsp;&nbsp;&nbsp;Ընդամենը</td>
		<td class="z_bot" colspan="3" align="right"><?=$_SESSION['total_quantity']?> հատ ,&nbsp;&nbsp;&nbsp; <?=$_SESSION['total_sum']?> դրամ</td>
	  </tr>
	  
	</table>
	
	<div class="sposob-dostavki">
		<h4>Առաքման տեսակը</h4>
        <?php foreach($dostavka as $item): ?>
        <p><input type="radio" name="dostavka" value="<?=$item['dostavka_id']?>" /> <?=$item['name']?></p>
        <?php endforeach; ?>
        <!--
			<p><input type="radio" name="1" value="1" /> Կուրիերի միջոցով, 1500 դրամ</p> 
			<p><input type="radio" name="1" value="2" /> Փոստի միջոցով, 1000 դրամ</p> 
			<p><input type="radio" name="1" value="3" /> Ինքնաառաքում, անվճար</p> 
        -->
	</div>		
	
	
	<h3>Տվյալներ առաքման համար</h3>
	<?php if(!$_SESSION['auth']['user']): // Մուտքի ստուգում ?>
	<table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
			  <tr class="notauth">
				<td class="zakaz-txt">ԱԱՀ</td>
				<td class="zakaz-inpt"><input type="text" name="name" value="<?=$_SESSION['order']['name']?>" /></td>
				<td class="zakaz-prim">Օրինակ. Արման Զավենի Գալստյան</td>
			  </tr>
			  <tr class="notauth">
				<td class="zakaz-txt">Էլ. փոստ</td>
				<td class="zakaz-inpt"><input type="email" name="email" value="<?=$_SESSION['order']['email']?>" /></td>
				<td class="zakaz-prim">Օրինակ. a.galstyan55@mail.ru</td>
			  </tr>
			  <tr class="notauth">
				<td class="zakaz-txt">Հեռախոս</td>
				<td class="zakaz-inpt"><input type="text" name="phone" value="<?=$_SESSION['order']['phone']?>" /></td>
				<td class="zakaz-prim">Օրինակ. +37495 188 733</td>
			  </tr>
			  <tr class="notauth">
				<td class="zakaz-txt">Հասցե</td>
				<td class="zakaz-inpt"><input type="text" name="address" value="<?=$_SESSION['order']['addres']?>" /></td>
				<td class="zakaz-prim">Օրինակ. ք. Երևան, Շիրազի 52, բն. 28</td>
			  </tr>
			  <tr>
				<td class="zakaz-txt" style="vertical-align:top;">Նշումներ </td>
				<td class="zakaz-txtarea"><textarea name="prim"><?=$_SESSION['order']['prim']?></textarea></td>
				<td class="zakaz-prim" style="vertical-align:top;">Օրինակ. Խնդրում եմ զանգահարել երեկոյան 6 - ից հետո, մինչ այդ ես աշխատանքի եմ </td>
			  </tr>
			</table>
		<?php else: // Եթե գրանցված այցելու է ?>
        <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
        	  <tr>
				<td class="zakaz-txt" style="vertical-align:top;">Նշումներ </td>
				<td class="zakaz-txtarea"><textarea name="prim"></textarea></td>
				<td class="zakaz-prim" style="vertical-align:top;">Օրինակ. Խնդրում եմ զանգահարել երեկոյան 6 - ից հետո, մինչ այդ ես աշխատանքի եմ </td>
			  </tr>
	</table>
    <?php endif; // Պայմանի վերջ ?>	
		<input type="image" name="order" src="<?=TEMPLATE?>images/zakazat.jpg" /> 
		<br /><br /><br /><br />
	<?php unset($_SESSION['order']); ?>
	</form>
    <?php else: // Եթե զամբյուղը դատարկ է ?>
        <p>Ձեր զամբյուղը դատարկ է</p>
    <?php endif; ?>
</div>