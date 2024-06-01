<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Menu 2024</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 10px;
            background-color: rgb(247,238,248);
            /* background-color: rgba(255, 255, 255, 0.9); */
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .container:hover > .table-hover:not(:hover) {
            filter: blur(10px);
            transform: scale(0.9, 0.9);
        }

        .table-hover {
            transition: 400ms;
        }

        .container:hover > .table-hover:hover {
            transform: scale(1.1, 1.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #008080;
            font-size: 24px;
            transition: all 0.3s ease;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #008080;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6e6e6;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        li b {
            font-weight: bold;
        }
    </style>
</head>



<body>
    <div class="container">
        <h1>Mess Menu 2024</h1>
        <table>
            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            <tr>
            <th class="meal-header">Breakfast</th>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk Tea + Coffee <br></li>
                        <li><b>Main:</b><br> Paav Bhaji <br></li>
                        <li><b>Add-ons:</b><br> Suji-Halwa<br></li>
                        
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk+Tea <br></li>
                        <li><b>Main:</b> <br>Uttapam/Poha <br></li>
                        <li><b>Add-ons:</b> <br>1 Banana <br></li>
                        
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk/Tea/Coffee <br></li>
                        <li> <b>Main:</b> <br>Bread + Jam/Egg/Sandwich <br></li>
                        <li> <b>Add-ons:</b> <br>Suji Halwa <br></li>
                        
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk/Tea/Coffee <br></li>
                        <li><b>Main:</b> <br>Poha/Bread + Jam Butter <br></li>
                        <li> <b>Add-ons:</b> <br>1 Banana <br></li>
                        
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk/Tea/Bournvita <br></li>
                        <li><b>Main:</b> <br>Uttapam/Pasta Sambhar+Coconut Chutney <br></li>
                        <li><b>Add-ons:</b> <br>Half Apple <br></li>
                       
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk/Tea/Coffee <br></li>
                        <li><b>Main:</b> <br>Chhole-Bhature <br></li>
                        <li><b>Add-ons:</b> <br>Half Orange/Apple <br></li>
                        
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Hot Beverage:</b> Milk/Tea/Coffee</li>
                        <li><b>Main: </b> <br>Masala Dosa Sambhar+Coconut Chutni <br></li>
                        <li><b>Add-ons:</b> <br>Sewai <br></li>
                        
                    </ul>
                </td>
            </tr>
            <!-- Repeat similar structure for Lunch -->
            <tr>
            <th class="meal-header">Lunch</th>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b> <br>Dal Makhani <br></li>
                        <li><b>Veg-1:</b> <br>Kabuli Chana <br></li>
                        <li><b>Veg-2:</b> <br>Aloo Lauki <br></li>
                        <li><b>Add-ons:</b> <br>Curd/Raita Salad <br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b> <br>Mixed Dal <br></li>
                        <li><b>Veg-1:</b> <br>CauliFlower+ Parwal+ Aloo Sabzi <br></li>
                        <li><b>Veg-2:</b> <br>Dum Aloo <br></li>
                        <li><b>Add-ons:</b> <br>Curd + Salad <br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice + Fried Rice <br></li>
                        <li><b>Dal:</b> <br>Masoor Dal <br></li>
                        <li><b>Veg-1:</b> <br>Papad <br></li>
                        <li><b>Veg-2:</b> <br>Aloo Pikka Rajama Gravy <br></li>
                        <li><b>Add-ons:</b> <br>Raita+ Salad <br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b> <br>Arhar Dal <br></li>
                        <li><b>Veg-1:</b> <br>Machurian Dry <br></li>
                        <li><b>Veg-2:</b> <br>Aloo Green Matar sabzi <br></li>
                        <li><b>Add-ons:</b> <br>Curd+ Salad<br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice+ Khichadi <br></li>
                        <li><b>Dal:</b> <br>Dal Makhani <br></li>
                        <li><b>Veg-1:</b> <br>Seasonal-Sabzi <br></li>
                        <li><b>Veg-2:</b> <br>Aloo+gobi <br></li>
                        <li><b>Add-ons:</b> <br>Raita+ Salad <br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b> <br>Sambhar <br></li>
                        <li><b>Veg-1:</b> <br>Cabbage + Aloo Dry Fry <br></li>
                        <li><b>Veg-2:</b> <br>Rajma <br></li>
                        <li><b>Add-ons:</b> <br>Curd+ Salad <br></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b>  <br>Mix Dal <br></li>
                        <li><b>Veg-1:</b> <br>Brinjal Aloo <br></li>
                        <li><b>Veg-2:</b> <br>Kabuli Chana <br></li>
                        <li><b>Add-ons:</b> <br>Raita Jeera+ Salad <br></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <!-- Repeat similar structure for Dinner -->
                <th class="meal-header">Dinner</th>
                <td >
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b> <br>Chana Dal <br></li>
                        <li><b>Veg-1:</b> <br>Kadahi Panner <br></li>
                        <li><b>Non Veg:</b> <br>Onion Egg Curry <br></li>
                        <li><b>Add-ons:</b> <br>Gulab jamun <br></li>
                    </ul>
                </td>
                <td >
                    <ul>
                        <li><b>Roti:</b>Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice + Fried Rice <br></li>
                        <li><b>Dal:</b> <br>Chana Dal <br></li>
                        <li><b>Veg-1:</b> <br>Chilli Panner <br></li>
                        <li><b>Veg-2:</b> <br>Aloo-Onion Pakora <br></li>
                        <li><b>Non Veg:</b> <br>Onion Egg Curry <br></li>
                        <li><b>Add-ons:</b> <br>Cutured(Cold) <br></li>
                    </ul>
                </td>
                <td >
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice+ Veg-Briyani <br></li>
                        <li><b>Dal:</b> <br>Mong Dal <br></li>
                        <li><b>Veg-1:</b> <br>Matar Panner <br></li>
                        <li><b>Veg-2:</b> <br>Zera Aloo <br></li>
                        <li><b>Non Veg:</b> <br>Cilly Chicken <br></li>
                        <li><b>Add-ons:</b> <br>Sewai <br></li>
                    </ul>
                </td>
                <td >
                    <ul>
                        <li><b>Roti:</b> Methi Puri <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b> <br>Sambhar Dal <br></li>
                        <li><b>Veg-1:</b> <br>Mix veg <br></li>
                        <li><b>Veg-2:</b> <br>Aloo Sabzi <br></li>
                        <li><b>Non Veg:</b> <br>Egg Carry <br></li>
                        <li><b>Add-ons:</b><br> Suji Halwa <br></li>
                    </ul>
                </td>
                <td >
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice+ Tomato Rice <br></li>
                        <li><b>Dal:</b> <br>Mix Dal <br></li>
                        <li><b>Veg-1:</b> <br>Kadhi Pakora <br></li>
                        <li><b>Veg-2:</b> <br>Aloo+ Brinjal Fry <br></li>
                        <li><b>Non Veg:</b> <br>Fish Curry <br></li>
                        <li><b>Add-ons:</b> <br>Gulab Jamun <br></li>
                    </ul>
                </td>
                <td >
                    <ul>
                        <li><b>Roti:</b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice <br></li>
                        <li><b>Dal:</b><br> Dal DadKa <br></li>
                        <li><b>Veg-1:</b> <br>Palak Panner <br></li>
                        <li><b>Veg-2:</b> <br>Aloo+Soya Bean <br></li>
                        <li><b>Non Veg:</b> <br>Egg Dry Fry <br></li>
                        
                    </ul>
                </td>
                <td >
                    <ul>
                        <li><b>Roti: </b> Chapati <br></li>
                        <li><b>Rice:</b> <br>Plain Rice+ Veg-Briyani <br></li>
                        <li><b>Dal:</b> <br>Arhar Dal <br></li>
                        <li><b>Veg-1:</b> <br>Panner Butter Masala <br></li>
                        <li><b>Veg-2:</b> <br>Cauliflower+Beans+Aloo Sabzi <br></li>
                        <li><b>Non Veg:</b> <br>Chicken Butter Masala <br></li>
                        <li><b>Add-ons:</b> <br>Kheer <br></li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</body>