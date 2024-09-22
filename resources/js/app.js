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

    // こだわりクリアボタン
    $('#kodawari_clear').on('click', function(){
        $('#has_loyly').prop('checked', false);
        $('#has_water_bath').prop('checked', false);
        $('#has_outdoor_bath').prop('checked', false);
        $('#has_chair').prop('checked', false);
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

    // エリアクリアボタン
    $('#area_clear').on('click', function(){
        $('#kanagawa').prop('checked', false);
        $('#gunma').prop('checked', false);
        $('#tokyo').prop('checked', false);
        $('#saitama').prop('checked', false);
        $('#chiba').prop('checked', false);
        $('#ibaraki').prop('checked', false);
    });
})


