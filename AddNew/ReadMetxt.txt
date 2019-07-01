This directory will hold all processing php files, required to add new records to all sections.

File name nomenclature - NO caps in file names.

Currently contains form actions for adding:
	#1.	New Class+Section
	#2.	New Student
	#3.	New Subjects

Adding new Records requires:
	#1. check<xxxx>.php (to check if a certain record exists)
	#2. existing<xxxx>.php (retrieve existing details for that area of app)
	#3.	addnew<xxxx> (to insert the record into the db table)
