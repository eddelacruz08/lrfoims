<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>               
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <h3 style="text-align:center; margin-top:-50px; line-height: 70%">Order Report as of</h3>
    <h3 style="text-align:center; margin-top:-50px; line-height: 70%"><?= $date_status == 1 ? date('F d, Y',strtotime($date)) : date('F d, Y',strtotime($strStartDate)).' to '.date('F d, Y',strtotime($strEndDate))?></h3><br>
    <p style="line-height: 70%; font-size: 10pt;"><b>Date generated: </b><?= date('F d, Y')?></p>
    <table style="width:100%">
        <thead>
            <tr style="background-color: black; color: white;">
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Order Number</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Status</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Amount</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Cash</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Change</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Date</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($orders)):?>
                <?php foreach ($orders as $row) : ?>
                    <tr>
                        <td style="text-align:center; font-size: 10pt">
                            Order#<?=$row['number']?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            <?=$row['order_status']?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            Php <?=number_format($row['total_amount'])?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            Php <?=number_format($row['total_amount'])?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            Php <?=number_format($row['total_amount'])?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            <?= Date('F d, Y - h:i a', strtotime($row['created_at']))?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($ordersTotalAmount as $rows) : ?>
                    <tr>
                        <th colspan="2" style="text-align:center; font-weight: bold; font-size: 10pt">
                            Total Amount:
                        </th>
                        <td colspan="1" style="text-align:center; font-weight: bold; font-size: 10pt">
                            Php <?=number_format($rows['total_amount_price'])?>
                        </td>
                        <td colspan="3" style="text-align:center; font-size: 10pt">
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else:?>
                <tr>
                    <td colspan="6" style="text-align:center; font-size: 10pt"><i>No Record available</i></td>
                </tr>
            <?php endif;?>
        </tbody>
    </table>
    <p style="text-align:center; font-size: 10pt"><i>**This report is system generated.**</i></p>
    <p style="text-align:center; font-size: 10pt; line-height: 30%"><i>**No signatures are required.**</i></p>
</body>
</html>