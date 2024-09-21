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


// 検索画面
$(function(){
    // こだわり検索モーダル
    $('#commitment').on('click', function(){
        let commitModal = $('#commitmentModal');
        if(commitModal.hasClass('hidden')){
            commitModal.removeClass('hidden');
        }else{
            commitModal.addClass('hidden');
        }
        $('#closeCommitModal').on('click' ,function(){
            commitModal.addClass('hidden');
        })

    });


    // エリア検索モーダル
    $('#area').on('click', function() {
        let ariaModal = $('#areaModal');
        if(ariaModal.hasClass('hidden')){
            ariaModal.removeClass('hidden');
        }else{
            ariaModal.addClass('hidden');
        }
        $('#closeAriaModal').on('click' ,function(){
            ariaModal.addClass('hidden');
        })
    });
})


