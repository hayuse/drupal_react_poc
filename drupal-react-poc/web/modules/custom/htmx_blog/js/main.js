// sort-handler.js
document.addEventListener('htmx:load', function (event) {
  // .sortable-js クラスを持つ要素を探す
  const sortableElement = event.detail.elt.querySelector('.sortable-js');

  if (sortableElement) {
    // Sortable.jsを初期化
    new Sortable(sortableElement, {
      animation: 150,
      handle: '.handle',
      onEnd: function (evt) {
        const sortedIds = Array.from(evt.to.children).map(
          (child) => child.dataset.id
        );

        const form = document.getElementById('sort-form');
        form.innerHTML = '';
        sortedIds.forEach((id) => {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'item[]';
          input.value = id;
          form.appendChild(input);
        });

        htmx.trigger('#sort-form', 'submit');
      },
    });
  }
});
