<div class="container">
    <div class="container vh-90">
        <div class="row justify-content-center h-90">
            <div class="card w-50 my-auto shadow">
                <div class="card-header text-center bg-primary text-white">
                <h2>Clearance Form</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                 <div class="form-group">
                    <label for="student_name">Email</label>
                    <input type="email" id="username" class="form-control" name="student_email" required/>
                </div>
				<div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" id="username" class="form-control" name="username" required/>
                </div>
                <div class="form-group">
                    <label for="matric">RegNo</label>
                    <input type="text" id="matric" class="form-control" name="matric" required/>
                </div>
                <div class="form-group">
                    <label for="student_major">Course</label>
                    <select name="student_major">
                    <option value="computer science">computer science</option>
                    <option value="IT">IT</option>
                    <option value="cyber security">cyber security</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Economic and finace">Economics and finance</option>
                    <option value="finance & banking">Finance and banking</option>
                    </select>
                </div><br>
               
                <input type="submit" class="btn btn-primary w-100" value="Submit" name="submit">
            </form>
            </div>
            <div class="card-footer text-right">
                <small>&copy; Clearance</small>
            </div>
            </div>
        </div>
    </div>


    <form method="post" action="">
		<div class="container">
		<div class="container vh-100">
        <div class="row justify-content-center h-100">
	<div class="form-group">
        <label for="student_email">Email:</label><br>
        <input type="email" name="student_email" id="student_email" required>
	</div>
	<div class="form-group">
        <label for="student_name">UserName:</label><br>
        <input type="text" name="student_name" id="student_name" required>
	</div>		
	<div class="form-group">
        <label for="matric">RegNo:</label><br>
        <input type="text" name="matric" id="matric" required>
	</div>	
	<div class="form-group">
        <label for="student_major">Major:</label><br>
        <input type="text" name="student_major" id="student_major" required>
	</div><br>
        <input type="submit" name="submit" value="Submit">
		</div>
</div>
    </form>
</div>