<?php defined('ISHOP') or die('Access denied'); ?>
<div id="left-bar">
        	<div class="left-bar-content">
            	<h2><span>Կատալոգ</span></h2>
                <h3 class="nav-new"><a href="?view=new">Նորույթներ</a></h3>
                <h3 class="nav-lider"><a href="?view=hits">Ամենավաճառվողները</a></h3>
                <h3 class="nav-sale"><a href="?view=sale">Զեղչեր</a></h3>
                <!-- Կատեգորիաների մենյու -->
                <h4><span>Բջջային հեռախոսներ</span></h4>
			<ul class="nav-catalog" id="accordion">
                    <?php foreach($cat as $key => $item): ?>
                        <?php if(count($item) > 1): // Եթե սա ծնողի կատեգորիա է ?>
                        <h3><li><a href="#"><?=$item[0]?></a></li></h3>
                            <ul>
                                <li><a href="?view=cat&category=<?=$key?>">Բոլորը</a></li>
                                <?php foreach($item['sub'] as $key => $sub): ?>
                                <li><a href="?view=cat&category=<?=$key?>"><?=$sub?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif($item[0]): // Եթե սա ինքնուրույն կատեգորիա է ?>
                            <li><a href="?view=cat&category=<?=$key?>"><?=$item[0]?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
			</ul>
            <!-- Վերջ Կատեգորիաների մենյու -->
            <div class="bar-contact">
				<h4><span>Կապվեք մեզ հետ</span></h4>
				<p><strong>Հեռախոս</strong><br><span>(+37495) 188-733</span></p>
				<p><strong>Էլ. փոստ</strong><br><span>info@g-servicing.com</span></p>
			</div>
            <div class="news">
				<h4><span>Նորություններ</span></h4>
				<p><span>24.05.2014</span>
					<a href="#">Նոր հեռախոսներ` Samsung - ից</a>	
				</p>
				<p><span>24.03.2012</span>
					<a href="#">Գնիր iPhone և ստացիր նվերներ</a>	
				</p>
                <a href="#" class="news-arh">Արխիվ</a>
			</div>
            <!-- Ինֆորմերների մենյու -->
            <?php foreach($informers as $informer): ?>
            	<div class="info">
                    <h4><span><?=$informer[0]?></span></h4>
                    <?php foreach($informer['sub'] as $key => $sub): ?>
                    <p>- <a href="?view=informer&id=<?=$key?>"><?=$sub?></a></p>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            <!-- Վերջ Ինֆորմերների մենյու --> 
            </div>
        </div>