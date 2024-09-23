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

$(function(){
    const maxRows = 5;
    let rowCount = $('#sauna-table-body tr').length;

    function createNewRow() {
        return `
            <tr>
                <td class="px-4 py-3">
                    <select name="sauna_type[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <option value="1">乾式サウナ（ドライサウナ）</option>
                        <option value="2">湿式サウナ（スチームサウナ）</option>
                        <option value="3">湿式サウナ（ミストサウナ）</option>
                        <option value="4">ロウリュサウナ</option>
                    </select>
                </td>
                <td class="px-4 py-3">
                    <input type="text" name="temperature[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </td>
                <td class="px-4 py-3 text-right">
                    <textarea name="note[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </td>
                <td class="px-4 py-3">
                    <button type="button" class="remove-row bg-red-500 text-white px-4 py-2 rounded">削除</button>
                </td>
            </tr>
        `;
    }

    // Add Row Button Click Event
    $('#add-row').click(function() {
        if(rowCount < maxRows) {
            $('#sauna-table-body').append(createNewRow());
            rowCount++;
        } else {
            alert('最大5行まで追加できます。');
        }
    });

    // Remove Row Button Click Event (using event delegation)
    $('#sauna-table-body').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        rowCount--;
    });
});


