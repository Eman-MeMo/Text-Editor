<?php
include("index.html");

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "text_editor";
$conn = "";

//try to connenct to database
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception $e) {
    echo "<script> console.log('Couldn't connect to the database.')</script>";
}

if ($conn) {
    echo "<script> console.log('You are connected to the database.')</script>";
}

//store data at variables to store them at database
if (isset($_POST['save'])) {
    $content = $_POST['textarea'];
    $documentName = $_POST['document_Name'];
    $fontSize = $_POST['font-size'];
    $isBold = isset($_POST['isBold']) && $_POST['isBold'] == "1" ? 1 : 0;
    $isItalic = isset($_POST['isItalic']) && $_POST['isItalic'] == "1" ? 1 : 0;
    $isUnderLine = isset($_POST['isUnderLine']) && $_POST['isUnderLine'] == "1" ? 1 : 0;
    $isUpper = isset($_POST['isUpper']) && $_POST['isUpper'] == "1" ? 1 : 0;
    $aligntext = isset($_POST['aligntext']) ? $_POST['aligntext'] : 'left';
    $color = $_POST['Coloring'];

    // Insert the document Name ,content and its style into the database
    $query = "INSERT INTO documents (name, content,fontSize, bold,italic,underLine,upperCase,aligntext,color) VALUES ('$documentName', '$content','$fontSize','$isBold','$isItalic','$isUnderLine','$isUpper','$aligntext','$color')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>console.log('Content saved successfully.')</script>";
    } else {
        echo "<script>console.log('Error saving content.')</script>";
    }
}



if (isset($_POST['open'])) {
    // Retrieve the document Name from the request
    $documentName = $_POST['document_Name'];

    // Retrieve the content and its style from the database based on the document Name
    $query = "SELECT * FROM documents WHERE Name = '$documentName'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $content = $row['content'];
        $font = $row['fontSize'];
        $Bold = $row['bold'];
        $Italic = $row['italic'];
        $UnderLine = $row['underLine'];
        $UpperCase = $row['upperCase'];
        $Align = $row['aligntext'];
        $Colorr = $row['color'];

        //Apply stored style of this document to its content
        echo "<script>document.getElementById('textarea').value = '$content';</script>";

        echo "<script>document.getElementById('textarea').style.fontSize='$font'+'px';
        document.getElementById('font-size').value='$font'</script>";

        echo "<script>document.getElementById('textarea').style.textAlign =  '$Align';</script>";

        echo "<script>document.getElementById('textarea').style.color='$Colorr';
        document.getElementById('Coloring').value='$Colorr';</script>";
        if ($Bold == 1) {
            echo "<script>document.getElementById('textarea').style.fontWeight = 'bold';
            document.querySelector('.bold').classList.add('active');</script>";
        }
        if ($Italic == 1) {
            echo "<script>document.getElementById('textarea').style.fontStyle='italic';
            document.querySelector('.italic').classList.add('active');</script>";
        }
        if ($UnderLine == 1) {
            echo "<script>document.getElementById('textarea').style.textDecoration='underline';
            document.querySelector('.underline').classList.add('active');</script>";
        }
        if ($UpperCase == 1) {
            echo "<script>document.getElementById('textarea').style.textTransform='uppercase';
            document.querySelector('.upper').classList.add('active');</script>";
        }
    } else {
        echo "<script> console.log('Document not found.')</script>";
    }
}
