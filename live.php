<style>
.mycss{
	color: black;
    border:2px solid #000;
    background: cyan;
    padding: 10px;
    text-align: center;
    font-size: large;
}
.css{
	color: black;
    font-size: large;
    font-weight: bold;
    padding: 10px;
    text-align: center;
}
</style>
<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM application WHERE curr_id LIKE '{$input}'";
    $query1 = "SELECT * FROM p_application WHERE curr_id LIKE '{$input}'";
    $result = mysqli_query($con,$query);
    $result1 = mysqli_query($con,$query1);
    if(mysqli_num_rows($result)>0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>curr_id</th>
                    <th>contract</th>
                    <th>sex</th>
                    <th>car</th>
                    <th>income</th>
                    <th>credit</th>
                    <th>income_type</th>
                    <th>education</th>
                    <th>family_status</th>
                    <th>house</th>
                    <th>start_day</th>
                    <th>organization</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $curr_id = $row['curr_id'];
                    $contract = $row['contract'];
                    $sex = $row['sex'];
                    $car = $row['car'];
                    $income = $row['income'];
                    $credit = $row['credit'];
                    $income_type = $row['income_type'];
                    $education = $row['education'];
                    $family_status = $row['family_status'];
                    $house = $row['house'];
                    $start_day = $row['start_day'];
                    $organization = $row['organization'];

                    ?>
                        <tr>
                            <td><?php echo $curr_id;?></td>
                            <td><?php echo $contract;?></td>
                            <td><?php echo $sex;?></td>
                            <td><?php echo $car;?></td>
                            <td><?php echo $income;?></td>
                            <td><?php echo $credit;?></td>
                            <td><?php echo $income_type;?></td>
                            <td><?php echo $education;?></td>
                            <td><?php echo $family_status;?></td>
                            <td><?php echo $house;?></td>
                            <td><?php echo $start_day;?></td>
                            <td><?php echo $organization;?></td>
                        </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }else{
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
    }
    if(mysqli_num_rows($result)>0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>prev_id</th>
                    <th>curr_id</th>
                    <th>contract</th>
                    <th>amount</th>
                    <th>credit</th>
                    <th>down_payment</th>
                    <th>start_day</th>
                    <th>purpose</th>
                    <th>contract_status</th>
                    <th>payment_type</th>
                    <th>reject_reason</th>
                    <th>client</th>
                    <th>product_type</th>
                    <th>channel</th>
                    <th>yield_group</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result1)){
                    $prev_id = $row['prev_id'];
                    $curr_id = $row['curr_id'];
                    $contract = $row['contract'];
                    $amount = $row['amount'];
                    $credit = $row['credit'];
                    $down_payment = $row['down_payment'];
                    $start_day = $row['start_day'];
                    $purpose = $row['purpose'];
                    $contract_status = $row['contract_status'];
                    $payment_type = $row['payment_type'];
                    $reject_reason = $row['reject_reason'];
                    $client = $row['client'];
                    $product_type = $row['product_type'];
                    $channel = $row['channel'];
                    $yield_group = $row['yield_group'];

                    ?>
                        <tr>
                            <td><?php echo $prev_id;?></td>
                            <td><?php echo $curr_id;?></td>
                            <td><?php echo $contract;?></td>
                            <td><?php echo $amount;?></td>
                            <td><?php echo $credit;?></td>
                            <td><?php echo $down_payment;?></td>
                            <td><?php echo $start_day;?></td>
                            <td><?php echo $purpose;?></td>
                            <td><?php echo $contract_status;?></td>
                            <td><?php echo $payment_type;?></td>
                            <td><?php echo $reject_reason;?></td>
                            <td><?php echo $client;?></td>
                            <td><?php echo $product_type;?></td>
                            <td><?php echo $channel;?></td>
                            <td><?php echo $yield_group;?></td>
                        </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }else{
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
    }
    if($income_type=="Working" && $family_status=="Married" && $education=="Secondary / secondary special"){
        echo '<pre>';
        echo "\n\n";
        echo "<p class='css'>Income Type : Working \t\t Family Status : Married \t Education : Secondary \n</p>";
        echo "<p class='mycss'>Highly Eligible for repaying a loan</p>";
    }
    else if($income_type=="Working" && ($family_status=="Single" || "Divorced" || "Widowed") && $education=="Secondary / secondary special"){
        echo "\n\n";
        echo "<p class='css'>Income Type : Working \t\t Family Status : Single or Divorced or Widowed \t Education : Secondary \n</p>";
        echo "<p class='mycss'>Slightly Less Eligible for repaying a loan</p>";
    }
    else if(($income_type=="Pensioner" || "State servant" || "Commercial asso") && $family_status=="Married" && $education=="Secondary / secondary special"){
        echo "\n\n";
        echo "<p class='css'>Income Type : Pensioner or State servant or Commercial Associate \t\t Family Status : Married \t Education : Secondary \n</p>";
        echo "<p class='mycss'>Even Lesser Eligible for repaying a loan</p>";
    }
    else if($income_type=="Working" && $family_status=="Married" && $education=="Higher education"){
        echo "\n\n";
        echo "<p class='css'>Income Type : Working \t\t Family Status : Married \t Education : Higher \n</p>";
        echo "<p class='mycss'>Highly Ineligible for repaying a loan</p>";
        echo '</pre>';
    }
}
?>