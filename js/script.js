/*global $*/

$(function(){
    const images = ['images/orangeflower.jpg', 'images/lavender.jpg', 'images/apricots.jpg', 'images/Camomile.jpg', 'images/basil.jpg']
    let count = 1;
    
    //画像をすり替える処理
    //コールバック関数　→　別の関数の引数になる
    const change_image = () => {
        $('#top img').animate({'opacity': '0'}, 2000, function(){
            $('#top img').prop('src', images[count]);
            $('#top img').animate({'opacity': '1'}, 2000);
            count++;
            
            if(count === images.length){
                count = 0;
            }
        });
    }
    setInterval(change_image, 5000);

});