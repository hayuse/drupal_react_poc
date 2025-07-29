// sort-handler.js
document.addEventListener('htmx:load', function (event) {
  // .sortable-js クラスを持つ要素を探す
  const sortableElement = event.detail.elt.querySelector('.sortable-js');

  if (sortableElement) {
    // Sortable.jsを初期化
    new Sortable(sortableElement, {
      animation: 150,
      handle: '.handle', // ドラッグの起点となるハンドル（オプション）
      // ドラッグ＆ドロップが完了したときのイベント
      onEnd: function (evt) {
        // 並び替えられたIDのリストを取得
        const sortedIds = Array.from(evt.to.children).map(
          (child) => child.dataset.id
        );

        // 非表示フォームのinputにIDのリストをセット
        const form = document.getElementById('sort-form');
        // 既存のinputをクリア
        form.innerHTML = '';
        // 新しい順序でinputを追加
        sortedIds.forEach((id) => {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'item[]';
          input.value = id;
          form.appendChild(input);
        });

        // HTMXにフォームのPOSTを依頼する
        htmx.trigger('#sort-form', 'submit');
      },
    });
  }
});
