jQuery(document).ready(function($) {
    /*
     * Общие настройки ajax-запросов, отправка на сервер csrf-токена
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*
     * Автоматическое создание slug при вводе name (замена кириллицы на латиницу)
     */
    $('input[name="name"]').on('input', function() {
        var map = {
            'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'H', 'Ґ': 'G', 'Д': 'D', 'Е': 'E', 'Є': 'Ye', 'Ж': 'Zh',
            'З': 'Z', 'И': 'Y', 'І': 'I', 'Ї': 'Yi', 'Й': 'Y', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N',
            'О': 'O', 'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'Kh', 'Ц': 'Ts',
            'Ч': 'Ch', 'Ш': 'Sh', 'Щ': 'Shch', 'Ь': '', 'Ю': 'Yu', 'Я': 'Ya',
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'h', 'ґ': 'g', 'д': 'd', 'е': 'e', 'є': 'ye', 'ж': 'zh',
            'з': 'z', 'и': 'y', 'і': 'i', 'ї': 'yi', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
            'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'kh', 'ц': 'ts',
            'ч': 'ch', 'ш': 'sh', 'щ': 'shch', 'ь': '', 'ю': 'yu', 'я': 'ya',
        };
        var text = $(this).val();
        var transformedText = '';
        for (var i = 0; i < text.length; i++) {
            var char = text[i];
            if (map.hasOwnProperty(char)) {
                transformedText += map[char];
            } else {
                transformedText += char;
            }
        }
        transformedText = transformedText.replace(/[^a-zA-Z0-9 ]/g, '');
        transformedText = transformedText.replace(/\s+/g, '-');
        transformedText = transformedText.replace(/-+/g, '-');
        $('input[name="slug"]').val(transformedText.toLowerCase());
    });
    /*
     * Подключение wysiwyg-редактора для редактирования контента страницы
     */
    $('textarea[id="editor"]').summernote({
        lang: 'ru-RU',
        height: 300,
        callbacks: {
            /*
             * При вставке изображения загружаем его на сервер
             */
            onImageUpload: function(images) {
                for (var i = 0; i < images.length; i++) {
                    uploadImage(images[i], this);
                }
            },
            /*
             * При удалении изображения удаляем его на сервере
             */
            onMediaDelete: function(target) {
                removeImage(target[0].src);
            }
        }
    });
    /*
     * Загружает на сервер вставленное в редакторе изображение
     */
    function uploadImage(image, textarea) {
        var data = new FormData();
        data.append('image', image);
        $.ajax({
            data: data,
            type: 'POST',
            url: '/admin/page/upload/image',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                $(textarea).summernote('insertImage', data.image, function ($img) {
                    $img.css('max-width', '100%');
                });
            },
            error: function (reject) {
                $.each(reject.responseJSON.errors, function (key, value) {
                    alert(value);
                });
            }
        });
    }
    /*
     * Удаляет на сервере удаленное в редакторе изображение
     */
    function removeImage(src) {
        $.ajax({
            data: {'image': src, '_method': 'DELETE'},
            type: 'POST',
            url: '/admin/page/remove/image',
            cache: false,
            success: function(data) {
                console.log(data);
            }
        });
    }
});
