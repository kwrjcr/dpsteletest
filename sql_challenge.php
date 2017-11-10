<?php

include('connection.php');
include('header.php');

$sql = 'SELECT DISTINCT(CONCAT(u.first_name, " ", u.last_name)) AS full_name, SUM(IF(q.qual_category  = "web design", 1, 0)) AS category
FROM users u
LEFT JOIN qualifications q ON u.User_id = q.User_id 
GROUP BY full_name
ORDER BY category DESC';

?>

<div class="content-container">
    <div class="query">
        <span>Query Used: SELECT DISTINCT(CONCAT(u.first_name, " ", u.last_name)) AS full_name, SUM(IF(q.qual_category  = "web design", 1, 0)) AS category FROM users u LEFT JOIN qualifications q ON u.User_id = q.User_id GROUP BY full_name ORDER BY category DESC</span>
    </div>
    <div class="result">
        <table>
            <?php
                if ($result = $conn->query($sql)) {

                    while ( $row = $result->fetch_row()) {

                        echo    "<tr>".
                                    "<td>".
                                        $row[0].
                                    "</td>".
                                    "<td>".
                                        $row[1].
                                    "</td>".
                                "</tr>";
                    }

                    $result->close();
                };

                $conn->close();
            ?>
        </table>
    </div>
</div>

<?php

include('footer.php');

?>
