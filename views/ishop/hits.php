<?php defined('ISHOP') or die('Access denied'); ?>
<div class="catalog-index">
	<h1><img src="<?=TEMPLATE?>images/lider.jpg" alt="Ամենավաճառվողները" /></h1>
    <?php if($eyestoppers): ?>
    <?php foreach($eyestoppers as $eyestopper): ?>
    <div class="product-index">
		<h2><a href="?view=product&goods_id=<?=$eyestopper['goods_id']?>"><?=$eyestopper['name']?></a></h2>
		<a href="?view=product&goods_id=<?=$eyestopper['goods_id']?>"><img src="<?=TEMPLATE?>images/<?=$eyestopper['img']?>" alt="" /></a>
		<p><span>Գինը.  <?=$eyestopper['price']?> դրամ</span></p>
		<a href="?view=addtocart&goods_id=<?=$eyestopper['goods_id']?>"><img class="addtocard-index" src="<?=TEMPLATE?>images/addcard-index.jpg" alt="Ավելացնել զամբյուղ" /></a>
	</div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>Այս բաժնում ապրանքներ չկան</p>
<?php endif; ?>	
	<!--
    <div class="product-index">
		<h2><a href="#">Samsung Galaxy S5(G900H)</a></h2>
		<a href="#"><img src="<?=TEMPLATE?>images/phone-index_1.jpg" alt="" /></a>
		<p>Գինը.  <span>299500</span></p>
		<a href="#"><img class="addtocard-index" src="<?=TEMPLATE?>images/addcard-index.jpg" alt="Ավելացնել զամբյուղում" /></a>
	</div>
    -->
</div>