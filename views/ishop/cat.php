<?php defined('ISHOP') or die('Access denied'); ?>
<div class="catalog-index">
    
    <div class="kroshka">
		<<a href="#">Բջջային հեռախոսներ</a> / <a href="#">LG</a> / <span>Touch phone</span>
	</div> 
    <div class="vid-sort">
		<div class="vid-sort">
				Տեսքը. <a href="#" id="grid" class="grid_list"><img src="<?=TEMPLATE?>images/vid-tabl.gif" title="Աղյուսակային տեսք" alt="Աղյուսակային տեսք" /></a>
                     <a href="#" id="list" class="grid_list"><img src="<?=TEMPLATE?>images/vid-line.gif" title="Գծային տեսք" alt="Գծային տեսք" /></a>  
					  &nbsp;&nbsp;           
					  Դասավորել ըստ.&nbsp;    
						<a href="#" class="sort-bot-act">Արժեքի</a>  &nbsp;|&nbsp;     
						<a href="#" class="sort-bot">Անվանման</a>  &nbsp;|&nbsp;     
						<a href="#" class="sort-bot">Ավելացման</a>
		</div>
       </div>
<?php if($products): // Եթե ապրանքներ գոյություն ունեն ?>
<?php foreach($products as $product): ?>
<?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == 'grid'): // Եթե տեսքը աղյուսակային է ?>
<!-- Աղյուսակային տեսք -->				
<div class="product-table">
	<h2><a href="?view=product&goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
	<div class="product-table-img">
		<a href="?view=product&goods_id=<?=$product['goods_id']?>"><img src="<?=TEMPLATE?>images/<?=$product['img']?>" alt="" width="64" /></a>
		<div>
            <?php if($product['hits']) echo '<img src="' .TEMPLATE. 'images/ico-cat-lider.png" alt="Ամենավաճառվողները" />'; ?>
            <?php if($product['new']) echo '<img src="' .TEMPLATE. 'images/ico-cat-new.png" alt="Նորույթներ" />'; ?>
            <?php if($product['sale']) echo '<img src="' .TEMPLATE. 'images/ico-cat-sale.png" alt="Զեղչեր" />'; ?>							
		</div>
	</div>
	<p class="cat-table-more"><a href="?view=product&goods_id=<?=$product['goods_id']?>">Ավելին...</a></p>
	<p>Գինը  <span><?=$product['price']?></span></p>
	<a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="addtocard-index" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Ավելացնել զամբյուղ" /></a>
</div> <!-- .product-table -->
<!-- Աղյուսակային տեսք -->
<?php else: // Եթե տեսքը գծային է ?>
<!-- Գծային տեսք -->
<div class="product-line">					
	<div class="product-line-img">
		<a href="?view=product&goods_id=<?=$product['goods_id']?>"><img src="<?=TEMPLATE?>images/<?=$product['img']?>" width="48" height="94" alt="" /></a>
	</div>
	<div class="product-line-price">
		<p>Գինը  <span><?=$product['price']?></span></p>
		<a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="addtocard-index" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Ավելացնել զամբյուղ" /></a>
		<div>
			<?php if($product['hits']) echo '<img src="' .TEMPLATE. 'images/ico-line-lider.jpg" alt="Ամենավաճառվողները" />'; ?>
            <?php if($product['new']) echo '<img src="' .TEMPLATE. 'images/ico-line-new.jpg" alt="Նորույթներ" />'; ?>
            <?php if($product['sale']) echo '<img src="' .TEMPLATE. 'images/ico-line-sale.jpg" alt="Զեղչեր" />'; ?>
		</div>
		<p class="cat-line-more"><a href="?view=addtocart&goods_id=<?=$product['goods_id']?>">Ավելին...</a></p>
	</div>	
	<div class="product-line-opis">
		<h2><a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
		<p><?=$product['anons']?></p>
	</div>	
</div>
<!-- Գծային տեսք -->
<?php endif; // Տեսքերի միացման պայմանի վերջ  ?>
<?php endforeach; ?>
<?php else: ?>
    <p>Այս բաժնում դեռևս ապրանքներ չկան</p>
<?php endif; ?>				
</div> <!-- .catalog-index -->
