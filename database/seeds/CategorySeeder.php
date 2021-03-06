<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Заполнение профессий
        $profession_group = Category::create([
          'title' => 'Профессии',
          'description_short' => 'Тесты по профессиям',
          'description' => null,
          'parent_id' => 0
        ]);
        $professions = [
          'Аккумуляторщик', 'Аппаратчик химводоочистки', 'Водитель автомобиля', 'Водитель вездехода', 'Водитель МКСМ-800', 'Водитель снегоочистителя шнекороторного ДЭ - 226',
          'Дорожный рабочий', 'Кладовщик', 'Крановщик автомобильного крана', 'Лаборант химического анализа', 'Матрос', 'Машинист (оператор, водитель)  крана - манипулятора',
          'Машинист автогрейдера','Машинист бульдозера','Машинист газотурбинной установки','Машинист двигателей внутреннего сгорания',
          'Машинист паровой передвижной депарафинизационной установки','Машинист погрузочной машины (фронтального погрузчика К-702М-ПК-6)','Машинист технологических компрессоров',
          'Машинист УМП - 350', 'Машинист экскаватора', 'Моторист цементировочного агрегата', 'Оператор заправочной станции', 'Оператор котельной', 'Оператор по добыче нефти и газа',
          'Оператора по исследованию скважин', 'Слесарь по контрольно-измерительным приборам и автоматике', 'Слесарь по ремонту и эксплуатации газового оборудования',
          'Слесарь по ремонту оборудования котельных', 'Слесарь по ремонту технологических установок', 'Слесарь-сантехник', 'Станочник широкого профиля металлообрабатывающих станков',
          'Стропольщик', 'Электрогазосварщик', 'Электромонтер по ремонту и обслуживанию электрооборудования',
        ];
        foreach ($professions as $profession) {
          Category::create([
            'title' => $profession,
            'description_short' => '',
            'description' => null,
            'parent_id' => $profession_group->id,
          ]);
        }

        // Заполнение Пожарная безопасность
        $fire_group = Category::create([
          'title' => 'Пожарная безопасность',
          'description_short' => 'Тесты пожарно-техническому минимуму',
          'description' => null,
          'parent_id' => 0
        ]);
        $fire_tests = [
          'Пожарно-технический минимум для газоэлектросварщиков',
          'Пожарно-технический минимум для работников организаций',
          'Пожарно-технический минимум для рабочих, осуществляющих пожароопасные работы',
        ];
        foreach ($fire_tests as $fire_test) {
          Category::create([
            'title' => $fire_test,
            'description_short' => '',
            'description' => null,
            'parent_id' => $fire_group->id,
          ]);
        }

        // Заполнение Электробезопасность
        $electro_group = Category::create([
          'title' => 'Электробезопасность',
          'description_short' => 'Общие вопросы эксплуатации электроустановок потребителей',
          'description' => null,
          'parent_id' => 0
        ]);
        $electro_tests = [
          'Обучение и проверка знаний электротехнического и электротехнологического персонала по электробезопасности (II группа допуска)',
          'Обучение и проверка знаний электротехнического и электротехнологического персонала по электробезопасности (III группа допуска до 1000 В)',
          'Обучение и проверка знаний электротехнического и электротехнологического персонала по электробезопасности (III группа допуска до и выше 1000 В)',
          'Обучение и проверка знаний электротехнического и электротехнологического персонала по электробезопасности (IV группа допуска)',
          'Обучение и проверка знаний электротехнического и электротехнологического персонала по электробезопасности (V группа допуска)',
        ];
        foreach ($electro_tests as $electro_test) {
          Category::create([
            'title' => $electro_test,
            'description_short' => '',
            'description' => null,
            'parent_id' => $electro_group->id,
          ]);
        }

        // Заполнение Управление Рисками
        $risks_group = Category::create([
          'title' => 'Управление Рисками',
          'description_short' => 'Вопросы касаемые распектов, опасностей и рисков, а также действия персонала при аварии (ПМЛА)',
          'description' => null,
          'parent_id' => 0
        ]);
        $risks_tests = [
          'Аспекты, опасности и риски Пырейном ГП',
          'Аспекты, опасности и риски Береговой опорный ГП',
        ];
        foreach ($risks_tests as $risks_test) {
          Category::create([
            'title' => $risks_test,
            'description_short' => '',
            'description' => null,
            'parent_id' => $risks_group->id,
          ]);
        }

        // Заполнение Производственный инструкции
        $instructions_group = Category::create([
          'title' => 'Производственный инструкции',
          'description_short' => 'Тесты по производственным инструкциям',
          'description' => null,
          'parent_id' => 0
        ]);
        $instructions_tests = [
          'Оператор по добыче нефти и газа 4 разряда',
          'Оператор по добыче нефти и газа 5 разряда',
          'Оператор по добыче нефти и газа 6 разряда',
          'Машинист газотурбинных установок 5 разярда',
          'Машинист газотурбинных установок 6 разярда',
          'Слесарь по ремонту технологических установок 4 разряда',
          'Слесарь по ремонту технологических установок 5 разряда',
          'Слесарь по ремонту технологических установок 6 разряда',
          'Электрогазосварщик 5 разряда',
          'Электрогазосварщик 6 разряда',
          'Машинист технологических компрессоров 4 разряда',
          'Машинист технологических компрессоров 5 разряда',
          'Машинист технологических компрессоров 6 разряда',
          'Слесарь по контрольно-измерительным приборам и автоматики 4 разряда',
          'Слесарь по контрольно-измерительным приборам и автоматики 5 разряда',
          'Слесарь по контрольно-измерительным приборам и автоматики 6 разряда',
          'Слесарь по ремонту и эксплуатации газового оборудования 4 разряда',
          'Слесарь по ремонту и эксплуатации газового оборудования 5 разряда',
          'Электромонтер по ремонту и обслуживанию электрооборудования 4 разряда',
          'Электромонтер по ремонту и обслуживанию электрооборудования 5 разряда',
          'Электромонтер по ремонту и обслуживанию электрооборудования 6 разряда',
        ];
        foreach ($instructions_tests as $instructions_test) {
          Category::create([
            'title' => $instructions_test,
            'description_short' => '',
            'description' => null,
            'parent_id' => $instructions_group->id,
          ]);
        }

        // Заполнение По видам работ
        $types_group = Category::create([
          'title' => 'По видам работ',
          'description_short' => 'Тесты по инструкциям по охране труда по видам работ',
          'description' => null,
          'parent_id' => 0
        ]);
        $types_tests = [
          'Для работников, участвующих в контроле за бурением, испытанием, ремонтом скважин, а также проведением промыслово-геофизических работ',
          'О порядке испытания, проверки исправности и требования к средствам индивидуальной защиты',
          'При эксплуатации и обслуживании сосудов, работающих под давлением',
          'По безопасной эксплуатации предохранительных клапанов, установленных на технологическом оборудовании',
          'При ведении работ по обслуживанию и эксплуатации газовых скважин',
          'Для электротехнического персонала при переходе организации на аварийное энергообеспечение',
          'При ликвидации аварий в электроустановках АО «Сибнефтегаз»',
          'По мерам безопасности при перевозке работников автомобильным транспортом',
          'По обслуживанию и безопасной эксплуатации межпромысловых коллекторов и газопроводов-шлейфов',
          'Для электрогазосварщиков (газорезчиков) при использовании СУГ',
          'По ОТ и ПБ при выполнении верхолазных работ',
          'По ОТ и ПБ при замере рабочих параметров на устье скважин',
          'При испытаниях газовой аппаратуры, используемой для резки металла с использованием СУГ',
          'По ОТ и ПБ при испытании, установке, и эксплуатации абразивных кругов',
          'При обслуживании вентиляторов и вентиляционных систем газового промысла',
          'По ОТ и ПБ при обслуживании электроустановок во взрывоопасных помещениях',
          'По ОТ и ПБ при отборе проб воды, газа, конденсата и нефти на химический анализ',
          'При выполнении работ по снятию и установке заглушек, арматуры, замене прокладок на трубопроводах',
          'По ОТ при проведении снегоуборочных работ на территории газового промысла',
          'При электро- и газосварочных работах',
          'По ОТ и ПБ при производстве работ на сверлильном, фрезерном и токарном станках',
          'По ОТ и ПБ при пуске газа в газопроводы и объекты систем газораспределения и газопотребления',
          'По ОТ и ПБ при работе в колодцах, емкостях и аппаратах',
          'По ОТ и ПБ при работе грузоподъемными кранами ближе 30 метров от ЛЭП',
          'По ОТ и ПБ при перевозке, хранении и использовании диэтиленгликоля',
          'По эксплуатации системы аварийной остановки установки комплексной подготовки газа (УКПГ Пырейного ГП)',
          'По ОТ и ПБ при работе с передвижной паровой депарафинизационной установкой ППУ',
          'По ОТ при работе с персональным ЭВМ',
          'По ОТ при работе с ручным слесарным инструментом',
          'По ОТ при работе с цементировочным агрегатом ЦА-320',
          'По ОТ и ПБ при эксплуатации технологических трубопроводов',
          'По ОТ и ПБ при глубинных исследованиях скважин',
          'По ОТ при эксплуатации плунжерных насосов',
          'По ОТ при эксплуатации центробежных насосов',
          'По ОТ при эксплуатации электрических кран-балок и других грузоподъемных механизмов, управляемых с пола',
          'По ОТ и ПБ при эксплуатации электродвигателей',
          'По эксплуатации системы аварийной остановки установки комплексной подготовки газа (УКПГ Берегового ГП)',
          'О порядке получения от поставщиков, перевозки, хранения, отпуска и применения метанола в АО «Сибнефтегаз»',
          'По ОТ и ПБ при обслуживании тепловых сетей на объектах АО «Сибнефтегаз»',
          'По контролю воздушной среды на взрывопожароопасных объектах АО «Сибнефтегаз»',
          'По оказанию первой помощи при несчастных случаях',
          'По организации безопасного проведения газоопасных работ',
          'По организации безопасного проведения огневых работ',
          'По применению комплекта шлангового противогаза',
          'По применению порошковых и углекислотных огнетушителей',
          'По ОТ при пользовании механических транспортных средств (перевозка людей, грузов)',
          'По ОТ при погрузочно-разгрузочных работах и перемещении тяжестей',
          'По ОТ при проведении земляных работ',
          'По ОТ при работе на высоте',
          'По ОТ при работе на заточном и сверлильном станках',
          'По ОТ при работе с вредными веществами на объектах АО «Сибнефтегаз»',
          'По ОТ при работе с электроинструментом, ручными электрическими машинами, ручными электрическими светильниками',
          'По ОТ и ПБ при получении, перевозке, хранении и эксплуатации баллонов со сжатыми и сжиженными углеводородными газами',
          'По ОТ при эксплуатации снегоходов',
          'Требования по ОТ, обязательные для работников всех профессий',
          'По организации безопасного проведения газоопасных работ на объектах систем газораспределения и газопотребления АО «Сибнефтегаз»',
          'По организации проведения предрейсовых медицинских осмотров водителей',
          'По ОТ и ПБ при техническом обслуживании и ремонте автомобилей',
          'По ОТ при проведении электрических измерений и испытаний',
          'По ОТ и ПБ при эксплуатации электроустановок АО «Сибнефтегаз»',
          'По ОТ и ПБ при зачистке резервуаров',
          'По ОТ и ПБ при проведении окрасочных работ',
          'По ОТ и ПБ при строительстве, ремонте и содержании дорог АО «Сибнефтегаз»',
          'По ОТ и ПБ при эксплуатации водопроводно-канализационного хозяйства',
          'По ОТ и ПБ для лица, ответственного за безопасное действие сосудов, работающих под давлением',
          'По ОТ и ПБ при работах на радиорелейных линиях связи (РРС)',
          'По ОТ и ПБ при работах на линейных сооружениях кабельных линий передачи',
          'По ОТ и ПБ при строительстве и эксплуатации ледовых переправ',
          'По охране труда при движении автотранспорта по ледовым дорогам и переправам через водоемы',
          'По ОТ и ПБ при эксплуатации и ремонте сосудов и аппаратов, работающих под давлением ниже 0,07 МПа (0,7 кгс/кв. см) и вакуумом',
          'По ОТ и ПБ при проведении работ по наладке и обслуживанию систем автоматики и телемеханики',
          'По ОТ и ПБ при производстве работ на лестницах и стремянках',
          'По ОТ и ПБ при выполнении плотничных и столярных работ',
          'По ОТ при работе с домкратом',
          'По ОТ и ПБ для водителя, перевозящего бензин и другие легковоспламеняющиеся жидкости и вещества',
          'По ОТ и ПБ при выполнении гидроизоляционных и термоизоляционных работ',
          'Инструкция по испытанию предохранительных поясов',
          'По ОТ при посадке, высадке и полете пассажиров на вертолете',
          'При буксировке, сцепке, расцепке автомобилей',
          'По испытанию лестниц и стремянок',
          'При отборе проб природного газа',
          'При эксплуатации установки очистки бытовых стоков ККВ-9',
          'При работах с использованием сжатого воздуха',
          'При эксплуатации передвижной компрессорной станции',
          'По испытанию трубопроводов и сосудов',
          'По организации безопасного проведения ремонтных работ',
          'Для оперативно - дежурного персонала при эксплуатации велосипеда',
          'По ОТ при косьбе травы',
        ];
        foreach ($types_tests as $types_test) {
          Category::create([
            'title' => $types_test,
            'description_short' => '',
            'description' => null,
            'parent_id' => $types_group->id,
          ]);
        }

        //
        // Category::create([
        //   'title' => 'Профессии',
        //   'description_short' => 'Тесты по профессиям',
        //   'description' => null,
        //   'parent_id' => 0
        // ]);
        // DB::table('categories')->insert(
        // [
        //   'title' => 'ПОМБЕЗОПАСНОСТЬ',
        //   'description_short' => 'Промышленная безопасность',
        //   'description' => null,
        //   'parent_id' => 0
        // ]);
        // DB::table('categories')->insert(
        // [
        //   'title' => 'А.',
        //   'description_short' => 'Общие требования промышленной безопасности',
        //   'description' => null,
        //   'parent_id' => 1
        // ]);
        // DB::table('categories')->insert(
        // [
        //   'title' => 'А.1',
        //   'description_short' => 'Основы промышленной безопасности',
        //   'description' => null,
        //   'parent_id' => 2
        // ]);
        // DB::table('categories')->insert(
        // [
        //   'title' => 'Б.',
        //   'description_short' => 'Специальные требования промышленной безопасности',
        //   'description' => null,
        //   'parent_id' => 1
        // ]);
        // DB::table('categories')->insert(
        // [
        //   'title' => 'Б1.',
        //   'description_short' => 'Требования промышленной безопасности в химической, нефтехимической и нефтеперерабатывающей промышленности',
        //   'description' => 'Раздел в редакции, введенной в действие с 25 января 2018 года приказом Ростехнадзора от 19 января 2018 года N 23.',
        //   'parent_id' => 4
        // ]);
        // DB::table('categories')->insert(
        // [
        //   'title' => 'Б.1.1.',
        //   'description_short' => 'Эксплуатация химически опасных производственных объектов',
        //   'description' => null,
        //   'parent_id' => 5
        // ]);
    }
}
