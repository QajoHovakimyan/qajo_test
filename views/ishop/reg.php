<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content-txt">	
    <h2>Գրանցում</h2>

    <form method="post" action="#">
        <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="zakaz-txt">Մուտքանուն*</td>
                <td class="zakaz-inpt"><input type="text" name="login" value="<?=$_SESSION['reg']['login']?>" /></td>
                <td class="zakaz-prim"></td>
            </tr>
            <tr>
                <td class="zakaz-txt">Գաղտնաբառ*</td>
                <td class="zakaz-inpt"><input type="password" name="pass" /></td>
                <td class="zakaz-prim"></td>
            </tr>
            <tr>
                <td class="zakaz-txt">ԱԱՀ*</td>
                <td class="zakaz-inpt"><input type="text" name="name" value="<?=$_SESSION['reg']['name']?>" /></td>
                <td class="zakaz-prim">Օրինակ. Արման Զավենի Գալստյան</td>
            </tr>
            <tr>
                <td class="zakaz-txt">Էլ. փոստ*</td>
                <td class="zakaz-inpt"><input type="email" name="email" value="<?=$_SESSION['reg']['email']?>" /></td>
                <td class="zakaz-prim">Օրինակ. a.galstyan55@mail.ru</td>
            </tr>
            <tr>
                <td class="zakaz-txt">Հեռախոս*</td>
                <td class="zakaz-inpt"><input type="text" name="phone" value="<?=$_SESSION['reg']['phone']?>" /></td>
                <td class="zakaz-prim">Օրինակ 095 188 733</td>
            </tr>
            <tr>
                <td class="zakaz-txt">Հասցե*</td>
                <td class="zakaz-inpt"><input type="text" name="address" value="<?=$_SESSION['reg']['addres']?>" /></td>
                <td class="zakaz-prim">Օրինակ. Ք. Երևան, Շիրազի 52 բն. 28</td>
            </tr>                
		</table>
        <input type="submit" name="reg" value="Գրանցվել" />
    </form>	
    
    <?php
    
    if(isset($_SESSION['reg']['res'])){
        echo $_SESSION['reg']['res'];
        unset($_SESSION['reg']);
    }
    
    ?>
    	
</div>