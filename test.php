
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



/* Запрос в БД */


if (isset($_POST['search'])) {
    $prof = $_POST['sort'];
    $year1 = $_POST['year1'];
    $year2 = $_POST['years2'];
    $age1 = $_POST['age1'];
    $age2 = $_POST['age2'];
    $sth = $conn->prepare("SELECT * FROM people WHERE position = '$prof' AND (experience >= '$year1' AND experience <='$year2') AND (age >= '$age1' AND age <= '$age2')");
    $sth->execute();
    $list = $sth->fetchAll(PDO::FETCH_ASSOC);
}else {
    $sth = $conn->prepare("SELECT * FROM people ");
    $sth->execute();
    $list = $sth->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <?php include "app/include/header.php";?>
</header>
<main>
    <div class="cart">
        <p>Подобрать персонал</p>
        <div class="find_pers">
            <img class="beauti1" src="image/img/beauti1.png" alt="">
            <img class="beaitu2" src="image/img/beaitu2.png" alt="">
            <form class="find" action="" method="post">
                <div class="job">
                    <label for="pet-job">Показать только</label><br>
                    <select name="sort" id="pet-job">
                        <option value="Няня" <?php if ($_POST['sort'] == 'Няня' & isset($_POST)) echo 'selected'; ?>>Няня</option>
                        <option value="Повар" <?php if ($_POST['sort'] == 'Повар' & isset($_POST)) echo 'selected'; ?>>Повар</option>
                        <option value="Гувернантка" <?php if ($_POST['sort'] == 'Гувернантка' && isset($_POST)) echo 'selected'; ?>>Гувернантка</option>
                        <option value="Садовник" <?php if ($_POST['sort'] == 'Садовник' && isset($_POST)) echo 'selected'; ?>>Садовник</option>
                        <option value="Уборщица" <?php if ($_POST['sort'] == 'Уборщица' && isset($_POST)) echo 'selected'; ?>>Уборщица</option>
                        <option value="Конюх" <?php if ($_POST['sort'] == 'Конюх' && isset($_POST)) echo 'selected'; ?>>Конюх</option>
                    </select>
                </div>
                <div class="feature">
                    <div class="years">Стаж  от  <input type="text" name="year1">  до  <input type="text" name="years2">  лет</div>
                    <div class="age">Возраст от <input type="text" name="age1"> до <input type="text" name="age2"> лет</div>
                </div>


                <input type="submit" name="search" value="ПОДОБРАТЬ">
            </form>
            <script src="js/main.js"></script>
        </div>
    </div>

    <div class="table">
        <table>
            <tr>
                <th>ФИО</th>
                <th>ДОЛЖНОСТЬ</th>
                <th>ВОЗРАСТ</th>
                <th>СТАЖ РАБОТЫ</th>
            </tr>
            <?php foreach ($list as $row): ?>
            <tr>
                <td><a href="#"><?php echo $row['name']; ?></a></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['experience']; ?> ЛЕТ</td>
            </tr>
            <?php endforeach; ?>


        </table>
    </div>
    <div class="text">
        <p>Наличие в доме обслуживающего персонала - водителя, няни, гувернантки, горничной, домработницы - это вовсе не дань моде и не причуды избалованных нежданно свалившимся богатством нуворишей. Напротив, услугами сиделки или няни пользуются сегодня те, кто отлично знает цену деньгам и своему времени
            Наличие в доме обслуживающего персонала - водителя, няни, гувернантки, горничной, домработницы - это вовсе не дань моде и не причуды избалованных нежданно свалившимся богатством нуворишей. Напротив, услугами сиделки или няни пользуются сегодня те, кто отлично знает цену деньгам и своему времени</p>

        <p>Наличие в доме обслуживающего персонала - водителя, няни, гувернантки, горничной, домработницы - это вовсе не дань моде и не причуды избалованных нежданно свалившимся богатством нуворишей. Напротив, услугами сиделки или няни пользуются сегодня те, кто отлично знает цену деньгам и своему времени. Люди, для которых важно не только вырастить ребенка, но и создать основу будущего благосостояния, построив свою карьеру - вот основная категорий заказчиков, которые ежедневно пользуются услугами нашей компании по подбору домашнего персонала.
            Заказ няни, сиделки или домработницы является благом не только для женщины, которая имеет возможность строить свою карьеру или получить, наконец, передышку от выполнения бесконечных домашних обязанностей, но и для всех остальных членов семьи, которые могут провести вместе свободный вечер или выходные. А доступные цены, которые устанавливает на свои услуги наша компания, и предлагаемый нами широкий выбор различных категорий домашнего персонала делают исключительно удобным и, главное, безопасным процесс поиска няни для малыша, сиделки для пожилых членов семьи или домработницы для квартиры или загородного особняка.</p>

        <p>Наличие в доме обслуживающего персонала - водителя, няни, гувернантки, горничной, домработницы - это вовсе не дань моде и не причуды избалованных нежданно свалившимся богатством нуворишей. Напротив, услугами сиделки или няни пользуются сегодня те, кто отлично знает цену деньгам и своему времени. Люди, для которых важно не только вырастить ребенка, но и создать основу будущего благосостояния, построив свою карьеру - вот основная категорий заказчиков, которые ежедневно пользуются услугами нашей компании по подбору домашнего персонала.
            Заказ няни, сиделки или домработницы является благом не только для женщины, которая имеет возможность строить свою карьеру или получить, наконец, передышку от выполнения бесконечных домашних обязанностей, но и для всех остальных членов семьи, которые могут провести вместе свободный вечер или выходные. А доступные цены, которые устанавливает на свои услуги наша компания, и предлагаемый нами широкий выбор различных категорий домашнего персонала делают исключительно удобным и, главное, безопасным процесс поиска няни для малыша, сиделки для пожилых членов семьи или домработницы для квартиры или загородного особняка.</p>


    </div>
</main>

<footer>
    <?php include "app/include/footer.php";?>
</footer>


</body>
</html>