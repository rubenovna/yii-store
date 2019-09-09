/*price range*/

$('#sl2').slider();
$('.catalog').dcAccordion({
    speed: 300,
});

//делаем для корзины ajax запрос чтобы при выборе товара страница не перезагружалась,
//передаем данные в выпадающию окно которую сделали с помощью js - modal в бутсрапе
/*function showCart(cart) {
    $('#cart.modal-body').html(cart);
    $('#cart').modal();

}*/

function showCart(cart){
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

  //описываем фукнкцию которай будет вызывать карзину на главной странице при клике на  Cart в head-де



 function getCart(){

    //отправляем ajax запрос
     $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
     //alert(123);
    //отменяем переход по сылке
     return false;

 }



// не создаем а иммено делегируем  (это из за того что наша корзина динамическая) событие
// для удаление из карзины определенного товара для этого обрашаемся к родительскому элементу #cart .modal-body
// а уже потом для него делегируем событие вешаем событии на del-item

$('#cart .modal-body').on('click','.del-item',  function () {
    var id = $(this).data('id');
    //console.log(id);
    //передаем все на сервер через  ajax
        $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });


});


// ,берем кнопку то есть его класс add-to-cart (указан в файле index.php) и вешаем
// на него сабытие клик с определенной функцией при нашатие каторой будет срабатывать
// это фукция поевляется окно в котором указаны наши выбраные тавары карзина виде сплвающего окна


$('.add-to-cart').on('click', function (e) {
    //отменяем переход по ссылке
    e.preventDefault();
    var id = $(this).data('id');
     var qty = $('#qty').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка!');
            console.log(res);
            //showCart(res);

            showCart(res);

        },
        error: function () {
            alert('Error!');

        }
    });


});


var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});
