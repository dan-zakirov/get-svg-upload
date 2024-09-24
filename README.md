# Вывод SVG-иконки

## Использование функции air_get_svg_with_class

Задача функции заключается в том, чтобы визуально вывести саму иконку SVG, загруженную через WordPress, используя функцию air_get_svg_with_class. 

Важно: иконка должна выводиться непосредственно в HTML-коде, а не через тег <img>, чтобы можно было взаимодействовать с SVG-контентом напрямую

### Шаги для вывода SVG-иконки

1. Убедитесь, что у вас есть ID вложения SVG (например, полученное через ACF или другую форму загрузки медиа).
2. Вызовите функцию air_get_svg_with_class, передав ей ID этого вложения, чтобы вставить содержимое SVG напрямую в код страницы.

### Пример использования

php
// Получаем ID вложения (например, из поля ACF)
$icon_id = get_sub_field('icon_id'); // Замените 'icon_id' на ваше поле

// Выводим SVG-иконку, если ID существует
if ($icon_id) {
    echo get_svg_with_class($icon_id);
}
