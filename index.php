<?php
include('./db_config.php');

$sql="select * from todo_list";
$result=$conn->query($sql);

//$row= $result->fetch_assoc();
//print_r($row);
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>krisa todo list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .modalBox{
            width:100%;
            height:100%;
            position:fixed;
            background: rgba(0,0,0,0.5);
        }

        .modal-content{
            background:white;
            padding:10px;
            width:50%;
            height:150px;
            margin:50px auto;
        }

        .visible{
            display:block;
        }

        .invisible{
            display:none;
        }
    </style>
  </head>
  <body>

    <div class="modalBox invisible">
        <div class="modal-content">
        <form action="edit.php" method="POST">
        <input type="hidden" name="id" id='editID'>
        <input type="text" class="form-control" name="todo" placeholder="enter todo">
        <button type="submit" class="btn btn-info mt-3">EDIT</button>
     </form>
        </div>
    
    </div>

    <div class="container p-3">
        <h3>Todo Application</h3>
    <form action="save-todo.php" method="POST">
        <input type="text" class="form-control" name="todo" placeholder="enter todo">
        <button type="submit" class="btn btn-info">Add</button>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Todo tasks</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>

    <?php
    while($row= $result->fetch_assoc()){ 
    ?>
     <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['tasks'] ?></td>
      <td><a href="./delete.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm">Delete</a>
      <button class="btn btn-primary editBtn">Edit</button></td>
     </tr>

    <?php
    }
    ?>
    
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        const modal = document.querySelector('.modalBox');
        const editBtns = document.querySelectorAll('.editBtn');
        const editID = document.querySelector('#editID');


        console.log(editBtns);
        editBtns.forEach((el) =>{
            el.addEventListener('click',(e)=>{
                e.preventDefault();
            modal.classList.remove('invisible');
            modal.classList.add('visible');
            let id = Number(el.parentElement.parentElement.firstElementChild.textContent);
            editID.value = id;
            console.log(editID.value);
            })
        })
    </script>
  </body>
</html>
