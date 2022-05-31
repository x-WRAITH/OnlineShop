<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
    require_once('config/db_config.php');

    function getConnect($host, $login, $password, $database){
        $connect=new mysqli($host, $login, $password, $database);
        if($connect->connect_error){
            echo "Error.. Wystąpił błąd: ".$connect->connect_error;
            echo "<br>";
            echo "Wystąpił błąd o kodzie:  ".$connect->connect_errno;
        }
        return $connect;
    }
 
    /*function databaseFunction($host, $login, $password, $database) {
        $connect = getConnect($host, $login, $password, "");
        $connect->query("CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4;");
        $connect->query("USE $database");
 
        $connect -> query ("
        /*CREATE TABLE `admin` (
            `id` int(11) NOT NULL,
            `username` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        INSERT INTO `admin` (`id`, `username`, `password`) VALUES
            (1, 'admin', 'foobar');

        CREATE TABLE `category` (
            `id` int(11) NOT NULL,
            `categoryName` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        INSERT INTO `category` (`id`, `categoryName`) VALUES
            (1, 'Adidas'),
            (2, 'Puma'),
            (3, 'Nike'),
            (4, 'Reebok'),
            (5, 'Lacoste'),
            (6, 'Gucci'),
            (7, 'Prada'),
            (8, 'Timberland'),
            (9, 'New balance'),
            (10, 'Louis vuitton');

        CREATE TABLE `products` (
            `id` int(11) NOT NULL,
            `category` int(11) NOT NULL,
            `productName` varchar(255) NOT NULL,
            `productCompany` varchar(255) NOT NULL,
            `productPrice` int(11) NOT NULL,
            `productDescription` varchar(255) NOT NULL,
            `productImage1` varchar(255) NOT NULL,
            `productImage2` varchar(255) NOT NULL,
            `productImage3` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `firstname` varchar(255) NOT NULL,
            `lastname` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `phone` bigint(11) NOT NULL,
            `password` varchar(255) NOT NULL,
            `shippingAddress` longtext NOT NULL,
            `shippingCity` varchar(255) NOT NULL,
            `shippingPincode` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `shippingAddress`, `shippingCity`, `shippingPincode`) VALUES
            (1, 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'macieknowak123', 'Fiołkowka 213', 'Limanowa', 34600);
        ALTER TABLE `admin` ADD PRIMARY KEY (`id`);
        ALTER TABLE `category` ADD PRIMARY KEY (`id`);
        ALTER TABLE `products` ADD PRIMARY KEY (`id`);
        ALTER TABLE `users` ADD PRIMARY KEY (`id`);
        ALTER TABLE `admin` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
        ALTER TABLE `category` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
        ALTER TABLE `products` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2; COMMIT;
        ");
    }*/
 
    function disConnect($connect){
        $connect->close();
    }
 
    
    //databaseFunction($host, $login, $password, $database);
    $connect = getConnect($host, $login, $password, $database);
?>
