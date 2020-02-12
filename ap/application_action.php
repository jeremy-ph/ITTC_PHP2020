    <?php
        // file
        // $uploads_dir = ' ';
        // $img_select = $_FILES['img_select']['name'];
        //ini_set("display_errors", "1");
        $filepath = null;
        if ($_FILES['img_select']['error'] === UPLOAD_ERR_OK) {
            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/uploads/';      
            $uploadfile = $uploaddir . basename($_FILES['img_select']['name']);    
            
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir);
            }
    
            // print_r($_FILES);   
    
            if (move_uploaded_file($_FILES['img_select']['tmp_name'], $uploadfile)) {        
              //  echo "file upload success.";
              $filepath = '/uploads/'.basename($_FILES['img_select']['name']);
            } else {        
                echo 'files infomation:';        
                print_r($_FILES);      
            }
        }       
        

        $uname = $_POST['uname'];
        $cellphone = $_POST['cellphone'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $Height = $_POST['Height'];
        $Weigth = $_POST['Weigth'];
        $civil  = $_POST['civil'];
        $spouse  = $_POST['spouse'];
        $children  = $_POST['children'];
        $religious  = $_POST['religious'];
        $pastor  = $_POST['pastor'];
        $elementary  = $_POST['elementary'];
        $eyear  = $_POST['eyear'];
        $highschool  = $_POST['highschool'];
        $hyear  = $_POST['hyear'];
        $college  = $_POST['college'];
        $cyear  = $_POST['cyear'];
        $postgraduate  = $_POST['postgraduate'];
        $pyear  = $_POST['pyear'];
        $skills  = $_POST['skills'];
        $literate  = $_POST['literate'];
        $useyear  = $_POST['useyear'];
        $usemonth  = $_POST['usemonth'];
        $level  = $_POST['level'];
        $employed  = $_POST['employed'];
        $company  = $_POST['company'];
        $position  = $_POST['position'];
        $rname1  = $_POST['rname1'];
        $raddress1  = $_POST['raddress1'];
        $rname2  = $_POST['rname2'];
        $raddress2  = $_POST['raddress2'];
        $ername  = $_POST['ername'];
        $ernumber  = $_POST['ernumber'];

       echo $uploadfile ."<br>";

       echo $uname ."<br>";
       echo $cellphone ."<br>";
       echo $address ."<br>";
       echo $birthday ."<br>";
       echo $age ."<br>";
       echo $gender ."<br>";
       echo $Height ."<br>";
       echo $Weigth ."<br>";
       echo $civil ."<br>";
       echo $spouse ."<br>";
       echo $children ."<br>";
       echo $religious ."<br>";
       echo $pastor ."<br>";
       echo $elementary ."<br>";
       echo $eyear ."<br>";
       echo $highschool ."<br>";
       echo $hyear ."<br>";
       echo $college ."<br>";
       echo $cyear ."<br>";
       echo $postgraduate ."<br>";
       echo $pyear ."<br>";
       echo $skills ."<br>";
       echo $literate ."<br>";
       echo $useyear ."<br>";
       echo $usemonth ."<br>";
       echo $level ."<br>";
       echo $employed ."<br>";
       echo $company ."<br>";
       echo $position ."<br>";
       echo $rname1 ."<br>";
       echo $raddress1 ."<br>";
       echo $rname2 ."<br>";
       echo $raddress2 ."<br>";
       echo $ername ."<br>";
       echo $ernumber ."<br>";



        $pdo = new PDO('mysql:host=localhost;dbname=phpStudy', 'root', 'abde1245');

        if ($id) {
            // edit record
            $sql = 'UPDATE application
                SET uname = :uname,
                firstname = :firstname,
                middlename = :middlename,
                lastname = :lastname,
                birthday = :birthday,
                address = :address,
                post = :post';
            if ($filepath) {
                $sql .= ',Image = :image';
            }
            $sql .= ' WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $params = [
                'userid' => $userid,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'lastname' => $lastname,
                'birthday' => $birth,
                'address' => $address,
                'post' => $post,
                'id' => $id,
            ];
            if ($filepath) {
                $params['Image'] = $filepath;
            }
            $stmt->execute($params);
        } else {
            // create new record

            $stmt = $pdo->prepare('INSERT INTO application (
                upload, name, cellphone, address, birthday, age, gender, height, weight, civil, spouse, children, religious, pastor, elementary,
                eyear, highschool, hyear, college, cyear, postgraduate, pyear, skills, literate, computeryear, computermonths, level, employed,
                company, position, cname1, caddress1, cname2, caddress2, ename, enumber
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )');

            $stmt->execute([ 
                $uploadfile, $uname, $cellphone, $address, $birthday, $age, $gender, $Height, $Weigth, $civil, $spouse, $children, $religious, $pastor, 
                $elementary, $eyear, $highschool, $hyear, $college, $cyear, $postgraduate, $pyear, $skills, $literate, $useyear, $usemonth, $level, 
                $employed, $company, $position, $rname1, $raddress1, $rname2, $raddress2, $ername, $ernumber
            ]);
    
    
     
        }
        print_r($stmt->errorInfo());
        
        echo 'USER ID : ' . $userid .'<br>';
        echo 'PASSWORD : ' . $userpw .'<br>';
        echo 'PASSWORD CHECK : ' . $userpw2 .'<br>';
        echo 'FIRST NAME : ' . $firstname .'<br>';
        echo 'MIDDLE NAME : ' . $middlename .'<br>';
        echo 'LAST NAME : ' . $lastname .'<br>';
        echo 'BIRTHDAY : ' . $birth .'<br>';
        echo 'ADDRESS : ' . $address .'<br>';
        echo 'POST NUMBER : ' . $post .'<br>';
    ?>