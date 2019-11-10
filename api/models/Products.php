<?php
class Products {
    private $conn;
    private $title;
    private $price;
    private $description;
    private $fileName;
    private $fileTmpName;
    private $fileSize;
    private $fileType;
    private $fileError;
    private $fileNameNew;
    private $fileDestination;

    # Create Contructor function
    # Database connection
    function __construct($db) {
        $this->conn = $db;
    }    

    function create() {        

        # Get the data from the AJAX request
        $data = json_decode(file_get_contents('php://input'), true);

        # Clean data
        $this->title = htmlspecialchars(strip_tags(trim($data["title"])));
        $this->price = htmlspecialchars(strip_tags(trim($data["price"])));
        $this->description = htmlspecialchars(strip_tags(trim($data["about"])));        
        
        # Error handling
        if(empty($this->title) || empty($this->price) || empty($this->description)) {
            echo json_encode(array('message' => 'Please fill in all the fields'));
            exit();

        } else if(!filter_var($this->title, FILTER_SANITIZE_STRING)) {
            echo json_encode(array('message' => 'Invalid Characters'));
            exit();

        } else if(!filter_var($this->description, FILTER_SANITIZE_STRING)) {
            echo json_encode(array('message' => 'Invalid Characters'));
            exit();

        } else if(!filter_var($this->price, FILTER_VALIDATE_INT)) {
            echo json_encode(array('message' => 'Invalid Characters'));
            exit();

        }

        # Declare variables for Photo
        /* 
        As the picture is in JSON it is not being
        seen as a picture, therfore this error
        handling is not working, looking for a solution.

        $fileName = $data["file"]["name"];
        $fileTmpName = $data["file"]["tmp_name"];
        $fileSize = $data["file"]["size"];
        $fileType = $data["file"]["type"];
        $fileError = $data["file"]["error"];

        # Array of allowed images
        $allowed = array(
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png'
        );

        # Error handling
        # Check if the extension is valid
        if(in_array($fileType, $allowed)) {

            # Check to see if the file has no errors
            if($fileError === 0) {

                # Check the file size is not larger than 100000
                if($fileSize < 1000000) {

                    # Change the file name
                    $fileNameNew = md5($fileName);

                    # Move the file to the correct destination
                    $fileDestination = '../img'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                } else {
                    echo json_encode(array('message'=>'The Photo is to large'));
                    exit();

                }             
            } else {
                echo json_encode(array('message' => 'The Photo has an error, use a differnt one'));
                exit();

            }
        } else {
            echo json_encode(array('message' => 'The Photo must be jpg/jpeg or png'));
            exit();
        }
        
        */


        # Query the database
        $query = "INSERT INTO products(title, price, about, img) 
        VALUES(:title, :price, :about, :img)";
        $stmt = $this->conn->prepare($query);

        # Bind data
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":about", $this->description);
        $stmt->bindParam(":img", $this->fileNameNew);
        
        if($stmt->execute()) {
            echo json_encode(array('message' => 'The Product has been added'));
            exit();

        } else {
            echo json_encode(array('message' => 'Error! Product could not be added'));
        }

        printf("Error: Query could not be executed");
    }
    
}