import './bootstrap';
import $ from 'jquery';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// jQueryの読み込みが完了しているか確認
if (typeof $ === 'undefined') {
    console.error('jQuery が読み込まれていません。');
} else {
    console.log('jQuery が正常に読み込まれました。');
}


$(function(){
    // ボタンの定義
    const favoriteButton = $('#favorite_button');
    const favoriteIcon = $('#favorite_icon');
    const reviewButton = $('#review_button');
    const reviewIcon = $('#review_icon');

    // お気に入りボタン押下時の挙動
    favoriteButton.on('click', function(){
        if(favoriteButton.hasClass('bg-white')){
            favoriteButton.removeClass('bg-white');
            favoriteButton.addClass('bg-green-500');
            favoriteIcon.addClass('text-white');
        }else{
            favoriteButton.removeClass('bg-green-500');
            favoriteButton.addClass('bg-white');
            favoriteIcon.removeClass('text-white');
        }

    });

    // 口コミボタン押下時の挙動
    $('#review_button').on('click', function(){
        alert('コソコソ');
    })
});
