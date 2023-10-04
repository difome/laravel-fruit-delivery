$(document).ready(function() {
    // Удаляем существующие обработчики событий
    $(".plus").off('click');
    $(".minus").off('click');
    $(".quantity").off('change');

    // Обработчик для кнопки "plus"
    $(".plus").click(function() {
        var input = $(this).closest('.input-group').find('.quantity');
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            input.val(currentVal + 1);
            updateTotalPrice(input);
        }
    });

    // Обработчик для кнопки "minus"
    $(".minus").click(function() {
        var input = $(this).closest('.input-group').find('.quantity');
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            input.val(currentVal - 1);
            updateTotalPrice(input);
        }
    });

    // Обработчик изменения количества вручную
    $(".quantity").change(function() {
        updateTotalPrice($(this));
    });

    // Функция для обновления суммы
    function updateTotalPrice(input) {
        var productId = input.data('product-id');
        var productPrice = parseFloat(input.closest('.add-to-basket').find('.sum[data-input-id="sum-' + productId + '"]').data('price'));
        var quantity = parseInt(input.val());
        if (!isNaN(productPrice) && !isNaN(quantity)) {
            var totalPrice = (productPrice * quantity).toFixed(2);
            input.closest('.add-to-basket').find('.sum[data-input-id="sum-' + productId + '"]').text(totalPrice);
        }
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const editButton = document.getElementById("editButton");
    const cancelButton = document.getElementById("cancelButton");
    const profileEditTab = document.getElementById("profileEdit");
    const profileViewTab = document.getElementById("profileView");

    // Обработчик события клика на кнопку "Редагувати"
    editButton.addEventListener("click", function() {
        // Скрываем вкладку "Перегляд" и отображаем вкладку "Редагувати"
        profileEditTab.classList.add("show", "active");
        profileViewTab.classList.remove("show", "active");
    });

    // Обработчик события клика на кнопку "Відмінити"
    cancelButton.addEventListener("click", function() {
        // Скрываем вкладку "Редагувати" и отображаем вкладку "Перегляд"
        profileEditTab.classList.remove("show", "active");
        profileViewTab.classList.add("show", "active");
    });
});
