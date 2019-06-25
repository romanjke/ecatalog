# Тестовое задание от компании &laquo;Консультант НПО&raquo; на должность &laquo;Разработчик интернет-решений&raquo;

## Описание задания

Электронный каталог предоставляет возможность сотрудникам библиотеки вести список книг, который потом публикуется на сайте. Все данные, введенные пользователями, сохраняются в БД MySQL.

Форма добавления записи в каталог должна иметь следующие поля:

- Наименование – текстовое поле (обязательное);
- Автор (или авторы) – выпадающий список с множественным выбором (обязательное);
- УДК – текстовое поле (обязательное);
- ББК – текстовое поле (обязательное);
- Дата публикации – поле ввода даты (обязательное);
- Место публикации – тестовое поле;
- Аннотация – тестовое поле.

На странице администратора список книг должен выводиться в виде таблицы с полями «Наименование», «Авторы», «Дата публикации» и «Классификация (УДК, ББК)». У каждой записи должна быть ссылка на редактирование и кнопка «Удалить». 

Список должен разбиваться на страницы по 20 элементов на каждой. Необходимо добавить возможность поиска по таблице. 

Приветствуется создания простейшего дизайна с использованием CSS. Можно использовать JS-скрипт.

## Установка

Для установки проекта необходимо использовать [Composer](https://getcomposer.org/)

**1.** Склонируйте репозиторий в нужную директорию

``` bash
git clone git@github.com:romanjke/ecatalog.git
```

**2.** В корне директории выполните

``` bash
composer install
```

**3.** Теперь необходимо настроить базу данных

**4.** Переименуйте файл `.env.example` в `.env`

**5.** Откройте его с помощью текстового редактора и установите следующие настройки базы данных:

Хост

```
    DB_HOST=localhost
```

Имя

```
    DB_DATABASE=ecatalog
```

Пользователь

```
    DB_USERNAME=root
```

Пароль

```
    DB_PASSWORD=
```

**6.** Выполните `artisan` команду

``` bash
php artisan migrate:fresh --seed
```

**7.** Установите `Node` зависимости. Для этого предварительно скачайте и установите [Node.js](https://nodejs.org/)

**8.** Выполните

``` bash
npm install
```

**9.** Готово!

## Учетные записи администраторов

- **Администратор**

  **Login:** admin@example.com

  **Password:** admin

## Лицензия

Проект находится под лицензией [MIT](http://opensource.org/licenses/MIT)