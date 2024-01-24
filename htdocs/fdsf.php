<html>
<body>
    <h1> Вывод с Лайк </h1>
<?php
$conn = new mysqli("127.0.0.1", "root", "", "oleg");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM users Order By username";
if($result = mysqli_query($conn, $sql))
{
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Логин</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>", "<input type=checkbox>" ,"</td>" ;
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
           
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} 
else
{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</body>


<body>
<?php
$conn = new mysqli("127.0.0.1", "root", "", "oleg");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

 $category_arr = array();
 $sort;

    function __construct($s=NULL)
    {
        $this->sort = $s;
        if($this->sort==NULL)
        {
        $this->category_arr = $this->_getCategory();
        } 
        else 
        {
           $this->category_arr = $this->_getCategory_sort();
        }
    }

     function _getCategory() 
    {
        $query = $this->query("SELECT * FROM `user` WHERE `username` = '0'");

        $return = array();
        while($arr = $this->fetch($query))
         {
            $return[$arr['parent_id']][] = $arr;
         }

        return $return;
    }
     function _getCategory_sort()
    {
        $query=$this->query("SELECT * FROM `user` WHERE LEFT(`username`,1) = '".mysql_real_escape_string($this->sort)."' ");

        $return = array();
        while($arr = $this->fetch($query))
         {
            $return[$arr['parent_id']][] = $arr;
         }

        return $return;
    }

    function setCatalog($parent_id)
    {
        $category = array();
        if(isset($this->category_arr[$parent_id]))
         {
            foreach($this->category_arr[$parent_id] as $value)
              {
$category[] = array('name'=>$value['name'],'description'=>$value['description'],'type'=>$value['type'],'id'=>$value['id']);
              }
         }
         return $category;
    }


?>
</body>




</html>