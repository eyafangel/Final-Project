@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<h1 style="color:skyblue; text-align:center">Admit Patient</h1>

		<div class="card">
			<div class="card-header" style="color:darkblue">Patient Basic Information</div>
			<div class="card-body" >
				<form method="POST" action="">
					<div class="row">
						<div class="col-lg-6" align="left">
							<label for="firstName">First Name: </label>
							<input type="text" name="firstName" placeholder="Enter First Name Here." required><br>
							<label for="middleName">Middle Name: </label>
							<input type="text" name="middleName" placeholder="Enter Middle Name Here." required><br>
							<label for="lastName">Last Name: </label>
							<input type="text" name="lastName" placeholder="Enter Last Name Here." required><br>
							<label for="age">Age: </label>
							<input type="text" name="age" placeholder="Enter Age Here." required><br>
							<label for="gender">Gender: </label><br>
							<input type="radio" name="gender" value="male" checked> Male<br>
  							<input type="radio" name="gender" value="female"> Female<br>
  							<input type="radio" name="gender" value="other"> Other
						</div>

						<div class="col-lg-6">
							<label for="birthday">Birthday: </label>
							<input type="text" name="birthday" placeholder="Enter First Name Here." required><br>
							<label for="nationality">Nationality: </label>
							<input type="text" name="nationality" placeholder="Enter Nationality Here." required><br>
							<label for="contact">Contact No.: </label>
							<input type="text" name="contact" placeholder="Enter Contact Number Here." required><br>
							<label for="maritalStatus">Marital Status: </label><br>
							<input type="radio" name="maritalStatus" value="single" checked> Single<br>
  							<input type="radio" name="maritalStatus" value="married"> Married<br>
  							<input type="radio" name="maritalStatus" value="divorced"> Divorced<br>
  							<input type="radio" name="maritalStatus" value="widowed"> Widowed
						</div>
						<div class="col-lg-12" align="center">Residence:
							
							<input type="text" name="lotNo" placeholder="Enter Lot No.">
							
							<input type="text" name="street" placeholder="Enter Street">
							
							<input type="text" name="brgy" placeholder="Enter Brgy./Subd.">
							
							<input type="text" name="city" placeholder="Enter City">
							
							<input type="text" name="postalCode" placeholder="Enter Postal Code">
							
							<input type="text" name="province" placeholder="Enter Province">
							
							<input type="text" name="country" placeholder="Enter Country">
						</div>
					</div>
						<br>
					<div class="card-header" style="color:midnightblue">Guardian Information</div>	
					<div class="card-body">
						<div class="col-lg-12">
							<label for="fName">First Name: </label>
							<input type="text" name="fName" placeholder="Enter First Name" required><br>
							<label for="mName">Middle Name: </label>
							<input type="text" name="mName" placeholder="Enter Middle Name" required><br>
							<label for="lName">Last Name: </label>
							<input type="text" name="lName" placeholder="Enter Last Name" required><br>
							<label for="relationship">Relationship to Patient: </label>
							<input type="text" name="relationship" placeholder="Enter realtionship to patient" required><br>
							<label for="cnumber">Contact No.: </label>
							<input type="text" name="cnumber" placeholder="Enter Contact Number Here." required><br>
							<label for="res">Residence: </label>
							<input type="text" name="res" placeholder="Enter Residence Here." required><br>
						</div>
					</div>
					<div class="col-lg-12" align="center">
						<button type="submit" name="submit" value="Submit" class="btn" style="background-color: mediumturquoise; ">Submit</button>
					</div>
				</form>
			</div>

		</div>
		
	</div>

@endsection