<?php defined('ISHOP') or die('Access denied'); ?>
<div id="right-bar">
            <div class="right-bar-cont">
                <div class="enter">
                    <h2><span>Մուտք</span></h2>
                    <div class="authform">
                <?php if(!$_SESSION['auth']['user']): ?>
                <form method="post" action="#">
                    <label for="login">Մուտքանուն: </label><br />
                    <input type="text" name="login" id="login" /><br />
                    <label for="pass">Գաղտնաբառ </label><br />
                    <input type="password" name="pass" id="pass" /><br /><br />
                    <input type="submit" name="auth" id="auth" value="Մուտք" />
                    <p class="link"><a href="?view=reg">Գրանցվել</a></p>
                </form>
                <?php
                    if(isset($_SESSION['auth']['error'])){
                        echo $_SESSION['auth']['error'];
                        unset($_SESSION['auth']);
                    }
                ?>
                <?php else: ?>
                    <p>Բարի գալուստ <?=htmlspecialchars($_SESSION['auth']['user'])?></p>
                    <a href="?do=logout">Ելք</a>
                <?php endif; ?>
			</div>	
		</div>
                <div class="basket">
					<h2><span>Զամբյուղ</span></h2>
					<div>
                    <?php if($_SESSION['total_quantity']): ?>
                            Ձեր զամբյուղում առկա է<br />
                            <span><?=$_SESSION['total_quantity']?></span>, գումարը <span><?=$_SESSION['total_sum']?></span> դրամ.
                            <a href="?view=cart"><img src="<?=TEMPLATE?>images/zamb.jpg" alt="" /></a>
                            <?php else: ?>
                            Ձեր զամբյուղը դատարկ է                          
                        <?php endif; ?>
                    <!--
					<p>Ձեր զամբյուղում առկա է<br /><span>1</span> ապրանք, <span>30459</span> դրամ</p>
					<a href="#"><img src="<?=TEMPLATE?>images/zamb.jpg" alt="" /></a>
					</div>
                    -->
				</div>
                <div class="share-search">
				<h2><span>Ընտրացանկ</span></h2>
				<div>
					<form method="post" action="">
					<p>Արժեքը</p>
					<input class="podbor-price" type="text" name="start-price" />
				~~~ <input class="podbor-price" type="text" name="end-price" /> դրամ
					 <br /><br />
					<p>Ընտրեք արտադրողին</p>
					<select>
						<option>Alcatel</option>
						<option>Samsung</option>
						<option>Apple</option>
						<option>Motorola</option>
						<option>NEC</option>
						<option>Nokia</option>		
                        <option>LG</option>
                        <option>HTC</option>
                        <option>FLY</option>				
					</select>						
					<input class="podbor" type="image" src="<?=TEMPLATE?>images/podbor.jpg" />						
					</form>
				</div>
			</div>
            </div>
        </div></div>