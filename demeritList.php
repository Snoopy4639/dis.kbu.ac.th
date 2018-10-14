<!DOCTYPE html>
<html>
<head>
    <?php include 'backend-client/src/backend/connectDB.php'; ?>
    <title>แผนกวินัยนักศึกษา มหาวิทยาลัยเกษมบัณฑิต</title>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/indexDIS.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/includeHTML.js"></script>
	<!-- Icon -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div w3-include-html="header.html"></div>
    <div class="w3-amber">
        <div class="container-fluid">
            <div class="w3-card-4 w3-white w3-large">
                <div class="container-fluid">
                    <div class="col-12">
                        <label class="header">ระเบียบบทลงโทษของมหาวิทยาลัย</label>
                        <div class="col-12">&nbsp;</div>
                        <div class="text-center">
                            <div class="col-12">
                                <img src="photo/index/ruleBanner.png" class="img-fluid">
                                <div class="col-12">&nbsp;</div>
                                <label class="header">ความผิดสถานเบา</label>
                                <div class="w3-responsive">
                                    <table class="w3-table-all w3-centered w3-card-4">
                                        <tr class="w3-amber">
                                            <th width="50%">ความผิด</th>
                                            <th width="50%">บทลงโทษ</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                แต่งกาย - พูด - แสดงกริยา - ไม่สุภาพ <br>
                                                
                                            </td>
                                            <td>5 - 20 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ไม่รักษาความสะอาดภายในห้องพัก <br>
                                                Not keep the room clean / room is too dirty
                                            </td>
                                            <td>ขึ้นอยู่กับดุลพินิจ</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ทำลายทรัพย์สินมหาวิทยาลัย <br>
                                                Damage or not take good care of properties
                                            </td>
                                            <td>10 - 50 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ส่งเสียงดังรบกวนผู้อื่น <br>
                                                Make a loud noise interupt the other
                                            </td>
                                            <td>10 - 20 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ประกอบอาหารส่งกลิ่นรบกวนผู้อื่น <br>
                                                Cooking stinky food interupt the other
                                            </td>
                                            <td>10 - 20 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ลักลอบเลี้ยงสัตว์ในห้องพัก <br>
                                                Bring pet inside the room
                                            </td>
                                            <td>ขึ้นอยู่กับดุลพินิจ</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                พาบุคคลภายนอกเข้าอาคารโดยไม่ได้รับอนุญาต <br>
                                                Allow outsider in the room without permission
                                            </td>
                                            <td>ขึ้นอยู่กับดุลพินิจ</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                สูบบุหรี่ภายในอาคาร / ห้องพัก <br>
                                                Smoke inside the room / builder
                                            </td>
                                            <td>5 - 10 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                จงใจเปิดประตูคีย์การ์ดค้าง <br>
                                                Block keycard door lock
                                            </td>
                                            <td>ขึ้นอยู่กับดุลพินิจ</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                เข้า - ออกทางประตูหนีไฟ <br>
                                                in-out by fire exit
                                            </td>
                                            <td>ขึ้นอยู่กับดุลพินิจ</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ใส่รองเท้าฟุตบอลหรืออื่นๆ ทำให้พื้นชำรุด / สกปรก <br>
                                                Put soccer shoes or other shoes cause floor damage
                                            </td>
                                            <td>ขึ้นอยู่กับดุลพินิจ</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <label class="header">ความผิดสถานหนัก</label>
                                <div class="w3-responsive">
                                    <table class="w3-table-all w3-centered w3-card-4">
                                        <tr class="w3-amber">
                                            <th width="50%">ความผิด</th>
                                            <th width="50%">บทลงโทษ</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                ทำลายทรัพย์สินมหาวิทยาลัย <br>
                                                Damage or not take good care of properties
                                            </td>
                                            <td>10 - 50 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ลักทรัพย์ <br>
                                                Steal
                                            </td>
                                            <td>20 - 80 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ทะเลาะวิวาท / ทำร้ายร่างกายผู้อื่น <br>
                                                Argue each other / hurt other person
                                            </td>
                                            <td>10 - 100 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ชกต่อยในอาคาร <br>
                                                Fight each other within the building
                                            </td>
                                            <td>10 - 20 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                นำสิ่งของผิดกฏหมายเข้ามาในอาคาร <br>
                                                Have illegal thing inside the building
                                            </td>
                                            <td>40 - 100 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                นำของมึนเมาเข้ามาในอาคาร <br>
                                                Got drunk within the building
                                            </td>
                                            <td>10 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                นำสารเสพติดเข้ามาในอาคาร <br>
                                                Bring any drug in the building
                                            </td>
                                            <td>20 - 100 คะแนน</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                เสพสารเสพติดเข้ามาในอาคาร <br>
                                                Take any drug in the building
                                            </td>
                                            <td>20 คะแนน</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="col-12">&nbsp;</div>
        </div>
    </div>

    <div w3-include-html="footer.html"></div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<!-- Icon -->
	<script>
      feather.replace()
    </script>
    <!-- include html -->
    <script>
        includeHTML();
    </script>
</body>
</html>