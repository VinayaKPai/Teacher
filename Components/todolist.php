<!-- <div class="col-sm-12" style="background: var(--BodGradcard); color: #f0f0f0; padding-top: 5px;"> -->
  <h4 class="btn btn-block topbanner">To Do List</h4>
  <div class='row'>
              <div class="card cards col-md-5 col-xs-12" style="border-right: 1px solid #f0f0f0;
              border-radius: 5px;
              background-color: #413949;
              box-shadow: inset -4px -4px -4px -4px #00000f; color: #f0f0f0; ">
                <?php include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/todos.php";?>
              </div>


              <div class="card cards col-md-5 col-xs-12"  style="border-right: 1px solid #f0f0f0;
              border-radius: 5px;
              background-color: #413949;
              box-shadow: inset -4px -4px -4px -4px #00000f;">
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
<!-- </div> -->
