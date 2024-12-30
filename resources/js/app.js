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


// 検索画面ー管理者画面
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

// ユーザ画面ーTOP画面の検索モーダル
$(function(){
    // こだわり検索モーダル
    $('#user_commitment').on('click', function(){
        let commitModal = $('#user_commitmentModal');
        if(commitModal.hasClass('hidden')){
            commitModal.removeClass('hidden');
        }else{
            commitModal.addClass('hidden');
        }
        $('#user_closeCommitModal').on('click' ,function(){
            commitModal.addClass('hidden');
        })
    });

    // こだわりクリアボタン
    $('#user_kodawari_clear').on('click', function(){
        $('#has_loyly').prop('checked', false);
        $('#has_water_bath').prop('checked', false);
        $('#has_outdoor_bath').prop('checked', false);
        $('#has_chair').prop('checked', false);
    });

    // エリア検索モーダル
    $('#user_area').on('click', function() {
        let ariaModal = $('#user_areaModal');
        if(ariaModal.hasClass('hidden')){
            ariaModal.removeClass('hidden');
        }else{
            ariaModal.addClass('hidden');
        }
        $('#user_closeAriaModal').on('click' ,function(){
            ariaModal.addClass('hidden');
        })
    });

    // エリアクリアボタン
    $('#user_area_clear').on('click', function(){
        $('#kanagawa').prop('checked', false);
        $('#gunma').prop('checked', false);
        $('#tokyo').prop('checked', false);
        $('#saitama').prop('checked', false);
        $('#chiba').prop('checked', false);
        $('#ibaraki').prop('checked', false);
    });
})
// ユーザ画面ー検索画面
$(function(){
    $('#clearForm').on('click' ,function(){
        keyWordClear();
        kodawariClear();
        ariaClear();
    })

    // こだわり検索モーダル
    let commitModal = $('#user_searchCommitmentModal');
    $('#user_search_commitment').on('click', function(){
        commitModal.removeClass('hidden');
    });
    $('#user_search_closeCommitModal').on('click' ,function(){
        commitModal.addClass('hidden');
    })
    $('#select_kodawari').on('click' ,function(){
        commitModal.addClass('hidden');
    })

    // こだわりクリアボタン
    $('#user_search_kodawari_clear').on('click', function(){
        kodawariClear();
    });

    // エリア検索モーダル
    let ariaModal = $('#user_searchAreaModal');
    $('#user_search_area').on('click', function() {
        ariaModal.removeClass('hidden');
    });
    $('#user_search_closeAriaModal').on('click' ,function(){
        ariaModal.addClass('hidden');
    })
    $('#select_area').on('click' ,function(){
        ariaModal.addClass('hidden');
    })

    // エリアクリアボタン
    $('#user_search_area_clear').on('click', function(){
        ariaClear();
    });


    const keyWordClear = function(){
        $('#name').val("");
    }

    const kodawariClear = function(){
        $('#has_loyly').prop('checked', false);
        $('#has_water_bath').prop('checked', false);
        $('#has_outdoor_bath').prop('checked', false);
        $('#has_chair').prop('checked', false);
    }

    const ariaClear = function(){
        $('#kanagawa').prop('checked', false);
        $('#gunma').prop('checked', false);
        $('#tokyo').prop('checked', false);
        $('#saitama').prop('checked', false);
        $('#chiba').prop('checked', false);
        $('#ibaraki').prop('checked', false);
    };
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

$(document).ready(function() {
    // モーダルとトリガーするボタン
    const $modal = $('#crud-modal');
    const $background = $('#crud-modal-background');
    const $openButton = $('#review_button');
    const $closeButton = $modal.find('[data-modal-toggle="crud-modal"]');

    // モーダルを開く
    $openButton.on('click', function() {
        $modal.removeClass('hidden').addClass('flex').attr('aria-hidden', 'false'); // hiddenを削除、flexを追加
        $background.removeClass('hidden');
    });

    // モーダルを閉じる
    $closeButton.on('click', function() {
        $modal.addClass('hidden').removeClass('flex').attr('aria-hidden', 'true'); // hiddenを追加、flexを削除
        $background.addClass('hidden');
    });
});

$(document).ready(function() {
    // let selectedRating = 0; // 選択された星の値を保持

    // // 星のクリックイベント
    // $('#rating-stars .star').on('click', function () {
    //     selectedRating = $(this).data('value'); // クリックされた星の値を取得

    //     // 全ての星をデフォルト状態に戻す
    //     $('#rating-stars .star').removeClass('text-yellow-500'); // 色をリセット

    //     // クリックした星まで色をつける
    //     for (let i = 1; i <= selectedRating; i++) {
    //         $(`#rating-stars .star[data-value="${i}"]`).addClass('text-yellow-500'); // 選択済みの星を黄色に
    //     }
    // });

    // $('#reviewForm').on('submit', function(e) {
    //     e.preventDefault(); // フォームのデフォルトの送信を防止

    //     // console.log('this:', this);//thisの中のデータをpickできるようにあとで変更する
    //     var formData = new FormData(this); // フォーム内の全データを取得
    //     console.log('送信データ:', formData);

    //     $.ajax({
    //         url: "/reviews", // サーバー側のエンドポイント
    //         type: 'POST',
    //         data: formData,
    //         processData: false, // jQuery によるデータの自動処理を無効化（送信するデータが FormData オブジェクト の場合必須）
    //         contentType: false, // コンテンツタイプの設定を無効化（FormData を使用してファイルやバイナリデータを含むデータを送信する場合必須）
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンの設定（Ajaxを使ったリクエストでは@csrfと書いてもトークンは含まれないので、ここに書く）
    //         },
    //     })
    //     .done(function(response) {
    //         // 成功時の処理
    //         alert('投稿が成功しました！');
    //     })
    //     .fail(function(xhr, status, error) {
    //         // エラー時の処理
    //         alert('投稿に失敗しました。');
    //     })
    //     .always(function() {
    //         // 成否に関わらず実行される処理
    //         console.log('リクエストが完了しました。');
    //     });
    // });
});



