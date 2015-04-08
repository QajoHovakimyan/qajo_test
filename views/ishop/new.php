<?php defined('ISHOP') or die('Access denied'); ?>
<div class="catalog-index">
	<h1><img src="<?=TEMPLATE?>images/new.jpg" alt="Նորույթներ" /></h1>
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
</div>