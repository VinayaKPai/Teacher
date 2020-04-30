<div class="col-sm-12" style="background: var(--BodGradcard); color: #f0f0f0; padding-top: 5px;">
  <h4>To Do List</h4>
  <div class='row'>
              <div class='col-6'>
                <?php include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/todos.php";?>
              </div>


              <div class='col-6'>
        					    <h5  id='addNewTodo'>
                        Add a new To-do
                      </h5>
                        <form action="../../Scripts/php/newToDo.php" method="post">
                          <input type='text' id="todoText" name="todoText" placeholder='ToDo' style='display: block; width: 80%; color: #000;'/>
                          Note: Exact duplicates will not be saved! Check on the left before hitting Add!
                          <button type="submit" style='float: right; color: #000;'> Add</button>
                        </form>
              </div>

          </div>
</div>
