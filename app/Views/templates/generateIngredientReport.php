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

    <h3 style="text-align:center; margin-top:-50px; line-height: 70%">Ingredient Report as of</h3>
    <h3 style="text-align:center; margin-top:-50px; line-height: 70%"><?= $date_status == 1 ? date('F d, Y',strtotime($date)) : date('F d, Y',strtotime($strStartDate)).' to '.date('F d, Y',strtotime($strEndDate))?></h3><br>
    <p style="line-height: 70%; font-size: 10pt;"><b>Date generated: </b><?= date('F d, Y')?></p>
    <p style="line-height: 70%; font-size: 10pt;"><b>Total ingredients: </b><?= count($ingredients)?></p>
    <table style="width:100%">
        <thead>
            <tr style="background-color: black; color: white;">
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Name</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Category</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Unit of Measure</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Unit Price</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Status</center>
                </th>
                <th scope="col" style="text-align:center; font-weight: bold; font-size: 10pt">
                    <center>Date</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($ingredients)):?>
                <?php foreach ($ingredients as $row) : ?>
                    <tr>
                        <td style="text-align:center; font-size: 10pt">
                            <?= ucwords($row['product_name'])?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            <?= ucwords($row['product_category'])?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            <?= $row['unit_quantity'].' '.ucfirst($row['description'])?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            Php <?=number_format($row['price'],2)?>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            <span><?= $row['product_status_id'] == 1 ? ucfirst($row['name']) : ucfirst($row['name']) ?></span>
                        </td>
                        <td style="text-align:center; font-size: 10pt">
                            <?= Date('F d, Y - h:i a', strtotime($row['created_at']))?>
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
    <p style="text-align:center; font-size: 10pt"><i>**This report is system generated. No signatures are required.**</i></p>
</body>
</html>