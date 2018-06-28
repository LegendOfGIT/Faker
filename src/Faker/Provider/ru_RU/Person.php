<?php

namespace Faker\Provider\ru_RU;

use Faker\Provider\PersonProvider;
use Faker\Provider\Provider;

/**
 * Russian person provider
 */
class Person implements Provider, PersonProvider
{
    /**
     * {@link} http://ru.wikipedia.org/wiki/%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%BE%D0%B5_%D0%BB%D0%B8%D1%87%D0%BD%D0%BE%D0%B5_%D0%B8%D0%BC%D1%8F
     * {@link} http://masterrussian.com/aa031701a.shtml
     **/
    protected static $firstNameMale = [
        'Абрам', 'Август', 'Адам', 'Адриан', 'Аким', 'Александр', 'Алексей', 'Альберт', 'Ананий', 'Анатолий', 'Андрей', 'Антон', 'Антонин',
        'Аполлон', 'Аркадий', 'Арсений', 'Артемий', 'Артур', 'Артём', 'Афанасий', 'Богдан', 'Болеслав', 'Борис', 'Бронислав', 'Вадим',
        'Валентин', 'Валериан', 'Валерий', 'Василий', 'Вениамин', 'Викентий', 'Виктор', 'Виль', 'Виталий', 'Витольд', 'Влад', 'Владимир',
        'Владислав', 'Владлен', 'Всеволод', 'Вячеслав', 'Гавриил', 'Гарри', 'Геннадий', 'Георгий', 'Герасим', 'Герман', 'Глеб', 'Гордей',
        'Григорий', 'Давид', 'Дан', 'Даниил', 'Данила', 'Денис', 'Дмитрий', 'Добрыня', 'Донат', 'Евгений', 'Егор', 'Ефим',
        'Захар', 'Иван', 'Игнат', 'Игнатий', 'Игорь', 'Илларион', 'Илья', 'Иммануил', 'Иннокентий', 'Иосиф', 'Ираклий', 'Кирилл',
        'Клим', 'Константин', 'Кузьма', 'Лаврентий', 'Лев', 'Леонид', 'Макар', 'Максим', 'Марат', 'Марк', 'Матвей', 'Милан',
        'Мирослав', 'Михаил', 'Назар', 'Нестор', 'Никита', 'Никодим', 'Николай', 'Олег', 'Павел', 'Платон', 'Прохор', 'Пётр',
        'Радислав', 'Рафаил', 'Роберт', 'Родион', 'Роман', 'Ростислав', 'Руслан', 'Сава', 'Савва', 'Святослав', 'Семён', 'Сергей',
        'Спартак', 'Станислав', 'Степан', 'Стефан', 'Тарас', 'Тимофей', 'Тимур', 'Тит', 'Трофим', 'Феликс', 'Филипп', 'Фёдор',
        'Эдуард', 'Эрик', 'Юлиан', 'Юлий', 'Юрий', 'Яков', 'Ян', 'Ярослав', 'Милан',
    ];

    /**
     * {@link} http://masterrussian.com/aa031001a.shtml
     **/
    protected static $firstNameFemale = [
        'Александра', 'Алина', 'Алиса', 'Алла', 'Альбина', 'Алёна', 'Анастасия', 'Анжелика', 'Анна', 'Антонина', 'Анфиса', 'Валентина', 'Валерия',
        'Варвара', 'Василиса', 'Вера', 'Вероника', 'Виктория', 'Владлена', 'Галина', 'Дарья', 'Диана', 'Дина', 'Доминика', 'Ева',
        'Евгения', 'Екатерина', 'Елена', 'Елизавета', 'Жанна', 'Зинаида', 'Злата', 'Зоя', 'Изабелла', 'Изольда', 'Инга', 'Инесса',
        'Инна', 'Ирина', 'Искра', 'Капитолина', 'Клавдия', 'Клара', 'Клементина', 'Кристина', 'Ксения', 'Лада', 'Лариса', 'Лидия',
        'Лилия', 'Любовь', 'Людмила', 'Люся', 'Майя', 'Мальвина', 'Маргарита', 'Марина', 'Мария', 'Марта', 'Надежда', 'Наталья',
        'Нелли', 'Ника', 'Нина', 'Нонна', 'Оксана', 'Олеся', 'Ольга', 'Полина', 'Рада', 'Раиса', 'Регина', 'Рената',
        'Розалина', 'Светлана', 'Софья', 'София', 'Таисия', 'Тамара', 'Татьяна', 'Ульяна', 'Фаина', 'Федосья', 'Флорентина', 'Эльвира', 'Эмилия',
        'Эмма', 'Юлия', 'Яна', 'Ярослава',
    ];

