<?php include('header.php'); ?>

<div class="content-container">
    <form action='<?= $_SERVER['PHP_SELF']?>' method="post" >

        <h3>Please type your first and last name:</h3>
        <label for="first_name">First Name: </label>
        <input id="first_name" type="text" name="first_name">
        <label for="last_name">Last Name: </label>
        <input id='last_name' type="text" name="last_name">
        <input type="submit" value="Submit Name" name="first_last_submit">

        <h3>Check my qualifications:</h3>
        <label for="qualification">Please type a qualification to check to see if I have it</label>
        <input id="qualification" type="text" name="qualification">
        <input type="submit" value="Check Qualification" name="check_qualification">

        <table class="form-demo">
            <tr>
                <td>
                    Text Box:
                </td>
                <td>
                    <input type="text" />
                </td>
            </tr>
            <tr>
                <td>
                    Radio Buttons:
                </td>
                <td>
                    <input name="dps-radio" type="radio" />
                    <input name="dps-radio" type="radio" />
                    <input name="dps-radio" type="radio" />
                    <input name="dps-radio" type="radio" />
                    <input name="dps-radio" type="radio" />
                </td>
            </tr>
        </table>

    </form>
        <?php
            $full = '';
            $check = '';

            if (isset($_POST['first_last_submit'])) {

                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];

                $fullName = $firstName." ".$lastName;

                $fullNameArray = str_split($fullName);

                $count = 0;
                $eLocation = 0;

                $fullNameArrayCount = count($fullNameArray)-1;

                foreach ($fullNameArray as $key => $fNA) {
                    if ($fNA == 's') {
                        $fNA = '5';
                        if ($key == ($fullNameArrayCount) - 2) {
                            if (strtolower($fullNameArray[$key + 1]) == 'o' && strtolower($fullNameArray[$key + 2]) == 'n') {
                                $full .= "<span class='son'>".$fNA.$fullNameArray[$key + 1].$fullNameArray[$key + 2]."</span";

                                break;
                            } else {
                                continue;
                            }

                        }
                    } else if (strtolower($fNA) == 'e' && $count == 0) {
                        $fNA = "<span class='underline'>".$fNA."</span>";
                        $eLocation = $key;
                        $count = 1;
                    }

                    $full .= $fNA;
                }


            } else if (isset($_POST['check_qualification'])) {

                $qualificationsArray = ['php', 'css', 'html', 'python', 'mysql', 'react', 'redux', 'machine learning'];

                $qualification = $_POST['qualification'];

                foreach ($qualificationsArray as $qA) {
                    if (strtolower($qualification) == $qA) {
                        $check = "Yes, I have the qualification";
                        break;
                    } else {
                        $check = "No, I don't have the qualification";
                    }
                }
            }
        if ($full != '') {
            echo '<div class="answers">';
                echo 'Your altered name is: '.$full;
            echo '</div>';
        } else if ($check != '') {
            echo '<div class="answers">';
                echo $check;
            echo '</div>';
        }
        ?>

<?php
    include('footer.php');
?>
