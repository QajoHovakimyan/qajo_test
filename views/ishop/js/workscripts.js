$(document).ready(function(){
    
    /* ===Аккордеон=== */
    var openItem = false;
	if(jQuery.cookie("openItem") && jQuery.cookie("openItem") != 'false'){
		openItem = parseInt(jQuery.cookie("openItem"));
	}	
	jQuery("#accordion").accordion({
		active: openItem,
		collapsible: true,
        autoHeight: false,
        header: 'h3'
	});
	jQuery("#accordion h3").click(function(){
		jQuery.cookie("openItem", jQuery("#accordion").accordion("option", "active"));
	});	
	jQuery("#accordion > li").click(function(){
		jQuery.cookie("openItem", null);
        var link = jQuery(this).find('a').attr('href');
        window.location = link;
	});
    /* ===Аккордеон=== */
    
    /* ===Переключатель вида=== */
    if($.cookie("display") == null){
        $.cookie("display", "grid");
    }
    
    $(".grid_list").click(function(){
        var display = $(this).attr("id"); // получаем значение переключателя вида
        display = (display == "grid") ? "grid" : "list"; // допустимые значения
        if(display == $.cookie("display")){
            // если значение совпадает с кукой - ничего не делаем
            return false;   
        }else{
            // иначе - установим куку с новым значением вида
            $.cookie("display", display);
            window.location = "?" + query;
            return false;
        }
    });
    /* ===Переключатель вида=== */
    
    /* ===Авторизация=== */
	 $("#auth").click(function(e){
        e.preventDefault();
        var login = $("#login").val();
        var pass = $("#pass").val();
        var auth = $("#auth").val();
        $.ajax({
           url: './',
           type: 'POST',
           data: {auth: auth, login: login, pass: pass},
           success: function(res){
                if(res != 'Մուտքանունը և գաղտնաբառը պարտադիր են լրացման համար' && res != 'Սխալ մուտքանուն կամ գաղտնաբառ'){
                    // если пользователь успешно авторизован
                    $(".authform").hide().fadeIn(500).html(res + '<a href="?do=logout">Ելք</a>');
                    // удаляем лишние поля заказа
                    $(".notauth").fadeOut(500);
                    setTimeout(function(){
                        $(".notauth").remove();
                    }, 500);
                }else{
                    // если авторизация неудачна
                    $(".error").remove();
                    $(".authform").append('<div class="error"></div>');
                    $(".error").hide().fadeIn(500).html(res);
                }
           },
           error: function(){
                alert("Error!");
           }
        });
    });
	    /* ===Клавиша ENTER при пересчете=== */
	$(".kolvo").keypress(function(e){
        if(e.which == 13){
            return false;
        }
    });
   /* ===Пересчет товаров в корзине=== */
    $(".kolvo").each(function(){
       var qty_start = $(this).val(); // кол-во до изменения
       
       $(this).change(function(){
           var qty = $(this).val(); // кол-во перед пересчетом
           var res = confirm("Վերահաշվարկե՞լ");
           if(res){
                var id = $(this).attr("id");
                id = id.substr(2);
                if(!parseInt(qty)){
                    qty = qty_start;
                }
                // передаем параметры
                window.location = "?view=cart&qty=" + qty + "&id=" + id;
           }else{
                // если отменен пересчет корзины
                $(this).val(qty_start);
           }
       }); 
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});