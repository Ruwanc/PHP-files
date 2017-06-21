<?php
	include 'dbconnect.php';
					// connect to database
					//$con = mysqli_connect('localhost','root','aura123');
					mysqli_select_db($con, 'jfst'); //jfst is the name of database

					// define how many results you want per page
					$results_per_page = 5;

					// find out the number of results stored in database
					$sql='SELECT * FROM stu_2013';
					$result = mysqli_query($con, $sql);
					$number_of_results = mysqli_num_rows($result);

					// determine number of total pages available
					$number_of_pages = ceil($number_of_results/$results_per_page);

					// determine which page number visitor is currently on
					if (!isset($_GET['page'])) {
					  $page = 1;
					} else {
					  $page = $_GET['page'];
					}

					// determine the sql LIMIT starting number for the results on the displaying page
					$this_page_first_result = ($page-1)*$results_per_page;

					// retrieve selected results from database and display them on page
					$sql='SELECT * FROM stu_2013 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
					$result = mysqli_query($con, $sql);
                echo '<div id = "a" class = "container">';
					while($row = mysqli_fetch_array($result)) {
					 
                        echo '<br>';
					 echo '<div class = "row">';
					 
						echo '<div class = "col-lg-2 col-md-2 col-sm-2 col-xs-6">';
    						  echo '<img src = "students/'. $row['PICTURE'] . '" alt = "ruwan.png"/>';
						echo '</div>';
						
						echo '<div class = "col-lg-10 col-md-10 col-sm-10 col-xs-6">';
							echo 'Name:' . ' ' . $row['NAME'] . '<br>'; 
							echo 'cv:' . ' ' . '<a href = "documents/cv2013_2014/' .  $row['CV']. '" ' . 'target="_blank">' . $row['NAME']. ' curriculum vitae' . '</a><br>' ;
							echo 'E-mail:' . ' ' . $row['EMAIL'] . '<br>';
						echo '</div>';
				     
					echo '</div>';
                    echo '<br>' . '<hr>';
					}
                echo '</div>';
					// display the links to the pages
					echo '<div class = "container">';
                        echo '<ul class = "pagination">';
                        for ($page=1;$page<=$number_of_pages;$page++) {
                          echo '<li><a href="2013_2014.php?page=' . $page . '">' . $page . '</a></li> ';
                        }
					echo '</ul>';
                    echo '</div>';
					
							
							
	?>