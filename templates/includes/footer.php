    </div>
  </div>
</div>
<div class="col-md-2">
  <div id="sidebar">
    <div class="block">
  		<?php if(isLoggedIn()) : ?>
  			<div class="userdata">
  		<h3>	Welcome, <?php echo getUser()['username']; ?> </h3>
  		</div>
  		<br>
  		<form role="form" method="post" action="logout.php">
  			<input type="submit" name="do_logout" class="btn btn-primary" value="Logout" />
  		</form>
  		<?php endif; ?>
  	</div>
  </div>
</div>
</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.25.7/js/jquery.tablesorter.js"></script>
<script>$(function(){
          $("#myTable").tablesorter();
        });
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