    /**
     * {@link} http://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%BE%D0%B1%D1%89%D0%B5%D1%80%D1%83%D1%81%D1%81%D0%BA%D0%B8%D1%85_%D1%84%D0%B0%D0%BC%D0%B8%D0%BB%D0%B8%D0%B9
     **/
    protected static $lastName = [
        'Смирнов', 'Иванов', 'Кузнецов', 'Соколов', 'Попов', 'Лебедев', 'Козлов',
        'Новиков', 'Морозов', 'Петров', 'Волков', 'Соловьёв', 'Васильев', 'Зайцев',
        'Павлов', 'Семёнов', 'Голубев', 'Виноградов', 'Богданов', 'Воробьёв',
        'Фёдоров', 'Михайлов', 'Беляев', 'Тарасов', 'Белов', 'Комаров', 'Орлов',
        'Киселёв', 'Макаров', 'Андреев', 'Ковалёв', 'Ильин', 'Гусев', 'Титов',
        'Кузьмин', 'Кудрявцев', 'Баранов', 'Куликов', 'Алексеев', 'Степанов',
        'Яковлев', 'Сорокин', 'Сергеев', 'Романов', 'Захаров', 'Борисов', 'Королёв',
        'Герасимов', 'Пономарёв', 'Григорьев', 'Лазарев', 'Медведев', 'Ершов',
        'Никитин', 'Соболев', 'Рябов', 'Поляков', 'Цветков', 'Данилов', 'Жуков',
        'Фролов', 'Журавлёв', 'Николаев', 'Крылов', 'Максимов', 'Сидоров', 'Осипов',
        'Белоусов', 'Федотов', 'Дорофеев', 'Егоров', 'Матвеев', 'Бобров', 'Дмитриев',
        'Калинин', 'Анисимов', 'Петухов', 'Антонов', 'Тимофеев', 'Никифоров',
        'Веселов', 'Филиппов', 'Марков', 'Большаков', 'Суханов', 'Миронов', 'Ширяев',
        'Александров', 'Коновалов', 'Шестаков', 'Казаков', 'Ефимов', 'Денисов',
        'Громов', 'Фомин', 'Давыдов', 'Мельников', 'Щербаков', 'Блинов', 'Колесников',
        'Карпов', 'Афанасьев', 'Власов', 'Маслов', 'Исаков', 'Тихонов', 'Аксёнов',
        'Гаврилов', 'Родионов', 'Котов', 'Горбунов', 'Кудряшов', 'Быков', 'Зуев',
        'Третьяков', 'Савельев', 'Панов', 'Рыбаков', 'Суворов', 'Абрамов', 'Воронов',
        'Мухин', 'Архипов', 'Трофимов', 'Мартынов', 'Емельянов', 'Горшков', 'Чернов',
        'Овчинников', 'Селезнёв', 'Панфилов', 'Копылов', 'Михеев', 'Галкин', 'Назаров',
        'Лобанов', 'Лукин', 'Беляков', 'Потапов', 'Некрасов', 'Хохлов', 'Жданов',
        'Наумов', 'Шилов', 'Воронцов', 'Ермаков', 'Дроздов', 'Игнатьев', 'Савин',
        'Логинов', 'Сафонов', 'Капустин', 'Кириллов', 'Моисеев', 'Елисеев', 'Кошелев',
        'Костин', 'Горбачёв', 'Орехов', 'Ефремов', 'Исаев', 'Евдокимов', 'Калашников',
        'Кабанов', 'Носков', 'Юдин', 'Кулагин', 'Лапин', 'Прохоров', 'Нестеров',
        'Харитонов', 'Агафонов', 'Муравьёв', 'Ларионов', 'Федосеев', 'Зимин', 'Пахомов',
        'Шубин', 'Игнатов', 'Филатов', 'Крюков', 'Рогов', 'Кулаков', 'Терентьев',
        'Молчанов', 'Владимиров', 'Артемьев', 'Гурьев', 'Зиновьев', 'Гришин', 'Кононов',
        'Дементьев', 'Ситников', 'Симонов', 'Мишин', 'Фадеев', 'Комиссаров', 'Мамонтов',
        'Носов', 'Гуляев', 'Шаров', 'Устинов', 'Вишняков', 'Евсеев', 'Лаврентьев',
        'Брагин', 'Константинов', 'Корнилов', 'Авдеев', 'Зыков', 'Бирюков', 'Шарапов',
        'Никонов', 'Щукин', 'Дьячков', 'Одинцов', 'Сазонов', 'Якушев', 'Красильников',
        'Гордеев', 'Самойлов', 'Князев', 'Беспалов', 'Уваров', 'Шашков', 'Бобылёв',
        'Доронин', 'Белозёров', 'Рожков', 'Самсонов', 'Мясников', 'Лихачёв', 'Буров',
        'Сысоев', 'Фомичёв', 'Русаков', 'Стрелков', 'Гущин', 'Тетерин', 'Колобов',
        'Субботин', 'Фокин', 'Блохин', 'Селиверстов', 'Пестов', 'Кондратьев', 'Силин',
        'Меркушев', 'Лыткин', 'Туров',
    ];

    /**
     * @return string
     * @example 'Janette'
     */
    function firstNameFemale()
    {
        return Person::$firstNameFemale[0];
    }

    /**
     * @return string
     * @example 'John'
     */
    function firstNameMale()
    {
        return Person::$firstNameMale[0];
    }

    /**
     * @return string
     * @example 'Doe'
     */
    function lastName()
    {
        return Person::$lastName[0];
    }
}