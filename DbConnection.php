<?php
   
class dbConnect{
    protected $db_host;
    protected $db_username;
    protected $db_pass;
    protected $db_name;
    protected $connectionString;
    protected $sql;
    // This takes the function input and places it in useable varables for the class
    public function __construct($db_host, $db_username, $db_pass, $db_name, $sql){
        $this->db_host = $db_host;
        $this->db_username = $db_username;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->sql = $sql;
    }

    public function connect(){
        //Checks and displays message if missing key varables
        if($this->db_host == null){
        
            echo "Could not connect missing host, Username, and Password". "<br>";
        }
        if($this->db_username == null){
        
            echo "Could not connect missing  Username and Password". "<br>";
        }
     
         
        // This opens connection to database useing provided variables
        $connectionString  = mysqli_connect($this->db_host, $this->db_username, $this->db_pass, $this->db_name);
        //If there is no connection made 
        if(!$connectionString ){
            printf("Could Not Connect" .  mysqli_connect_error() . "<br>" . "Make sure you have all the required paramaters: Host, Username, And Password". "<br>" );
        }
        else{
            echo "connection Open Sucssfully!  " . "<br>";
             
            if(mysqli_query($connectionString, $this->sql )){
                echo "  Database Sucssfully Updated";
            }
            else{
                if($this->sql!=null){
                echo " However " . mysqli_error($connectionString);
                }
            }
        }
    }       
    
}

?>
