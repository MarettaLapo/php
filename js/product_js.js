$(function(){
    const productCount = $('.product__adding-input'); 
    const mainImage = $('.product__picture--picture').attr('src');
    $('.product__adding-plus').click(function(){
        let currentInput = parseInt(productCount.val());
        $('.product__adding-input').val(currentInput + 1);
        $('.product__adding-minus').addClass('product__adding--able');
    });
    $('.product__adding-minus').click(function(){
        let currentInput =parseInt(productCount.val());
        if(currentInput < 2){
            return false;
        }
        else{
            $('.product__adding-input').val(currentInput - 1);
        }   
        if(currentInput == 2){
            $('.product__adding-minus').removeClass('product__adding--able');
        }    
    });
    $('.product__adding-input').change(function() {
        let currentInput = parseInt(productCount.val());
        if(!currentInput || currentInput < 0){
            $('.product__adding-input').val(1);
            $('.product__adding-minus').removeClass('product__adding--able');
        }
        else{
            $('.product__adding-input').val(Math.round(currentInput));
            if(currentInput == 1){
                $('.product__adding-minus').removeClass('product__adding--able');
            } 
            else{
                $('.product__adding-minus').addClass('product__adding--able');
            }
        }
    });
    $('.product__adding-button--blue').click(function(){
        let currentInput = parseInt(productCount.val());

        currentInput == '1' ? $('.product__adding-button--blue').notify("В корзину добавлен " + currentInput + " товар","info") 
        : currentInput == '2' || currentInput == '3' || currentInput == '4' ? $('.product__adding-button--blue').notify("В корзину добавлено " + currentInput + " товара","info")
        : $('.product__adding-button--blue').notify("В корзину добавлено " + currentInput + " товаров","info");
        
    });

    $('.product__gallery-image img').mouseover(function(){
        let image = $(this).attr('src');
        $('.product__picture--picture').attr('src', image);
    });
    $('.product__gallery-image img').mouseout(function(){
        $('.product__picture--picture').attr('src', mainImage);
    });
});